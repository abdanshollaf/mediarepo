@extends('admin.adminlte')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('success_msg'))
            <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @elseif(Session::has('danger_msg'))      
            <div class="alert alert-danger">{{ Session::get('danger_msg') }}</div>
        @endif
        <!-- Posts list -->
        @if(!empty($posts))
        <div class="row">
            <div class="col-lg-11 margin-tb">
                <div class="pull-left">
                    <h2>Daftar User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('users.add') }}"> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-11 col-sm-11 col-md-11">
                <table class="table table-bordered task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th width="18%">Nama</th>
                        <th width="18%">Username</th>
                        <th width="20%">Password</th>
                        <th width="10%">Role</th>
                        <th width="34%">Action</th>
                    </thead>                    
                    <!-- Table Body -->
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td class="table-text">
                                <div>{{$post->nama}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$post->username}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$post->password}}</div>
                            </td>
                        </td>
                        <td class="table-text">
                            <div>{{$post->id_role}}</div>
                        </td>
                        <td>
                            <a href="{{ route('users.details', $post->id) }}" class="fa fa-file label label-success"> Details</a>
                            <a href="{{ route('users.edit', $post->id) }}" class="fa fa-edit label label-warning"> Edit</a>
                            <a href="{{ route('users.delete', $post->id) }}" class="fa fa-trash label label-danger" onclick="return confirm('Are you sure to delete?')"> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    <!-- <h3><a href='/' class="label label-primary pull-right">Back</a></h3>
    --></div>
</div>
@endsection