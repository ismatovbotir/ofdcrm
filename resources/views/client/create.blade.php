@extends('layouts.app')


@section('contentBody')


<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="title nk-block-title">Yangi Mijoz</h4>

    </div>
</div>
<div class="card card-preview">
    <div class="card-inner">
        <form action="{{route('clients.store')}}" method="POST">
            @csrf
            <div class="preview-block">

                <div class="row gy-4">
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="sti" placeholder="STIR raqami" name="vat">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="brand" placeholder="Brand" name="brand">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" placeholder="Firma nomi" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="phone" placeholder="Mrojaat uchun telefon raqami" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">


                            <button type="submit" href="#" class="btn btn-success">ADD</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
        </div>
</div><!-- .card-preview -->


@endsection