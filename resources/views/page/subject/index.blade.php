@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Mata Kuliah</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Mata Kuliah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>

                            <div class="card-tools">
                                <form action="{{route('admin.subject.index')}}" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control float-right" value="{{$request->get('search')}}" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Mata Kuliah</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Jenis Kelas</th>
                                        <th>SKS</th>
                                        <th>Dosen</th>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Link V-Class</th>
                                        <th>Kode Enrollment</th>
                                        <th>Link Group Mata Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->subject_code}}</td>
                                        <td>{{$d->subject_name}}</td>
                                        <td>{{$d->subject_type}}</td>
                                        <td>{{$d->subject_credit}}</td>
                                        <td>{{$d->subject_lecturer}}</td>
                                        <td>{{$d->subject_day}}</td>
                                        <td>{{$d->subject_time}}</td>
                                        <td>{{$d->subject_enrollment_link}}</td>
                                        <td>{{$d->subject_enrollment_code}}</td>
                                        <td>{{$d->subject_group_link}}</td>
                                        <td>
                                            <a href="">Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete{{$d->id}}">
                                                Delete
                                            </button>
                                        </td>
                                        <div class="modal fade" id="modal-delete{{$d->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Confirm Delete Mata Kuliah</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Kamu yakin inging menghapus data Mata Kuliah <b>{{$d->subject_name}}</b>?&hellip;</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <form action="" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection