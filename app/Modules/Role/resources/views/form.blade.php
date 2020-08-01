<div class="position-relative form-group @if($errors->has("name")){{'has-error'}} @endif" >
    {!!Form::label('name', 'Name', array('class' => 'control-label ' )) !!}
    {!!Form::text('name',null, array('class' => 'form-control'))!!}
    @if($errors->has('name'))
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    @endif
</div>
<div class="position-relative form-group @if($errors->has("name")){{'has-error'}} @endif">
    {!!Form::label('slug', 'Slug', array('class' => 'control-label ' )) !!}
    {!!Form::text('slug',null, array('class' => 'form-control'))!!}
    @if($errors->has('slug'))
        {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
    @endif
</div>
