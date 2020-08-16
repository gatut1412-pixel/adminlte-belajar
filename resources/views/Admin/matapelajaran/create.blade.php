@extends('adminlte::page')

@section('title', 'Tambah materi')

@section('content_header')
    <h1>Tambah Materi Pelajaran</h1>
@endsection

@section('content')

@endsection

@section('js')
    <script>
        $(function () {
            $("#kategori").select2();
        });
    </script>
@stop
