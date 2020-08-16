@extends('adminlte::page')

@section('title', 'Ujian')

@section('content_header')
    <h1>Soal Ujian</h1>
@endsection

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
                  <label for="tahun-pelajaran">Soal</label>
                  <textarea class="form-control" rows="3" placeholder="Soal"></textarea>
              </div>
              <div class="col-sm-12">
              <p><input type="checkbox" name="" value="" /> C</p>

              <p><input type="checkbox" name="" value="" /> C++</p>

              <p><input type="checkbox" name="" value="" /> C#</p>

              <p><input type="checkbox" name="" value="" /> Java</p>

              <p><input type="checkbox" name="" value="" /> PHP</p>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Sebelumnya</button>
              <button type="submit" class="btn btn-primary">Selanjutnya</button>
              <!-- <a href="{{route('ujian.create')}}" class="btn btn-sm btn-primary float-md-right">Continue</a> -->
            </div>
          </form>
        </div>

@endsection

@section('js')
    <script>
        // $(function () {
        //     $("#kategori").select2();
        // });
    </script>
@stop
