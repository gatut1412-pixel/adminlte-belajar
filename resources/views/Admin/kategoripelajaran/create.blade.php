@extends('adminlte::page')

@section('title', 'Tambah Kategori')

@section('content_header')
    <h1>Tambah Kategori kelas</h1>
@endsection

@section('content')

@endsection

@section('js')
    <script>
        $(function () {
            $("#level").select2();
        });
    </script>
@stop
