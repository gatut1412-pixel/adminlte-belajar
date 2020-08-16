@extends('adminlte::page')

@section('title', 'Mata Pelajaran')

@section('content_header')
    <div class="card" style="background-color : #F4F4F4">
        <div class="row">
            <div class="col">
                <p class="mb-2 mt-2 ml-4 text-lg">Materi Pelajaran</p>
            </div>
            <div class="col mb-2 mt-2 mr-4">
                <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal-add">Tambah</button>
            </div>
        </div>
    </div>
    @if (($message = Session::get('success')) || $message = Session::get('error'))
        <div class="alert alert-{{ Session::get('success') ? 'success' : 'danger' }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! $message  !!}
        </div>
    @endif
@endsection

@section('content')
    @php($start = 0)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Tabel Materi Pelajaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="mapel" class="table table-bordered table-striped table-hover"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th style="width: 1%">No.</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($matpel))
                            @foreach($matpel as $pelajaran)
                                <tr>
                                    <td>{{ ++$start }}.</td>
                                    <td>{{ $pelajaran->mata_pelajaran }}</td>
                                    <td>{{ $pelajaran->kelas->nama_kelas }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Modaledit-{{ $pelajaran->id }}">Edit</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="Modaledit-{{ $pelajaran->id }}" style="display: none;" aria-hidden="true">
                                    <form action="{{ route('matapelajaran.update', $pelajaran->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-dialog">
                                            @method('PATCH')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Mata Pelajaran</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label for="semester">Mata Pelajaran</label>
                                                            <input id="matpel" placeholder="Masukkan mata pelajaran" type="text" name="matpel" class="form-control" value="{{$pelajaran->mata_pelajaran}}" required>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label for="tahun-pelajaran">Kelas</label>
                                                            <input id="kelas" placeholder="{{$pelajaran->kelas->nama_kelas}}" type="text" name="kelas" class="form-control" value="{{$pelajaran->kelas->id_kelas}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
        <form action="{{ route('matapelajaran.store') }}" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Tahun Pelajaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="tahun-pelajaran">Kelas</label>
                                <select class="form-control" id="kelas" name="kelas" data-live-search="true" style="width:100%">
                                    @foreach ($kls as $mpl)
                                        <option value="{{ $mpl->id }}">{{ $mpl->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="tahun-pelajaran">Nama Mata Pelajaran</label>
                                <input id="matapelajaran" placeholder="Masukkan Nama Mata Pelajaran" type="text" name="matapelajaran" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $("#mapel").DataTable();
    </script>
@stop
