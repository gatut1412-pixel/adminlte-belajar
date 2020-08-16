@extends('adminlte::page')

@section('title', 'Soal')

@section('content_header')
    <h1>Soal</h1>
@stop

@section('content')
<div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Ujian</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form">
            <div class="card-body">
              <div class="col-sm-12">
                  <label for="tahun-pelajaran">Kelas</label>
                  <select class="form-control" id="kelas" name="kelas" data-live-search="true" style="width:100%">
                      <option selected="selected">Pilih Kelas</option>
                      @foreach ($kls as $mpl)
                          <option value="{{ $mpl->id }}">{{ $mpl->nama_kelas }}</option>
                      @endforeach

                  </select>
              </div>
              <div class="col-sm-12">
                  <label for="tahun-pelajaran">Mata Pelajaran</label>
                  <select class="form-control" id="mapel" name="mapel" data-live-search="true" style="width:100%">
                      <option selected="selected">Pilih Mata Pelajaran</option>
                      @foreach ($mapel as $mpl)
                          <option value="{{ $mpl->id }}">{{ $mpl->mata_pelajaran }}</option>
                      @endforeach

                  </select>
              </div>
              <div class="col-sm-12">
                  <label for="tahun-pelajaran">Materi</label>
                  <select class="form-control" id="materi" name="materi" data-live-search="true" style="width:100%">
                      <option selected="selected">Pilih Materi</option>
                      @foreach ($materi as $mpl)
                          <option value="{{ $mpl->id }}">{{ $mpl->nama_materi }}</option>
                      @endforeach

                  </select>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
              <a href="{{route('ujian.create')}}" class="btn btn-sm btn-primary float-md-right">Continue</a>
            </div>
          </form>
        </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

    // $("#materi").DataTable();

    $('#kelas').on('change', function (e) {
        if($("#kelas").val() > 0) {
        $.ajax({
            type:'POST',
            dataType: 'json',
            url:'{{ url("/ajaxRequestmapel") }}',
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
            url:'{{ url("/ajaxRequestmapel") }}',
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
