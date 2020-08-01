<div class="position-relative form-group">
    {!!Form::label('name', 'Name', array('class' => 'control-label')) !!}
    {!!Form::text('name',null, array('class' => 'form-control'))!!}
</div>
<div class="position-relative form-group">
    {!!Form::label('email', 'Email', array('class' => 'control-label')) !!}
    {!!Form::email('email',null, array('class' => 'form-control'))!!}
</div>
<div class="position-relative form-group">
    {!!Form::label('role_id', 'Role', array('class' => 'control-label')) !!}
    {!!Form::select('role_id', roles(), isset($user)?$user->roles[0]->id:null, array('class' => 'form-control select2'))!!}

</div>
<div class="position-relative form-group">
    <label for="password" class="">Password</label>
    <input name="password"  type="password" class="form-control" id="password">
</div>
<div class="position-relative form-group">
    {!!Form::label('search', 'Permissions', array('class' => 'control-label')) !!}
    <input type="text" class="form-control" placeholder="Search node .." id="search" autocomplete="off">
</div>
<div class="position-relative form-group">
    <div id="SimpleJSTree"></div>
</div>