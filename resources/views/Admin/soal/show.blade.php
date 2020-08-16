@extends('adminlte::page')

@section('title', 'Ujian')

@section('content_header')
    <div class="card" style="background-color : #F4F4F4">
        <div class="row">
            <div class="col">
                <p class="mb-2 mt-2 ml-4 text-lg">Soal</p>
            </div>
            <div class="col mb-2 mt-2 mr-4">
                {{--<button type="button" class="btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal-add">Tambah</button>--}}
{{--                <a href="" class="btn btn-sm btn-primary float-md-right">Tambah</a>--}}
            </div>
        </div>
    </div>
    @if (($message = Session::get('success')) || $message = Session::get('error'))
        <div class="alert alert-{{ Session::get('success') ? 'success' : 'danger' }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! $message  !!}
        </div>
    @endif
@stop


@section('content')
    @php($start = 0)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Tabel Soal </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="uji" class="table table-bordered table-striped table-hover"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th style="width: 1%">No.</th>
                                <th>Soal</th>
{{--                                <th>Kelas</th>--}}
{{--                                <th>Mapel</th>--}}
{{--                                <th>Materi</th>--}}
                                <th>Jawaban A</th>
                                <th>Jawaban B</th>
                                <th>Jawaban C</th>
                                <th>Jawaban D</th>
                                <th>Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($soal as $pertanyaan)
                                <tr>
                                    <td>{{ ++$start }}.</td>
                                    <td>{{ $pertanyaan->soal }}</td>
{{--                                    <td>{{ $pertanyaan->soalkelas->nama_kelas }}</td>--}}
{{--                                    <td>{{ $pertanyaan->soalmapel->mata_pelajaran }}</td>--}}
{{--                                    <td>{{ $pertanyaan->soalmateri->nama_materi }}</td>--}}
                                    <td>{{ $pertanyaan->jawaban_A }}</td>
                                    <td>{{ $pertanyaan->jawaban_B }}</td>
                                    <td>{{ $pertanyaan->jawaban_C }}</td>
                                    <td>{{ $pertanyaan->jawaban_D }}</td>
                                    <td>{{ $pertanyaan->jawaban }}</td>
                                    <td>
{{--                                        <a href="" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Edit"></i></a>--}}
                                        <a href="" class="btn btn-sm btn-primary"><i class="fas fa-chalkboard-teacher" aria-hidden="true" title="Ujian"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $("#uji").DataTable();
    </script>
@stop

