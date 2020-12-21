@extends('layouts.admin')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Modifier une collection</h2>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{route('collections.update',['collection'=>$collection->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('backoffice.collections.form')

                        <button class="btn btn-primary waves-effect" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
