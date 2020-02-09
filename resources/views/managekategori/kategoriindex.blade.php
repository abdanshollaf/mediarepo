@extends('admin.adminlte')
@section('content')
<div class="row">
<div class="col-lg-12">
    @if(Session::has('success_msg'))
    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>       
    @endif  
    <!-- Posts list -->
    @if(!empty($kategori))
    <div class="row">
        <div class="col-lg-11 margin-tb">
            <div class="pull-left">
                <h2>Daftar Kategori</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addkategori') }}"> Tambah</a>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <table class="table table-bordered task-table">
                <!-- Table Headings -->
                <thead>
                    <th width="10%">Id</th>
                    <th width="10%">Jenis</th>
                    <th width="65%">Nama Kategori</th>
                    <th width="15%">Action</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach($kategori as $post)
                    <tr>
                        <td class="table-text">
                            <div >{{$post->id}}</div>
                        </td>
                        <td class="table-text">
                            <div>{{$post->id_jenis}}</div>
                        </td>
                        <td class="table-text">
                            <div>{{$post->namakategori}}</div>
                        </td>
                        <td>
                            <a href="{{route('editkategori',$post->id)}}" class="fa fa-edit label label-warning"> Edit</a>
                            <a href="{{ route('deletekategori', $post->id) }}" class="fa fa-trash label label-danger" onclick="return confirm('Are you sure to delete?')"> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    <!-- <h3><a href='/' class="label label-primary pull-right">Back</a></h3> -->
</div>
</div>
@endsection