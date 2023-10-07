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
                        <li class="breadcrumb-item active">Tambah Mata Kuliah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.subject.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Mata Kuliah</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputSubjectCode">Kode Mata Kuliah</label>
                                                <input type="text" name="subject-code" class="form-control" id="exampleInputSubjectCode" placeholder="Masukan Kode Mata Kuliah">
                                                @error('subject-code')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubjectName">Nama Mata Kuliah</label>
                                                <input type="text" name="subject-name" class="form-control" id="exampleInputSubjectName" placeholder="Masukan Nama Mata Kuliah">
                                                @error('subject-name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubjectType">Tipe Kelas</label>
                                                <select require class="form-control" name="subject-type" id="exampleInputSubjectType">
                                                    <option value="" selected></option>
                                                    <option>Kelas Reguler</option>
                                                    <option>Kelas Karyawan</option>
                                                </select>
                                                @error('subject-type')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubjectCredit">SKS</label>
                                                <input type="number" name="subject-credit" class="form-control" id="exampleInputSubjectCredit" placeholder="Masukan SKS">
                                                @error('subject-credit')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubjectLecturer">Nama Dosen</label>
                                                <input type="text" name="subject-lecturer" class="form-control" id="exampleInputSubjectLecturer" placeholder="Masukan Nama Dosen">
                                                @error('subject-lecturer')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputSubjectDay">Hari</label>
                                                <select class="form-control" name="subject-day" id="exampleInputSubjectDay">
                                                    <option value="" selected></option>
                                                    <option>Senin</option>
                                                    <option>Selasa</option>
                                                    <option>Rabu</option>
                                                    <option>Kamis</option>
                                                    <option>Jumat</option>
                                                    <option>Sabtu</option>
                                                </select>
                                                @error('subject-day')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- time Picker -->
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>Time picker:</label>

                                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                        <input type="time" name="subject-time" class="form-control datetimepicker-input" />
                                                    </div>
                                                    @error('subject-time')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubjectEnrollmentCode">Kode Enroll</label>
                                                <input type="text" name="subject-enrollment-code" class="form-control" id="exampleInputSubjectEnrollmentCode" placeholder="Masukan Kode Enroll">
                                                @error('subject-enrollment-code')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubjectEnrollmentLink">Link V-class</label>
                                                <input type="text" name="subject-enrollment-link" class="form-control" id="exampleInputSubjectEnrollmentLink" placeholder="Masukan Link V-class">
                                                @error('subject-enrollment-link')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputSubjectGroupLink">Link Grup Mata Kuliah</label>
                                                <input type="text" name="subject-group-link" class="form-control" id="exampleInputSubjectGroupLink" placeholder="Masukan Link Grup Mata Kuliah">
                                                @error('subject-group-link')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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