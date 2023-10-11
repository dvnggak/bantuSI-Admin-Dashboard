@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Skripsi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Skripsi</li>
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
                <!-- /.content -->
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title mt-2">Persyaratan</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{route('admin.skripsi.syarat.create')}}" class="btn btn-primary float-sm-right">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skripsi_syarat as $syarats)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$syarats->title}}</td>
                                        <td>{{$syarats->description}}</td>
                                        <td>{{$syarats->file}}</td>
                                        <td class="float-sm-right">
                                            <a href="{{route('admin.skripsi.syarat.edit', ['id' => $syarats->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" data-target="#modal-delete{{$syarats->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-delete{{$syarats->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirm Delete Mata Kuliah</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Kamu yakin ingin menghapus data Persyaratan <b>{{$syarats->title}}</b>?&hellip;</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <form action="{{route('admin.skripsi.syarat.delete', ['id' => $syarats->id])}}" method="post">
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title mt-2">Panduan</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{route('admin.skripsi.panduan.create')}}" class="btn btn-primary float-sm-right">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skripsi_panduan as $panduans)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$panduans->title}}</td>
                                        <td>{{$panduans->description}}</td>
                                        <td>{{$panduans->file}}</td>
                                        <td class="float-sm-right">
                                            <a href="{{route('admin.skripsi.panduan.edit', ['id' => $panduans->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" data-target="#modal-delete{{$panduans->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-delete{{$panduans->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirm Delete Mata Kuliah</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Kamu yakin ingin menghapus data Panduan <b>{{$panduans->title}}</b>?&hellip;</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <form action="{{route('admin.skripsi.panduan.delete', ['id' => $panduans->id])}}" method="post">
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title mt-2">Pengumuman</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{route('admin.skripsi.pengumuman.create')}}" class="btn btn-primary float-sm-right">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skripsi_pengumuman as $pengumuman)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pengumuman->title}}</td>
                                        <td>{{$pengumuman->description}}</td>
                                        <td>{{$pengumuman->file}}</td>
                                        <td class="float-sm-right">
                                            <a href="{{route('admin.skripsi.pengumuman.edit', ['id' => $pengumuman->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" data-target="#modal-delete{{$pengumuman->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-delete{{$pengumuman->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirm Delete Pengumuman</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Kamu yakin ingin menghapus data Pengumuman <b>{{$pengumuman->title}}</b>?&hellip;</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <form action="{{route('admin.skripsi.pengumuman.delete', ['id' => $pengumuman->id])}}" method="post">
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title mt-2">Berkas</h3>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{route('admin.skripsi.pengumuman.create')}}" class="btn btn-primary float-sm-right">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skripsi_file as $file)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$file->title}}</td>
                                        <td>{{$file->description}}</td>
                                        <td>{{$file->file}}</td>
                                        <td class="float-sm-right">
                                            <a href="{{route('admin.skripsi.file.edit', ['id' => $file->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" data-target="#modal-delete{{$file->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-delete{{$file->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirm Delete Berkas</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Kamu yakin ingin menghapus data Berkas <b>{{$file->title}}</b>?&hellip;</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <form action="{{route('admin.skripsi.file.delete', ['id' => $file->id])}}" method="post">
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
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection