@extends('admin.adminlte')
@section('content')
<link rel="stylesheet" href="{{url('assets/addons/bootstrap.min.css')}}">
<script src="{{url('assets/addons/jquery.min.js')}}"></script>
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
                <h3>Tambah Kategori <a href="{{ route('daftarkategori') }}" class="label label-primary pull-right">Back</a></h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('insertkategori') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group-md">
                        <div class="col-xl-4">
                            <label for="namajenis" class="col-sm-4 control-label">Nama Jenis</label>
                        </div>
                        <div class="col-md-6 ">
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="">--Select Jenis--</option>
                                @foreach ($inijenis as $jenisdata)
                                <option value="{{$jenisdata->id_jenis}}"> {{$jenisdata->nama_jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br/><br/><br/>
                    <div class="form-group">
                        <div class="col-xl-4">
                            <label class="control-label col-sm-4" >Nama Kategori</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="namakategori" id="namakategori" class="form-control">
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-md-6">
                            <input type="submit" class="btn btn-default" value="Submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection