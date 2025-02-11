@extends('layouts.app')


@section('contentBody')

<div class="nk-block-head">
    <div class="nk-block-head-content d-flex justify-content-between">
        <h4 class="nk-block-title">Mojizlar</h4>


        <a href="{{route('clients.create')}}" class="btn btn-success">Add</a>


    </div>
</div>
<div class="card card-bordered card-preview">
    <table class="table table-tranx">
        <thead>
            <tr class="tb-tnx-head">
                <th >#</th>
                <th >
                    STIR
                </th>
                <th >
                    Yuridik nomi
                   
                </th>
                <th >
                    Brandi
                </th>
                <th>
                    FM
                </th>
                <th >
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $idx=>$client)
            <tr class="tb-tnx-item">
                <td class="tb-tnx-id">
                    <a href=""><span>{{$idx+1}}</span></a>
                </td>
                <td class="tb-tnx-info">
                   {{$client->vat}}
                </td>
                <td class="tb-tnx-amount is-alt">
                   {{$client->name}}
                    
                </td>
                <td class="tb-tnx-amount is-alt">
                  {{$client->brand}}
                    
                </td>
                <td>
                    {{$client->fiscals_count}}
                </td>
                <td class="tb-tnx-action">
                    <div class="dropdown">
                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs" style="">
                            <ul class="link-list-plain">
                                <li><a href="{{route('clients.show',['client'=>$client->id])}}">View</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="{{route('client.contacts',['client'=>$client->id])}}">Contact</a></li>
                                <li><a href="{{route('client.fiscals',['client'=>$client->id])}}">Fiscal</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    <div class="m-2">
        {{$data->links('pagination::bootstrap-4')}}
    </div>
</div><!-- .card-preview -->


@endsection