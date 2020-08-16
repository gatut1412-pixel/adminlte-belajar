@extends('adminlte::page')

@section('title', 'materi')

@section('content_header')
    <h1>Tambah Materi</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Materi</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('materi.update', $materi->id) }}" method="post"
                      enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="box-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                {!! $message !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="judul">Judul Materi</label>
                            <input type="text" class="form-control" id="judul" placeholder="Masukkan judul materi"
                                   name="judul" value="{{ $materi->judul }}" autocomplete="off"
                                   style="background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII='); cursor: auto;">
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan Materi</label>
                            <textarea name="ringkasan" id="ringkasan" class="form-control"
                                      placeholder="Masukkan ringkasan materi">{{ $materi->ringkasan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="materi">File Materi <a href="#" data-toggle="modal" data-target="#matericheck">(lihat
                                    materi)</a></label>
                            <input type="file" name="materi" id="materi">
                        </div>
                        <div class="form-group">
                            @php
                                $path = explode('/', $materi->video);
                    $type = $path[0];
                    $file = explode('.', $path[1]);
                    $name = $file[0];
                    $ext = $file[1];
                            @endphp
                            <label for="video">Video Materi <a href="{{ url("materi/get/$type/$name/$ext") }}"
                                                               target="_blank">(lihat
                                    video)</a></label>
                            <input type="file" name="video" id="video">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori Materi</label>
                            <select name="kategori" id="kategori" class="form-control">
                                @foreach($kategories as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $materi->kategori ? 'selected' : '' }}>{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="matericheck" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Lihat Materi: {{ $materi->judul }}</h4>
                </div>
                <div class="modal-body">
                    @php
                        $path = explode('/', $materi->materi);
            $type = $path[0];
            $file = explode('.', $path[1]);
            $name = $file[0];
            $ext = $file[1];
                    @endphp
                    <object type="application/pdf"
                            data="{{ url("materi/get/$type/$name/$ext") }}" width="100%"
                            height="500" style="height: 85vh;">No Support
                    </object>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $("#kategori").select2();
        });
    </script>
@stop
