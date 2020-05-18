@extends(load_view('layouts.app'))

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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{ $errors->has('test1') }}
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><x-ez-icon name="{{$template->icon}}"/> Form Ubah {{$template->title}}</h3>
                    </div>
                    <form action="{{route("$template->route".".update")}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card-body">
                            {{-- <x-ez-form name="text" label="Bagus" form-group-prepend="@" form-group-append="ez-icon.add-outline" helper-text="jancuk" placeholder="Ini placeholder" layout="horizontal"/> --}}
                            {{-- {{$data->name}} --}}
                            @foreach($form as $value)
                                <x-ez-render-form :props="$value" :data="$data"/>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
    
</script>
@endpush
