@extends('layout.admin')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Add new Image</h2>
                </div>
                <div class="body">
                
                    <form id="form_validation" action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('backoffice.products.images.form')

                        <button class="btn btn-primary waves-effect" type="submit">Add photo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
