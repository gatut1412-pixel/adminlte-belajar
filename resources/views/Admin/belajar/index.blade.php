@extends('adminlte::page')

@section('title', 'Belajar Materi')

@section('content_header')
    <h1>Belajar Materi</h1>
@stop

@section('content')
    <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Materi Sesuai Jenjang</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">SD</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">SMP</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">SMA</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="dataTables_length" id="example1_length">
                                            <label>Show
                                                <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>Search:
                                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="tahun-ajaran" class="table table-bordered table-striped table-hover"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th style="width: 1%">No.</th>
                                                <th>Nama Materi</th>
                                                <th>Pelajaran</th>
                                                <th>Kategori Kelas</th>
                                                <th>Jenjang</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($learn as $study)
                                                <tr>
                                                    <td>{{ ++$start }}.</td>
                                                    <td>{{ $study->jenjang }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>
                                                        <a href="{{ route('belajar.show', $study->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Baca"></i></a>
                                                        <a href="{{ route('belajar.edit', $study->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="dataTables_length" id="example1_length">
                                            <label>Show
                                                <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>Search:
                                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="tahun-ajaran" class="table table-bordered table-striped table-hover"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th style="width: 1%">No.</th>
                                                <th>Nama Materi</th>
                                                <th>Pelajaran</th>
                                                <th>Kategori Kelas</th>
                                                <th>Jenjang</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($learn as $study)
                                                <tr>
                                                    <td>{{ ++$start }}.</td>
                                                    <td>{{ $study->jenjang }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>
                                                        <a href="{{ route('belajar.show', $study->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Baca"></i></a>
                                                        <a href="{{ route('belajar.edit', $study->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="dataTables_length" id="example1_length">
                                            <label>Show
                                                <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>Search:
                                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="tahun-ajaran" class="table table-bordered table-striped table-hover"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th style="width: 1%">No.</th>
                                                <th>Nama Materi</th>
                                                <th>Pelajaran</th>
                                                <th>Kategori Kelas</th>
                                                <th>Jenjang</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($learn as $study)
                                                <tr>
                                                    <td>{{ ++$start }}.</td>
                                                    <td>{{ $study->jenjang }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>{{ $study->kategori_kelas }}</td>
                                                    <td>
                                                        <a href="{{ route('belajar.show', $study->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Baca"></i></a>
                                                        <a href="{{ route('belajar.edit', $study->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square" aria-hidden="true" title="Edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
