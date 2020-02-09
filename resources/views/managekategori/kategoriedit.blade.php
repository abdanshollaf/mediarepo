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
                <h3>Edit Kategori <a href="{{ route('daftarkategori') }}" class="label label-primary pull-right">Back</a></h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('editkategori', $kategori->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Id Jenis</label>
                        <div class="col-xs-1">
                            <label class="control-label col-sm-1" >{{ $kategori->id_jenis }}</label>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" name="namakategori" id="namakategori" class="form-control" value="{{ $kategori->namakategori }}">
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-default" value="Update Kategori" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection