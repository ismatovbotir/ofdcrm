@extends('layouts.app')


@section('contentBody')


<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="title nk-block-title">{{$client->name}} Fiskal modullari</h4>

    </div>
</div>
<div class="card card-preview">
    <div class="card-inner">
        <form action="{{route('client.fiscal.store',['client'=>$client->id])}}" method="POST">
            @csrf
            <div class="preview-block">

                <div class="row gy-4">
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="sti" value="{{$client->vat}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="brand" value="{{$client->brand}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" value="{{$client->name}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="phone" value="{{$client->phone}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="fiscal" placeholder="Fiskal modul raqami" name="fiscal">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">


                            <button type="submit" href="#" class="btn btn-success">ADD</button>

                        </div>
                    </div>
                </div>

                <div class="row gy-4">
                    <div class="mb-3">
                        @if($errors->any())

                        <div class="col">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="col">
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @if($client->fiscals_count>0)
                <div class="row gy-4 ">
                    <div class="col">

                        <div class="card-inner">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Modul</th>
                                        <th scope="col">Sana</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($client->fiscals as $idx=>$fiscal)
                                    <tr>
                                        <th scope="row">{{$idx+1}}</th>
                                        <td>{{$fiscal->fm}}</td>
                                        <td>{{$fiscal->updated_at}}</td>                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                @endif
            </div>
        </form>
    </div>

</div><!-- .card-preview -->


@endsection