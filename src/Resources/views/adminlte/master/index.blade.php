@extends(load_view('layouts.app'))

@section('content')
@php
@$config = $template->config == null ? [] : $template->config;
@endphp
<!-- Content Wrapper. Contains page content -->

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 d-flex align-items-center">
                <h1 class="m-0 text-dark d-inline mr-2">{{$template->title}}</h1>
                <div class="ez-breadcrumb">
                    <a href="{!! route(config('iziecode.dashboard-route')) !!}"> <x-ez-icon name="home-outline" class="breadcrumb-icon mr-2"/></a>
                    <a href="#"> <x-ez-icon name="chevron-forward-outline" class="breadcrumb-divider mr-2"/></a>
                    <a href="#" class="active">{{$template->title}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            {!!  \Iziedev\Iziecode\Helpers\Alert::showBox() !!}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="box-title"><x-ez-icon name="{{$template->icon}}" class="title-icon"/> List {{$template->title}}</h3>
                        <a href="{{route("$template->route".'.create')}}"
                            class="btn ez-btn primary-bg btn-primary float-right {{ \Iziedev\Iziecode\Helpers\AppHelper::config($config,'index.create.is_show') ?  \Iziedev\Iziecode\Helpers\AppHelper::config($config,'index.create.is_show') : 'hidden'}}">
                            <x-ez-icon  name="add-outline"  class="icon-center" /> Tambah {{$template->title}}
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatables">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    @foreach ($form as $item)
                                    @if (array_key_exists('view_index',$item) && $item['view_index'])
                                    @if(array_key_exists('format',$item) && $item['format'] == 'rupiah')
                                    <td>{{$item['label']}} (Rp)</td>
                                    @else
                                    <td>{{$item['label']}}</td>
                                    @endif
                                    @endif
                                    @endforeach
                                    <td>Opsi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    @foreach ($form as $item)
                                    @if (array_key_exists('view_index',$item) && $item['view_index'])
                                    <td @if(array_key_exists('format',$item) && $item['format']=='rupiah' )
                                        style="text-align:right" @endif>
                                        @if (array_key_exists('view_relation',$item))
                                        {{  \Iziedev\Iziecode\Helpers\AppHelper::viewRelation($row,$item['view_relation']) }}
                                        @else
                                        @if(array_key_exists('format',$item) && $item['format'] == 'rupiah')
                                        {{number_format($row->{$item['name']},2,',','.')}}
                                        @else
                                        {{ $row->{$item['name']} }}
                                        @endif
                                        @endif
                                    </td>
                                    @endif
                                    @endforeach
                                    <td>
                                        <a href="{{route("$template->route".'.edit',[$row->{$primaryId}])}}"
                                            class="btn ez-btn btn-success btn-sm {{ \Iziedev\Iziecode\Helpers\AppHelper::config($config,'index.edit.is_show') ? '' : 'hidden'}}">
                                            <x-ez-icon name="create-outline" class="icon-center"/>
                                        </a>
                                        <a href="{{route("$template->route".'.show',[$row->{$primaryId}])}}"
                                            class="btn ez-btn btn-info btn-sm {{ \Iziedev\Iziecode\Helpers\AppHelper::config($config,'index.show.is_show') ? '' : 'hidden'}}">
                                            <x-ez-icon name="eye-outline" class="icon-center"/>
                                        </a>
                                        <a href="#"
                                            class="btn ez-btn btn-danger btn-sm {{ \Iziedev\Iziecode\Helpers\AppHelper::config($config,'index.delete.is_show') ? '' : 'hidden'}}"
                                            onclick="confirm('Lanjutkan ?') ? $('#frmDelete{{$key}}').submit() : '' ">
                                            <x-ez-icon name="trash-outline" class="icon-center"/>
                                        </a>
                                        <form action="{{route("$template->route".'.destroy',[$row->{$primaryId}])}}" method="POST"
                                            id="frmDelete{{$key}}">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
