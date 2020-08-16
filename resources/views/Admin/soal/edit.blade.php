@extends('adminlte::page')
@section('title', 'Tambah Soal')
@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>Edit Soal {{ $soal->soal }}</h1>
        </div>
    </div>
@endsection @section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Edit Soal</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('tambahsoal.update', $soal->id) }}"  method="post" enctype="multipart/form-data" method="POST">
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
                            <label for="judul">Isi Soal</label>
                            <input type="text" class="form-control" id="soal" value="{{$soal->soal}}" name="soal">
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control">
                                @foreach ($kls as $mpl)
                                    <option value="{{ $mpl->id }}" {{ $mpl->id == $mpl->nama_kelas ? 'selected' : '' }}>{{ $mpl->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Mapel</label>
                            <select name="mapel" id="mapel" class="form-control">
                                @foreach ($mapel as $mpl)
                                    <option value="{{ $mpl->id }}" {{ $mpl->id == $mpl->mata_pelajaran ? 'selected' : '' }}>{{ $mpl->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Materi</label>
                            <select name="materi" id="materi" class="form-control">
                                @foreach ($materi as $mpl)
                                    <option value="{{ $mpl->id }}" {{ $mpl->id == $mpl->nama_materi ? 'selected' : '' }}>{{ $mpl->nama_materi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="option1">Jawaban A</label>
                            <input type="text" class="form-control" id="jawabanA" value="{{$soal->jawaban_A}}"
                                   name="jawabanA" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="option1">Jawaban B</label>
                            <input type="text" class="form-control" id="jawabanB" value="{{$soal->jawaban_B}}"
                                   name="jawabanB" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="option1">Jawaban C</label>
                            <input type="text" class="form-control" id="jawabanC" value="{{$soal->jawaban_C}}"
                                   name="jawabanC" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="option1">Jawaban D</label>
                            <input type="text" class="form-control" id="jawabanD" value="{{$soal->jawaban_D}}"
                                   name="jawabanD" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="option1">Jawaban</label>
                            <input type="text" class="form-control" id="jawaban" value="{{$soal->jawaban}}"
                                   name="jawaban" autocomplete="off">
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

        // $('#mapel').on('change', function (e) {
        //     if($("#mapel").val() > 0) {
        //         $.ajax({
        //             type:'POST',
        //             dataType: 'json',
        //             url:'{{ url("/ajaxRequest1") }}',
        //             data:{
        //                 _token: "{{ csrf_token() }}",
        //                 id_mapel:$("#mapel").val()
        //             },
        //             success:function(data){
        //                 $("#materi").empty();
        //                 $.each(data, function(index, item) {
        //                     $.each(item, function (index2, val) {
        //                         $('#materi').append($('<option>', { value : val.id}).text(val.nama_materi));
        //                     })
        //                 })
        //             }
        //         });
        //     }
        // });
    </script>
@stop
