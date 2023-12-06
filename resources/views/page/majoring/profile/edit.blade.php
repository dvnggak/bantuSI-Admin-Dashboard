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
                        <li class="breadcrumb-item active">Edit Profil Prodi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.majoring.profile.update', ['id'=> $data->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Profil Prodi</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputMajoring">Jurusan</label>
                                                <input value="{{$data -> majoring}}" type="text" name="majoring" class="form-control" id="exampleInputMajoring" placeholder="Masukan Nama Jurusan">
                                                @error('majoring')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFaculty">Fakultas</label>
                                                <input value="{{$data -> faculty}}" type="text" name="faculty" class="form-control" id="exampleInputFaculty" placeholder="Masukan Nama Fakultas">
                                                @error('faculty')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUniversity">Universitas</label>
                                                <input value="{{$data -> university}}" type="text" name="university" class="form-control" id="exampleInputUniversity" placeholder="Masukan Nama Universitas">
                                                @error('university')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputProgramType">Tipe Program</label>
                                                <select class="form-control" name="program_type" id="exampleInputProgramType">
                                                    <option value="" selected></option>
                                                    <option value="Program Sarjana" {{ $data->program_type == 'Program Sarjana' ? 'selected' : '' }}>Program Sarjana</option>
                                                    <option value="Program Pasca Sarjana" {{ $data->program_type == 'Program Pasca Sarjana' ? 'selected' : '' }}>Program Pasca Sarjana</option>
                                                    <option value="Program Diploma" {{ $data->program_type == 'Program Diploma' ? 'selected' : '' }}>Program Diploma</option>
                                                </select>
                                                @error('program_type')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputAccreditation">Akreditasi</label>
                                                <select class="form-control" name="accreditation" id="exampleInputAccreditation">
                                                    <option value="" selected></option>
                                                    <option value="A" {{ $data->accreditation == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="B" {{ $data->accreditation == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="C" {{ $data->accreditation == 'C' ? 'selected' : '' }}>C</option>
                                                </select>
                                                @error('accreditation')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputStudyTime">Durasi Pendidikan</label>
                                                <select class="form-control" name="study_time" id="exampleInputStudyTime">
                                                    <option value="" selected></option>
                                                    <option value="3 Semester" {{ $data->study_time == '3 Semester' ? 'selected' : '' }}>3 Semester</option>
                                                    <option value="6 Semester" {{ $data->study_time == '6 Semester' ? 'selected' : '' }}>6 Semester</option>
                                                    <option value="8 Semester" {{ $data->study_time == '8 Semester' ? 'selected' : '' }}>8 Semester</option>
                                                </select>
                                                @error('study_time')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputVision">Visi</label>
                                                <textarea name="vision" class="form-control" id="exampleInputVision" placeholder="Masukan Visi">{{$data-> vision}}</textarea>
                                                @error('vision')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputMision">Misi</label>
                                                <textarea name="mission" class="form-control" id="exampleInputMision" placeholder="Masukan Misi">{{$data->mission}}</textarea>
                                                @error('mission')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudentCompetence">Kompetensi Lulusan</label>
                                                <textarea name="student_competence" class="form-control" id="exampleInputStudentCompetence" placeholder="Masukan Kompetensi Lulusan">{{$data->student_competence}}</textarea>
                                                @error('student_competence')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputDesc">Keterangan</label>
                                                <textarea name="description" class="form-control" id="exampleInputDesc" placeholder="Masukan Keterangan">{{$data->description}}</textarea>
                                                @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.majoring.profile.index')}}" class="btn btn-danger">Cancel</a>
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