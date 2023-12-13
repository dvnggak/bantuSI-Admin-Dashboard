@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Panduan Kerja Praktek</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Panduan Kerja Praktek</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.internship.guide.update', ['code'=> $data->code])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-10 offset-md-1 ">
                        <!-- general form elements -->
                        <div class="card card-primary shadow">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Panduan Kerja Praktek</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFileCode">Kode Panduan Kerja Praktek</label>
                                                <input value="{{$data->code}}" type="text" name="code" class="form-control" id="exampleInputFileCode" placeholder="Masukan Kode Panduan Kerja Praktek">
                                                @error('code')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFileTitle">Judul Panduan Kerja Praktek</label>
                                                <input value="{{$data->title}}" type="text" name="title" class="form-control" id="exampleInputFileTitle" placeholder="Masukan Judul Panduan Kerja Praktek">
                                                @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFileDesc">Deskripsi</label>
                                                <textarea name="desc" class="form-control" id="exampleInputFileDesc" placeholder="Masukan Deskripsi">{{$data -> desc}}</textarea>
                                                @error('desc')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFileLink">Tautan</label>
                                                <input value="{{$data->file}}" type="text" name="file" class="form-control" id="exampleInputFileLink" placeholder="Masukan Tautan">
                                                @error('file')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.internship.guide.index')}}" class="btn btn-danger">Cancel</a>
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