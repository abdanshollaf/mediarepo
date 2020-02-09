@extends('admin.adminlte')
@section('content')
<div class="row">
    <div class="col-lg-11 margin-tb">
        <div class="pull-left">
            <h2>Read Post</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>nama:</strong>
            {{ $post->nama }}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>username:</strong>
                {{ $post->username }}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>password:</strong>
                    {{ $post->password }}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Published On:</strong>
                        {{ $post->created }}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Update On:</strong>
                            {{ $post->Modified }}
                        </div>
   </div>
   @endsection