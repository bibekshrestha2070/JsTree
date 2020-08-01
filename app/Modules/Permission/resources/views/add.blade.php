@extends('layouts.main')
@section('title', 'Add Permission')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">

                    {!!Form::open(array('route'=>'store.permission','class' => 'form-horizontal'))!!}

                    @include('Permission::form')
                    <button class="mt-1 btn btn-primary"  type="submit">Add</button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>

    </div>

@endsection
