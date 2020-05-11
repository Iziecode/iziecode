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
                    <li><a href="{{route('panel.dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li> /
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
                <h3 class="card-title"><i class="{{$template->icon}}"></i> Form Ubah{{$template->title}}</h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:200px"></th>
                        <th style="width:20px"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>                                                                                       
                       @foreach ($form as $item)
                            @if (array_key_exists('type',$item) && $item['type'] == 'password')
                            
                            @elseif(array_key_exists('type',$item) && $item['type'] == 'file')
                            <tr>
                                <td>{{$item['label']}}</td>
                                <td>:</td>
                                <td>
                                    <a href="{{asset($data->{$item['name']})}}" target="_blank">{{$data->{$item['name']} }}</a>
                                </td>
                            </tr>
                            @elseif(array_key_exists('view_relation',$item) && !empty($item['view_relation']))
                            <tr>
                                <td>{{$item['label']}}</td>
                                <td>:</td>
                                <td>
                                    {{AppHelper::viewRelation($data,$item['view_relation'])}}
                                </td>
                            </tr>
                            @elseif(array_key_exists('format',$item) && !empty($item['format']))
                                <tr>
                                    @if ($item['format'] == 'rupiah')
                                        <td>{{$item['label']}}</td>
                                        <td>:</td>
                                        <td>Rp. {!! number_format($data->{$item['name']},2,',','.') !!}</td>
                                    @endif
                                </tr>
                            @else
                            <tr>
                                <td>{{$item['label']}}</td>
                                <td>:</td>
                                <td>{!! $data->{$item['name']} !!}</td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </tbody>
            </table>
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
    $(function () {
        $('#datatables').DataTable()
        $('#full-datatables').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })

</script>

@endpush
