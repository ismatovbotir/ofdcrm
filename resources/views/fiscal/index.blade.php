@extends('layouts.app')


@section('contentBody')

<div class="nk-block-head">
    <div class="nk-block-head-content d-flex justify-content-between">
        <h4 class="nk-block-title">Fiscals</h4>


        <a href="{{route('fiscals.create')}}" class="btn btn-success">Add</a>


    </div>
</div>
<div class="card card-bordered card-preview">
    <table class="table table-tranx">
        <thead>
            <tr class="tb-tnx-head">
                <th >#</th>
                <th >
                    Modul Number
                </th>
                <th >
                    Client
                   
                </th>
                <th >
                    Status
                </th>
                <th >
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $idx=>$item)
            <tr class="tb-tnx-item">
                <td class="tb-tnx-id">
                    <a href="#"><span>{{$idx+1}}</span></a>
                </td>
                <td class="tb-tnx-info">
                   {{$item->fm}}
                </td>
                <td class="tb-tnx-amount is-alt">
                   {{$item->client}}
                    
                </td>
                <td class="tb-tnx-amount is-alt">
                  {{$item->latestStatus->name}}
                    
                </td>
                <td class="tb-tnx-action">
                    <div class="dropdown">
                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs" style="">
                            <ul class="link-list-plain">
                                <li><a href="{{route('fiscals.show',['id'=>$item->id])}}">View</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div><!-- .card-preview -->


@endsection