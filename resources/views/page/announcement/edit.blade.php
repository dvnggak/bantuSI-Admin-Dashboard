@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengumuman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Pengumuman</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.announcement.update', ['code'=> $data->code])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-10 offset-md-1 ">
                        <!-- general form elements -->
                        <div class="card card-primary shadow">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Data Pengumuman</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFileCode">Kode Pengumuman</label>
                                                <input value="{{$data -> code}}" type="text" name="code" class="form-control" id="exampleInputFileCode" placeholder="Masukan Kode Pengumuman">
                                                @error('code')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFileTitle">Judul Pengumuman</label>
                                                <input value="{{$data -> title}}" type="text" name="title" class="form-control" id="exampleInputFileTitle" placeholder="Masukan Judul Pengumuman">
                                                @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFileDate">Tanggal</label>
                                                <input value="{{$data -> date}}" type="date" name="date" class="form-control" id="exampleInputFileDate" placeholder="Masukan Tanggal">
                                                @error('date')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputCategory">Kategori Pengumuman</label>
                                                <input value="{{$data -> category}}" type="text" name="category" class="form-control" id="exampleInputCategory" placeholder="Masukan Kategori Pengumuman">
                                                @error('category')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPublisher">Penerbit Pengumuman</label>
                                                <input value="{{$data -> publisher}}" type="text" name="publisher" class="form-control" id="exampleInputPublisher" placeholder="Masukan Penerbit Pengumuman">
                                                @error('publisher')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputDesc">Deskripsi</label>
                                                <textarea name="desc" class="form-control" id="exampleInputDesc" placeholder="Masukan Deskripsi">{{$data->desc}}</textarea>
                                                @error('desc')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLink">Tautan</label>
                                                <input value="{{$data -> link}}" type="text" name="link" class="form-control" id="exampleInputLink" placeholder="Masukan Tautan">
                                                @error('link')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.announcement.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection