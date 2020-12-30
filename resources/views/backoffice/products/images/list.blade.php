@extends('layout.admin')

@section('style')
    <!-- -------------JQuery DataTable Css not in index -->
    <link href="{{ asset('backoffice/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
        rel="stylesheet">
    <!-- ------------- end JQuery DataTable Css not in index -->
@endsection

@section('content')
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        List images of products
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ url('products/'.$product->id.'/images/form') }}" title="add new product" type="button"
                            class="btn btn-success waves-effect">new photos</a>
                    </ul>
                    <x-back.success type="margin-top: 15px;"></x-back.success>
                    
                </div>
               

                <div class="body" >
                   
                    <div class="table-responsive">
                       
                        
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            
                            <thead>
                                <tr>
                                    <th>Image small (438*438)</th>
                                    <th>Image large (1000*1000)</th>
                                    <th>Action</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image small (438*438)</th>
                                    <th>Image large (1000*1000)</th>
                                    <th>Action</th>
                                    <th>Active</th>
                             
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($product->images as $image)
                                    <tr>
                                        
                                        <td> <img src="{{ $image->urlSmall() }}" width="300px" height="200px" alt=""> </td>
                                        <td> <img src="{{ $image->urlLarge() }}" width="300px" height="200px" alt=""> </td>
                                        {{-- <td> <img src="{{ $image->path_small }}" width="300px" height="200px" alt=""> </td>
                                        <td> <img src="{{ $image->path_large }}" width="300px" height="200px" alt=""> </td> --}}
                                        
                                        <td nowrap="nowrap">
                                            <a title="delete" 
                                                onclick="deleteImage({{ $image->id }})"
                                                class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a>
                                           

                                            <a href="{{ route('images.edit', ['image' => $image->id]) }}"
                                                title="edit" type="button"
                                                class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <div class="switch">
                                                <label><input id="active-{{ $image->id }}" onchange="changeActive({{ $image->id }})" type="checkbox" {{ $image->active ? 'checked' : null }} ><span
                                                        class="lever switch-col-green"></span></label>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->

@endsection

@section('js')
    <script>
        function deleteImage(id) {
            Swal.fire({
                title: 'do you really want to  delete product ?',
                showCancelButton: true,
                confirmButtonText: `Delete`,
                confirmButtonColor: '#fb483a',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: "/images/" + id,
                        success: function(data) {
                            location.reload();
                            //$("#category-table").load(location.href + " #category-table");
                            //location.replace("/admin/collections")
                        }
                    });
                }
            });
        }

        function changeActive(id){
           $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "/images/active/" + id,
                data:{
                    'active' : $('#active-'+id).is(":checked")
                },
                success: function(data) {
                    //$("#category-table").load(location.href + " #category-table");
                    //location.replace("/admin/collections")
                }
            });
        }

    </script>
    <script src="{{ asset('front/assets/js/sweetalert2.js') }}"></script>

    <!-- Jquery Core Js -->
    <script src="{{ asset('backoffice/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('backoffice/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('backoffice/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('backoffice/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('backoffice/plugins/node-waves/waves.js') }}"></script>

    <!-- ----------------- not exist in index ------------------------------------------- -->
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backoffice/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/pages/tables/jquery-datatable.js') }}"></script>

    <!-- ----------------- end not exist in index ------------------------------------------- -->

    <!-- Custom Js -->

@endsection
