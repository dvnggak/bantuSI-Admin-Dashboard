@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Dosen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Dosen</li>
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
                            <a href="{{route('admin.majoring.lecturers.create')}}" class="btn btn-primary mb-3">Tambah Dosen</a>

                            <div class="card-tools">
                                <form action="{{route('admin.majoring.lecturers.index')}}" method="get">
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
                                        <th>NIK</th>
                                        <th>NIDN</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Universitas</th>
                                        <th>Fakultas</th>
                                        <th>Program Studi</th>
                                        <th>Jabatan Fungsional</th>
                                        <th>Status Ikatan Kerja</th>
                                        <th>Pendidikan Tertinggi</th>
                                        <th>Status</th>
                                        <th>E-mail</th>
                                        <th>Nomor Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->nik}}</td>
                                        <td>{{$d->nidn}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->gender}}</td>
                                        <td>{{$d->university}}</td>
                                        <td>{{$d->faculty}}</td>
                                        <td>{{$d->study_program}}</td>
                                        <td>{{$d->functional_position}}</td>
                                        <td>{{$d->employment_status}}</td>
                                        <td>{{$d->highest_education}}</td>
                                        <td>{{$d->status}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>{{$d->phone_number}}</td>
                                        <td>
                                            <a href="{{route('admin.majoring.lecturers.edit', ['nik' => $d->nik])}}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" data-target="#modal-delete{{$d->nik}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                        <div class="modal fade" id="modal-delete{{$d->nik}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Confirm Delete Dosen</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Kamu yakin ingin menghapus data Dosen <br /> <b>{{ $d->nik }}</b> - <b>{{ $d->name }}</b>?&hellip;</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <form action="{{route('admin.majoring.lecturers.delete', ['nik' => $d->nik])}}" method="post">
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