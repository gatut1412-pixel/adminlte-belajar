@extends('adminlte::page')

@section('title', 'Kategori Kelas')

@section('content_header')
    <div class="card" style="background-color : #F4F4F4">
        <div class="row">
            <div class="col">
                <p class="mb-2 mt-2 ml-4 text-lg">Kategori Kelas</p>
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
            <h3 class="card-title">Data Tabel Kategori Kelas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="kelas" class="table table-bordered table-striped table-hover"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th style="width: 1%">No.</th>
                                <th>Jenjang</th>
                                <th>Kategori Kelas</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($kategorikelas))
                            @foreach($kategorikelas as $ktgr)
                                <tr>
                                    <td>{{ ++$start }}.</td>
                                    <td>{{$ktgr->jenjang }}</td>
                                    <td>{{$ktgr->nama_kelas}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Modaledit-{{ $ktgr->id }}">Edit</button>
{{--                                        <a href="{{ route('kategori.edit', $kategorikelas->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Edit" data-toggle="modal" data-target="#modal-add"></i></a>--}}
                                    </td>
                                </tr>
                                <div class="modal fade" id="Modaledit-{{ $ktgr->id }}" style="display: none;" aria-hidden="true">
        <form action="{{ route('kategori.update', $ktgr->id) }}" method="POST">
            @csrf
            <div class="modal-dialog">
                @method('PATCH')
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
                                <label for="semester">Jenjang Pendidikan</label><select name="jenjang" id="jenjang" class="form-control">
                                    <option value="SD" {{ $ktgr->jenjang == 'SD' ? 'selected' :'' }}>SD</option>
                                    <option value="SMP" {{ $ktgr->jenjang == 'SMP' ? 'selected' :'' }}>SMP</option>
                                    <option value="SMA" {{ $ktgr->jenjang == 'SMA' ? 'selected' :'' }}>SMA</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="tahun-pelajaran">Kelas</label>
                                <input id="kategori_kelas" placeholder="Masukkan kelas" type="text" name="kategori_kelas" class="form-control" value="{{$ktgr->kategori_kelas}}" required>
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
        <form action="{{ route('kategori.store') }}" method="POST">
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
                                <label for="semester">Jenjang Pendidikan</label><select name="jenjang" id="jenjang" class="form-control">
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="tahun-pelajaran">Kelas</label>
                                <input id="kategori_kelas" placeholder="Masukkan tahun pelajaran" type="text" name="kategori_kelas" class="form-control" required>
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

    <!-- Modal -->


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $("#kelas").DataTable();
    </script>
@stop
