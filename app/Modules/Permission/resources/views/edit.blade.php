@extends('layouts.main')
@section('title', 'Edit Permission')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">

                    {!!Form::model($permission,array('route' => ['update.permission',$permission->id],'class' => 'form-horizontal'))!!}

                    @include('Permission::form')
                    <button class="mt-1 btn btn-primary" id="btn-submit" type="submit">Update</button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>

    </div>

@endsection


