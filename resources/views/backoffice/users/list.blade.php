@extends('layout.admin')

@section('style')
    <!-- -------------JQuery DataTable Css not in index -->
    <link href="{{ asset('backoffice/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
        rel="stylesheet">
    <!-- ------------- end JQuery DataTable Css not in index -->
    <style> 
        .dt-buttons{
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <!-- Exportable Table -->
    <div class="row clearfix" id="category-table">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        List of users
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('users.create') }}" title="add new sub category" type="button"
                            class="btn btn-success waves-effect">new user</a>
                    </ul>
                    <x-back.success type="margin-top: 15px;"></x-back.success>
                    
                </div>
               

                <div class="body" >
                  
                    <div class="table-responsive">
                       
                        
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Adress</th>
                                    <th>CreatedAt</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Adress</th>
                                    <th>CreatedAt</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->role->label ?? '' }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td width="90px">
                                            <a title="delete" type="button"
                                                onclick="deleteUser({{ $user->id }})"
                                                class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a>

                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                title="edit" type="button"
                                                class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">edit</i>
                                            </a>
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
        function deleteUser(id) {
            Swal.fire({
                title: 'do you really want to  delete user ?',
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
                        url: "/users/" + id,
                        success: function(data) {
                            location.reload();
                            //$("#category-table").load(location.href + " #category-table");
                            //location.replace("/admin/collections")
                        }
                    });
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
