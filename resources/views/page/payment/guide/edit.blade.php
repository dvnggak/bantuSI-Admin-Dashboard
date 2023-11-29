@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Panduan Pembayaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Panduan Pembayaran</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.payment.guide.update', ['id'=> $data->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-10 offset-md-1 ">
                        <!-- general form elements -->
                        <div class="card card-primary shadow">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Panduan Pembayaran</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputTitle">Judul</label>
                                                <input value="{{$data -> title}}" type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Masukan Judul Panduan Pembayaran">
                                                @error('title')
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
                                                <label for="exampleInputCategory">Kategori</label>
                                                <input value="{{$data -> category}}" type="text" name="category" class="form-control" id="exampleInputCategory" placeholder="Masukan Kategori Panduan Pembayaran">
                                                @error('category')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputBatch">Angkatan</label>
                                                <input value="{{$data -> batch}}" type="number" name="batch" class="form-control" id="exampleInputBatch" placeholder="Masukan Angkatan" min="2020" max="2050">
                                                @error('batch')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputyear">Tahun</label>
                                                <input value="{{$data -> year}}" type="number" name="year" class="form-control" id="exampleInputyear" placeholder="Masukan Tahun" min="2000" max="2050">
                                                @error('year')
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
                                    <a href="{{route('admin.payment.guide.index')}}" class="btn btn-danger">Cancel</a>
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