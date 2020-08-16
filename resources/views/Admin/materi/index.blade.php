@extends('adminlte::page')

@section('title', 'Kategori Kelas')

@section('content_header')
    <div class="card" style="background-color : #F4F4F4">
        <div class="row">
            <div class="col">
                <p class="mb-2 mt-2 ml-4 text-lg">Materi Pelajaran (BAB)</p>
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
            <h3 class="card-title">Data Tabel Materi Pelajaran (BAB)</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="materi" class="table table-bordered table-striped table-hover"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th style="width: 1%">No.</th>
                                <th>Nama Materi (BAB)</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mtr as $mpl)
                                <tr>
                                    <td>{{ ++$start }}.</td>
                                    <td>{{ $mpl->nama_materi }}</td>
                                    <td>{{ $mpl->materipelajaran->mata_pelajaran }}</td>
                                    <td>{{ $mpl->materipelajaran->kelas->nama_kelas }}</td>
                                    <td>{{ $mpl->file }}</td>
                                    <td>
                                        <a href="{{ route('lihatmateri.edit', $mpl->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-book-reader" aria-hidden="true" title="Baca"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
        <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Materi Pelajaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="tahun-pelajaran">Nama Materi (BAB)</label>
                                <input  id="materi" placeholder="Masukkan Nama Materi (BAB)" type="text" name="materi" class="form-control" required>
                            </div>
                            <div class="col-sm-12">
                                <label for="tahun-pelajaran">Kelas</label>
                                <select class="form-control" id="kelas" name="kelas" data-live-search="true" style="width:100%">
                                    <option selected="selected">Pilih Kelas</option>
                                    @foreach ($kelas as $mpl)
                                        <option value="{{ $mpl->id }}">{{ $mpl->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="tahun-pelajaran">Mata Pelajaran</label>
                                <select class="form-control" id="matapelajaran" name="matapelajaran" data-live-search="true" style="width:100%"></select>
                            </div>
                            <div class="col-sm-12">
                                <label for="tahun-pelajaran">File Materi</label>
                                <input id="file" type="file" name="file" class="form-control" required>
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

        $("#materi").DataTable();

        $('#kelas').on('change', function (e) {
            if($("#kelas").val() > 0) {
            $.ajax({
                type:'POST',
                dataType: 'json',
                url:'{{ url("/ajaxRequest") }}',
                data:{
                    _token: "{{ csrf_token() }}",
                    id_kelas:$("#kelas").val()
                },
                success:function(data){
                    $("#matapelajaran").empty();
                    $.each(data, function(index, item) {
                      $.each(item, function (index2, val) {
                          $('#matapelajaran').append($('<option>', { value : val.id}).text(val.mata_pelajaran));
                      })
                    })
                }
            });
            }
        });
    </script>
@stop
