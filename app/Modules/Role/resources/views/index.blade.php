@extends('layouts.main')
@section('title', 'Roles')
@section('content')
    <div class="row">

        <div class="col-md-12">
            @include('flash::message')
            <div class="main-card mb-3 card">

                <div class="card-header">
                    <div class="btn-actions-pane-right">
                        <div class="nav">
                            <a href="{{route('role.add')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Role</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="roles-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td><a href="{{route('edit.role',$role->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>




    </script>
@endpush