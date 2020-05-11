@extends('panel.layouts.app')

@section('content')
@php
@$config = $template->config == null ? [] : $template->config;
@endphp
<!-- Content Wrapper. Contains page content -->

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{$template->title}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li><a href="{{route(config('iziecode.dashboard-route'))}}"><i class="fa fa-dashboard"></i> Home</a></li> /
                    <li class="active">{{$template->title}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><i class="{{$template->icon}}"></i> Form Tambah {{$template->title}}</h3>
            </div>
            <form action="{{route("$template->route".".store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @foreach($form as $value)
                    {!!Render::form($value)!!}
                    @endforeach
                    @if($template->route == 'panel.gallery')
                        <div class="photo-file" style="display : none;">
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label">File (Max 500 Kb) :</label>
                                <div class="col-sm-12">
                                    <div class="input-group input-group">
                                        <input type="file" name="value" class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="url-file" style="display : none;">
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label">URL Video</label>
                                <div class="col-sm-12">
                                    <input type="text" name="value" class="form-control" autofocus>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('css')
<style>
    /* #datatables th,#datatables td, #datatables thead{
            border : 1px solid #b9b9b9;
            border-bottom: 1px solid #b9b9b9 !important;
        }
        #datatables th{
            text-align: center;
        } */

</style>
@endpush
@push('js')
<!-- page script -->
<script>
    function show(value){
        if(value == "photo"){
            $(".photo-file").fadeIn();
            $(".url-file").fadeOut();
        }else if("video"){
            $(".photo-file").fadeOut();
            $(".url-file").fadeIn();
        }
        else{
            $(".photo-file").fadeOut();
            $(".url-file").fadeOut();
        }
    }

    $(".select-type").change(function(){      
    var value = $(".select-type").val(); 
        show(value);
    });
</script>
@endpush
