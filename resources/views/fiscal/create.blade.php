@extends('layouts.app')


@section('contentBody')


<div class="nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="title nk-block-title">Add new Fiscal</h4>

    </div>
</div>
<div class="card card-preview">
    <div class="card-inner">
        <form action="{{route('fiscals.store')}}" method="POST">
            @csrf
            <div class="preview-block">

                <div class="row gy-4">
                    <div class="col-sm-6">
                        <div class="form-group">
                            
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="default-01" placeholder="fm number" name="fm">
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
</div><!-- .card-preview -->


@endsection