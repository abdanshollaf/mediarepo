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
                <h3>Edit User <a href="{{ route('users.index') }}" class="label label-primary pull-right">Back</a></h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('users.update', $post->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $post->nama }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" id="username" class="form-control" value="{{$post->username }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"  id="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
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
                            <input type="submit" class="btn btn-default" value="Update User" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection