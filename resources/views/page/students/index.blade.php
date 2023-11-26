@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Mahasiswa/i</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Mahasiswa/i</li>
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
                            <a href="{{route('admin.student.create')}}" class="btn btn-primary mb-3">Tambah Mahasiswa/i</a>

                            <div class="card-tools">
                                <form action="{{route('admin.student.index')}}" method="get">
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
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>E-mail</th>
                                        <th>Nomor Telepon</th>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Angkatan</th>
                                        <th>Fakultas</th>
                                        <th>Program Studi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->nim}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>{{$d->phone_number}}</td>
                                        <td>{{$d->first_name}}</td>
                                        <td>{{$d->last_name}}</td>
                                        <td>{{$d->gender}}</td>
                                        <td>{{$d->batch}}</td>
                                        <td>{{$d->faculty}}</td>
                                        <td>{{$d->study_program}}</td>
                                        <td>
                                            <a href="{{route('admin.student.edit', ['nim' => $d->nim])}}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" data-target="#modal-delete{{$d->nim}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                        <div class="modal fade" id="modal-delete{{$d->nim}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Confirm Delete Mahasiswa/i</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Kamu yakin ingin menghapus data Mahasiswa/i <br /> <b>{{ $d->nim }}</b> - <b>{{ $d->name }}</b>?&hellip;</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <form action="{{route('admin.student.delete', ['nim' => $d->nim])}}" method="post">
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