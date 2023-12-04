@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal Pembayaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Jadwal Pembayaran</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.payment.schedule.update', ['id'=> $data->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-10 offset-md-1 ">
                        <!-- general form elements -->
                        <div class="card card-primary shadow">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Jadwal Pembayaran</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputTitle">Judul</label>
                                                <input value="{{$data -> title}}" type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Masukan Judul Jadwal Pembayaran">
                                                @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPublisher">Penerbit</label>
                                                <input value="{{$data -> publisher}}" type="text" name="publisher" class="form-control" id="exampleInputPublisher" placeholder="Masukan Penerbit"></input>
                                                @error('publisher')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputRecipient">Penerima</label>
                                                <input value="{{$data -> recipient}}" type="text" name="recipient" class="form-control" id="exampleInputRecipient" placeholder="Masukan Penerima">
                                                @error('recipient')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputBatch">Tahap</label>
                                                <select require class="form-control" name="batch" id="exampleInputBatch">
                                                    <option value="" selected></option>
                                                    <option value="Tahap 1" {{$data->batch == 'Tahap 1' ? 'selected' : ''}}>Tahap 1</option>
                                                    <option value="Tahap 2" {{$data->batch == 'Tahap 2' ? 'selected' : ''}}>Tahap 2</option>
                                                </select>
                                                @error('batch')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStartYear">Sejak</label>
                                                <input value="{{$data -> start_date}}" type="date" name="start_date" class="form-control" id="exampleInputStartYear" placeholder="Masukan Periode Mulai">
                                                @error('start_date')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEndYear">Sampai</label>
                                                <input value="{{$data -> end_date}}" type="date" name="end_date" class="form-control" id="exampleInputEndYear" placeholder="Masukan Periode Akhir">
                                                @error('end_date')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputDesc">Keterangan</label>
                                                <textarea name="desc" class="form-control" id="exampleInputDesc" placeholder="Masukan Keterangan">{{$data->desc}}</textarea>
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
                                    <a href="{{route('admin.payment.schedule.index')}}" class="btn btn-danger">Cancel</a>
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