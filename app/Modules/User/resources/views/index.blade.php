@extends('layouts.main')
@section('title', 'User')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-right">
                        <div class="nav">
                            <a href="{{route('user.add')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="users-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

            $('#users-table').DataTable({
                "processing": true,
                "serverSide": true,
                "destroy":true,
                "searching":true,
                "bLengthChange": false,
                "ajax": appUrl+"/users/users-data-ajax",
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'role_name', name: 'role_name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'print'
                ],
                order: [[0, 'desc']],
                /*"pageLength": 50,*/
            });


    </script>
@endpush