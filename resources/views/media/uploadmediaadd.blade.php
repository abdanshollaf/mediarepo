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
                <h3>Upload Media</h3>
            </div>
            <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{route('insertmedia')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
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
                    <div class="form-group-md">
                        <div class="col-xl-4">
                                <label for="kategori" class="col-sm-4 control-label">Nama Kategori</label>
                            </div>
                        <div class="col-md-6">
                            <select name="kategori" id="kategori" class="form-control">
                                <option>--Kategori--</option>
                            </select>
                        </div>
                    </div>
                    <br/><br/><br/>
                    <div class="form-group-md">
                        <div class="col-xl-4">
                                <label class="control-label col-sm-4" >Keterangan</label>
                        </div>
                                <div class="col-md-6">
                                    <input type="text" name="keterangan" id="keterangan" class="form-control">
                                </div>
                        </div>
                        <br/><br/><br/>
                            <div class="form-group-md">
                                <div class="col-xl-4">
                                        <label class="control-label col-sm-4" >File Foto/Video</label>
                                </div>
                                    <div class="col-md-6">
                                        <input type="file" id="namafile" name="namafile[]" multiple class="form-control">
                                    </div>
                                </div>
                            <br/><br/><br/>
                        <div class="form-group-md">
                        <div class="col-sm-offset-5  col-md-6">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </div>
                    <br/>
                </form>
                </div>
        
</div>
</div>
</div>
<script>
        $(document).ready(function() {
            $('#jenis').change(function(){
                var jenis_id = $(this).val();
                if(jenis_id){
        $.ajax({
        type:"GET",
        url:"{{url('getkategorilist')}}?id_jenis="+jenis_id,
        success:function(res){
        if(res){
        $("#kategori").empty();
        $("#kategori").append('<option>Select</option>');
        $.each(res,function(key,value){
        $("#kategori").append('<option value="'+key+'">'+value+'</option>');
        });
        
        }else{
        $("#kategori").empty();
        }
        }
        });
        }else{
        $("#kategori").empty();
        }
        });
        });
        </script>
@endsection