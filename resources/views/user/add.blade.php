@extends('admin.adminlte')
@section('content')
<div class="row">
    <div class="col-lg-11">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach()
        </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Add Data User <!-- <a href="{{ route('users.index') }}" class="label label-primary pull-right">Back</a> --></h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('users.insert') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label for="idrole" class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-10">
                            <select name="id_role" class="form-control">             
                               @foreach($creates as $create)
                               <option value="{{ $create->id_role }}">{{ $create->role}}</option>
                               @endforeach 
                           </select>
                       </div>
                   </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Add User" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection