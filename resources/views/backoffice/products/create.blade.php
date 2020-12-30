@extends('layout.admin')
@section('style')
        <!-- Bootstrap Select Css -->
        <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('backoffice/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="{{ asset('backoffice/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{ asset('backoffice/plugins/waitme/waitMe.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('backoffice/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Add new product</h2>
            </div>
            <div class="body">
            
                <form id="form_validation" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('backoffice.products.form')

                    <button class="btn btn-primary waves-effect" type="submit">Add product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script src="{{ asset('backoffice/js/pages/forms/basic-form-elements.js') }}"></script>
 <!-- Autosize Plugin Js -->
 <script src="{{ asset('backoffice/plugins/autosize/autosize.js') }}"></script>

 <!-- Moment Plugin Js -->
 <script src="{{ asset('backoffice/plugins/momentjs/moment.js') }}"></script>
 <!-- Bootstrap Material Datetime Picker Plugin Js -->
 <script src="{{ asset('backoffice/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

 <!-- Bootstrap Datepicker Plugin Js -->
 <script src="{{ asset('backoffice/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

  <!-- Ckeditor -->
  <script src="{{ asset('backoffice/plugins/ckeditor/ckeditor.js') }}"></script>
  <!-- TinyMCE -->
  <script src="{{ asset('backoffice/plugins/tinymce/tinymce.js') }}"></script>
  <script src="{{ asset('backoffice/js/pages/forms/editors.js') }}"></script>
    
@endsection
