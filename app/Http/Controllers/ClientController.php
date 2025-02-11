<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ContactStoreRequest;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Fiscal;
use App\Models\FiscalStatus;
use App\Models\Contact;

class ClientController extends Controller
{
    public $positions=[
        "Direktor","Buhgalter","Operator","Manager"
    ];
    public function index()
    {
        $data=Client::withCount('fiscals')->paginate(20);
       // dd($data);
        return view('client.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreRequest $request)
    {
        $validated=$request->validated();
        //dd($validated);
        Client::create(
            $validated
        );

        return to_route('clients.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function clientFiscals($id){
        $client=Client::where('id',$id)->with('fiscals')->withCount('fiscals')->first();
        //dd($client);
        return view('client.fiscals',compact('client'));
    }
    public function clientFiscalStore(Request $request,$id){
        
        $fm=Fiscal::where('fm',$request->input('fiscal'))->first();
        if($fm==null){
            return to_route('client.fiscals',['client'=>$id])->with('error','Ushbu modul tizimda mavjud emas yoki qayta kiriting'); 
        }
        if($fm->active){
            return to_route('client.fiscals',['client'=>$id])->with('error','Ushbu modul '.$fm->client->name.' tashkilotiga biriktirilgan');
        }else{

            Fiscal::where('fm',$request->input('fiscal'))->update(['active'=>true,'client_id'=>$id]);
            FiscalStatus::create([
                "fiscal_id"=>$fm->id,
                "name"=>"active"
            ]);
            return to_route('client.fiscals',['client'=>$id]);
            
        }

        
        
       
    }
    public function clientContacts($id){
        $client=Client::where('id',$id)->with('contacts')->withCount('contacts')->first();
        //dd($client);
        $positions=$this->positions;
        return view('client.contacts',compact('client','positions'));
    }
    public function clientContactStore(ContactStoreRequest $request,$id){
        $validated=$request->validated();
        //dd($validated);
        $positions=$this->positions;
       
        Contact::create([
                "client_id"=>$id,
                "name"=>$validated["name"],
                "mob"=>$validated["phone"],
                "position"=>$validated["position"]
        ]);
        return to_route('client.contacts',['client'=>$id,"positions"=>$positions]);
    }
}
