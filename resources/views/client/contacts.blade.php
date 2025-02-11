@extends('layouts.app')


@section('contentBody')


<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="title nk-block-title">{{$client->name}} Fiskal modullari</h4>

    </div>
</div>
<div class="card card-preview">
    <div class="card-inner">
        <form action="{{route('client.contact.store',['client'=>$client->id])}}" method="POST">
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
                                <input type="text" class="form-control" id="name" placeholder="Ism sharif" value="{{old('name','')}}" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        
                        <div class="form-group">
                            
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="default-06" name="position">
                                        <option value>Lavozim</option>
                                        @foreach($positions as $idx=>$position)
                                        <option value="{{$idx+1}}">{{$position}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="fiscal" placeholder="mobil raqam"  value="{{old('phone','')}}" name="phone">
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
                @if($client->contacts_count>0)
                <div class="row gy-4 ">
                    <div class="col">

                        <div class="card-inner">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">FIO</th>
                                        <th scope="col">Mob</th>
                                        <th scope="col">Lavozim</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($client->contacts as $idx=>$contact)
                                    <tr>
                                        <th scope="row">{{$idx+1}}</th>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->mob}}</td>
                                        <td>{{$positions[$contact->position-1]}}</td>
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