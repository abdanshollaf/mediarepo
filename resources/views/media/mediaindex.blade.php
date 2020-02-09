@extends('admin.adminlte')
@section('content')
<link rel="stylesheet" href="{{url('assets/addons/bootstrap.min.css')}}">
<script src="{{url('assets/addons/jquery.min.js')}}"></script>
<div class="container">
    <div class="col-lg-11">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach()
            </div>
            @endif
            @if(Session::has('success_msg'))
                <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
            @elseif(Session::has('danger_msg'))      
                <div class="alert alert-danger">{{ Session::get('danger_msg') }}</div>
            @endif
    <div class="panel panel-default">
            <div class="panel-heading">
                @if(Auth::user()->id_role == '1')
                <p>
                    <h3>Daftar Media 
                    <a href="{{ route('mediaindex') }}" class="btn btn-primary pull-right">Reset</a>
                    <div class="col-sm-1 pull-right">
                        <a href="{{ route('addmedia') }}" class="btn btn-success pull-right">Upload File</a>
                    </div>
                  </h3>
                  </p>
                  @else
                  <p>
                      <h3>Daftar Media 
                      <a href="{{ route('mediaindex') }}" class="btn btn-primary pull-right">Reset</a>
                    </h3>
                    </p>
                  @endif
                    
                </div>
    <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{route('mediaindex')}}">
                    {{csrf_field()}}
                    <div class="row">
                            <div class="form-group-md">
                                    <div class="col-sm-4">
                                        <label for="namajenis" class="col-sm-8 control-label">Nama Jenis</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="kategori" class="col-sm-8 control-label">Nama Kategori</label>
                                    </div>
                                    <div class="col-sm-4">
                                            <label for="keterangan" class="col-sm-8 control-label">Keterangan</label>
                                        </div>
                            </div>
                    </div>
                            <div class="form-group-md">
                                <div class="col-sm-4">
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="">--Select Jenis--</option>
                                            @foreach ($inijenis as $jenisdata)
                                            <option value="{{$jenisdata->id_jenis}}"
                                              @if($jenis == $jenisdata->id_jenis)
                                              {{"selected"}}
                                              @endif> {{$jenisdata->nama_jenis}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select name="kategori" id="kategori" class="form-control">
                                        @if ($kat != null)
                                        @foreach ($kats as $key => $value)
                                         <option value="{{$key}}" @if ($kat == $key)
                                             {{"selected"}}
                                         @endif>{{$value}}</option>
                                        @endforeach
                                        @else
                                        <option>--Kategori--</option>
                                        @endif
                                      </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="keterangan" id="keterangan" class="form-control" @if ($ket != null)
                                    value="{{$ket}}"
                                    @endif>
                                </div>
                            </div>
                            <div class="form-group-md">
                                    <br/><br/>
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-primary col-sm-3" value="Cari"/>
                                </div>
                            </div>
                            <br/><br/>
                    <div class="row" id="myImg">
                            @foreach($images as $image)
                            <?php
                            $caption = $image->namafile;
                            $sourcevideo = url('images/Video',$image->namafile);
                            // $contents = url('images/Foto',$image->namafile);
                        if($image->id_jenis == 1)
                        {
                            $contents = url('images/Foto',$image->namafile);
                            
                        }
                        else{
                            $contents = url('images/Video/videoplay.jpeg');
                        }   
                        ?>
                            <div class="col-md-3">
                                <div class="card" style="height:270px;width:180px">
                                <img id="content" class="card-img-top center-block" src="{{$contents}}" alt="{{$caption}}" <?php if($image->id_jenis == 2) { echo 'data-video="'.$sourcevideo.'"'; }?> style="height:185px;width:180px">
                                    <div class="card-body">
                                            <style>
                                                    body {font-family: Arial, Helvetica, sans-serif;}
                                                    
                                                            #myImg {
                                                              border-radius: 5px;
                                                              cursor: pointer;
                                                              transition: 0.3s;
                                                            }
                                                            
                                                            #myImg img:hover {opacity: 0.7;}
                                                            
                                                            /* The Modal (background) */
                                                            .modal {
                                                              display: none; /* Hidden by default */
                                                              position: fixed; /* Stay in place */
                                                              z-index: 1; /* Sit on top */
                                                              padding-top: 100px; /* Location of the box */
                                                              left: 0;
                                                              top: 0;
                                                              width: 100%; /* Full width */
                                                              height: 100%; /* Full height */
                                                              overflow: auto; /* Enable scroll if needed */
                                                              background-color: rgb(0,0,0); /* Fallback color */
                                                              background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
                                                            }
                                                            
                                                            /* Modal Content (image) */
                                                            .modal-content {
                                                              margin: auto;
                                                              display: block;
                                                              width: 100%;
                                                              max-width: 500px;
                                                            }
                                                            
                                                            /* Caption of Modal Image */
                                                            #caption {
                                                              margin: auto;
                                                              display: block;
                                                              width: 80%;
                                                              max-width: 700px;
                                                              text-align: center;
                                                              color: #ccc;
                                                              padding: 10px 0;
                                                              height: 150px;
                                                            }
                                                            
                                                            /* Add Animation */
                                                            .modal-content, #caption {  
                                                              -webkit-animation-name: zoomin;
                                                              -webkit-animation-duration: 0.6s;
                                                              animation-name: zoomin;
                                                              animation-duration: 0.6s;
                                                            }

                                                            #myModal video {
                                                              max-width: 650px;
                                                              margin: 0 auto;
                                                              display: block;
                                                            }
                                                            
                                                            @-webkit-keyframes zoomin {
                                                              from {-webkit-transform:scale(0)} 
                                                              to {-webkit-transform:scale(1)}
                                                            }
                                                            @-webkit-keyframes zoomout {
                                                              from {-webkit-transform:scale(0)} 
                                                              to {-webkit-transform:scale(1)}
                                                            }
                                                            
                                                            @keyframes zoomin {
                                                              from {transform:scale(0)} 
                                                              to {transform:scale(1)}
                                                            }

                                                            @keyframes zoomout{
                                                                from {transform:scale(1)}
                                                                to {transform:scale(0)}
                                                            }


                                                            
                                                            /* The Close Button */
                                                            .close {
                                                              position: absolute;
                                                              top: 50px;
                                                              right: 35px;
                                                              color: #f1f1f1;
                                                              font-size: 40px;
                                                              font-weight: bold;
                                                              transition: 0.6s;
                                                            }
                                                            
                                                            .close:hover,
                                                            .close:focus {
                                                              color: #bbb;
                                                              text-decoration: none;
                                                              cursor: pointer;
                                                            }
                                                            
                                                            /* 100% Image Width on Smaller Screens */
                                                            @media only screen and (max-width: 700px){
                                                              .modal-content {
                                                                width: 100%;
                                                              }
                                                            }
                                                    </style>
                                        <strong class="card-title">{{ $image->namafile }}</strong>
                                        <div id="myModal" class="modal">
                                                <span class="close">&times;</span>
                                                <img class="modal-content" id="img01">
                                                <div id="caption"></div>
                                              </div>
                                        <p class="card-text">{{ $image->created_at }}</p>
                                    </div>
                                </div>
                                <div class="card-footer"> 
                                    {{ csrf_field() }}
                                    @if(Auth::user()->id_role == '1')
                                    <a href="{{ route('deletefile', $image->id) }}"type="submit" class="btn btn-danger" style="width:190px" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    <a href="{{ route('downloadfile', $image->id) }}" class="btn btn-primary" style="width:190px">Download</a>
                                    <br/>
                                    @elseif(Auth::user()->id_role == '2')
                                    <a href="{{ route('downloadfile', $image->id) }}" class="btn btn btn-primary" style="width:190px">Download</a>
                                    @endif
                                    </div>
                                <br/><br/>
                            </div>
                            @endforeach
                        </div>
                        <div  class="page_navigation">
                            {{ $images->links() }}
                        </div>
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
<script>
        var id_media = document.getElementById('jenis');
        var img = document.getElementById('myImg');
        var captionText = document.getElementById("caption");
        var tmpImg;
        $(document).ready(function(){
          $("#myImg").find("img").on("click",function(){
            var modal = $(this).siblings().find("#myModal");
            if($(this).attr("data-video")){
              tmpImg = modal.find("#img01");
              var video = $("<video>", {
                controls: true
                }).html($("<source>", {
                  src: $(this).attr("data-video"),
                  type: "video/mp4"
                }));
              modal.find("#img01").replaceWith(video);
            }
            modal.css("display", "block")
            modal.find("#img01").attr('src', this.src);
            modal.find("#caption").html(this.alt);
          });
          $(".close").on("click", function(){
            $(this).parent().css("display", "none");
            $(this).siblings("video").each(function(){
              this.pause();
            });
          });
        })
        </script>
@endsection