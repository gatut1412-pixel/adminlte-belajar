@extends('adminlte::page')
@section('title', 'Edit Materi')
@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>Edit Materi {{ $matpel->mata_pelajaran }}</h1>
        </div>
    </div>
@endsection @section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Edit Materi</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('materi.update', $matpel->id) }}"  method="post" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="box-body">
                        @method('PATCH')
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                {!! $message !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="ringkasan">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control">
                                @foreach ($kelas as $mpl)
                                    <option value="{{ $mpl->id }}" {{ $mpl->id == $mpl->nama_kelas ? 'selected' : '' }}>{{ $mpl->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Mata Pelajaran</label>
                            <select name="mapel" id="mapel" class="form-control">
                                @foreach ($pljrn as $mpl)
                                    <option value="{{ $mpl->id }}" {{ $mpl->id == $mpl->mata_pelajaran ? 'selected' : '' }}>{{ $mpl->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">Nama Materi (BAB)</label>
                            <select id="materi" name="materi" class="form-control">
                                @foreach ($mtr as $mpl)
                                    <option value="{{ $mpl->nama_materi }}" {{ $mpl->id == $mpl->nama_materi ? 'selected' : '' }}>{{ $mpl->nama_materi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">File Materi</label>
                                <input id="file" type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">UBAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // $(function() {
        //     $("#kategori").select2();
        // });

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
                        $("#mapel").empty();
                        $.each(data, function(index, item) {
                            $.each(item, function (index2, val) {
                                $('#mapel').append($('<option>', { value : val.id}).text(val.mata_pelajaran));
                            })
                        })
                    }
                });
            }
        });

        $('#mapel').on('change', function (e) {
            if($("#mapel").val() > 0) {
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url:'{{ url("/ajaxRequestmateri") }}',
                    data:{
                        _token: "{{ csrf_token() }}",
                        id_mapel:$("#mapel").val()
                    },
                    success:function(data){
                        $("#materi").empty();
                        $.each(data, function(index, item) {
                            $.each(item, function (index2, val) {
                                $('#materi').append($('<option>', { value : val.id}).text(val.nama_materi));
                            })
                        })
                    }
                });
            }
        });
    </script>
@stop
