@extends('layouts.main')
@section('title', 'Edit Role')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">

                    {!!Form::model($role,array('route' => ['update.role',$role->id],'class' => 'form-horizontal'))!!}

                    @include('Role::form')
                    <button class="mt-1 btn btn-primary" id="btn-submit" type="submit">Update</button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>

    </div>

@endsection


