@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil Prodi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Profil Prodi</li>
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
                            <a href="{{route('admin.majoring.profile.create')}}" class="btn btn-primary mb-3">Tambah Profil Prodi</a>

                            <div class="card-tools">
                                <form action="{{route('admin.majoring.profile.index')}}" method="get">
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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Program Studi</th>
                                        <th>Fakultas</th>
                                        <th>Universitas</th>
                                        <th>Tipe Program</th>
                                        <th>Akreditasi</th>
                                        <th>Durasi Pendidikan</th>
                                        <th>Visi</th>
                                        <th>Misi</th>
                                        <th>Kompetensi Lulusan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->majoring, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->faculty, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->university, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->program_type, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->accreditation, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->study_time, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->vision, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->mission, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->student_competence, 50) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($d->description, 50) }}</td>
                                        <td>
                                            <a href="{{route('admin.majoring.profile.edit', ['id' => $d->id])}}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                            <a data-toggle="modal" data-target="#modal-delete{{$d->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                        <div class="modal fade" id="modal-delete{{$d->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Confirm Delete Profil Prodi</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Kamu yakin ingin menghapus data Profil Prodi <br /> <b>{{ $d->majoring }}</b>?&hellip;</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <form action="{{route('admin.majoring.profile.delete', ['id' => $d->id])}}" method="post">
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