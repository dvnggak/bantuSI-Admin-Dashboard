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
                        <li class="breadcrumb-item active">Tambah Mahasiswa/i</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.student.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Mahasiswa/i</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputStudentNIM">NIM</label>
                                                <input type="number" name="nim" class="form-control" id="exampleInputStudentNIM" placeholder="Masukan NIM">
                                                @error('nim')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudentName">Nama Mahasiswa/i</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputStudentName" placeholder="Masukan Nama Mahasiswa/i">
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudentEmail">Email Student</label>
                                                <input type="email" name="email" class="form-control" id="exampleInputStudentEmail" placeholder="Masukan Email">
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudentPhoneNumber">Nomor Telepon</label>
                                                <input type="number" name="phone_number" class="form-control" id="exampleInputStudentPhoneNumber" placeholder="Masukan Nomor Telepon">
                                                @error('phone_number')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudentGender">Gender</label>
                                                <select class="form-control" name="gender" id="exampleInputStudentGender">
                                                    <option value="" selected></option>
                                                    <option>Laki - laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                                @error('subject-day')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputStudentFirstName">Nama Depan</label>
                                                <input type="text" name="first_name" class="form-control" id="exampleInputStudentFirstName" placeholder="Masukan Nama Depan">
                                                @error('first_name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudentLastName">Nama Belakang</label>
                                                <input type="text" name="last_name" class="form-control" id="exampleInputStudentLastName" placeholder="Masukan Nama Belakang">
                                                @error('last_name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudentBatch">Angkatan</label>
                                                <input type="number" name="batch" class="form-control" id="exampleInputStudentBatch" placeholder="Masukan Angkatan">
                                                @error('batch')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudentFaculty">Fakultas</label>
                                                <select class="form-control" name="faculty" id="exampleInputStudentFaculty" onchange="updateStudyPrograms()">
                                                    <option value="" selected></option>
                                                    <option>Ilmu Komputer & Sains</option>
                                                    <option>Teknik</option>
                                                    <option>Ekonomi</option>
                                                    <option>Keguruan & Ilmu Pendidikan</option>
                                                    <option>Ilmu Pemerintahan & Budaya</option>
                                                    <option>Stebis</option>
                                                </select>
                                                @error('faculty')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputStudyProgram">Program Studi</label>
                                                <select class="form-control" name="study_program" id="exampleInputStudyProgram">
                                                    <option value="" selected></option>
                                                </select>
                                                @error('study_program')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <script>
                                                function updateStudyPrograms() {
                                                    var facultySelect = document.getElementById('exampleInputStudentFaculty');
                                                    var studyProgramSelect = document.getElementById('exampleInputStudyProgram');

                                                    // Clear existing options
                                                    studyProgramSelect.innerHTML = '<option value="" selected></option>';

                                                    // Get selected faculty
                                                    var selectedFaculty = facultySelect.options[facultySelect.selectedIndex].text;

                                                    // Add options based on selected faculty
                                                    if (selectedFaculty === 'Ilmu Komputer & Sains') {
                                                        studyProgramSelect.add(new Option('Sistem Informasi (S1)'));
                                                        studyProgramSelect.add(new Option('Teknik Informatika (S1)'));
                                                        studyProgramSelect.add(new Option('Sistem Komputer (S1)'));
                                                        studyProgramSelect.add(new Option('Kimia (S1)'));
                                                        studyProgramSelect.add(new Option('Biologi (S1)'));
                                                        studyProgramSelect.add(new Option('Magister Ilmu Komputer (S2)'));
                                                    } else if (selectedFaculty === 'Teknik') {
                                                        studyProgramSelect.add(new Option('Teknik Sipil (S1)'));
                                                        studyProgramSelect.add(new Option('Arsitektur (S1)'));
                                                        studyProgramSelect.add(new Option('Survei & Pemetaan (D3)'));
                                                        studyProgramSelect.add(new Option('Perencanaan Wilayah & Kota (S1)'));
                                                        studyProgramSelect.add(new Option('Keselamatan & Kesehatan Kerja (K3)'));
                                                    } else if (selectedFaculty === 'Ekonomi') {
                                                        studyProgramSelect.add(new Option('Akuntansi (S1)'));
                                                        studyProgramSelect.add(new Option('Manajemen (S1)'));
                                                        studyProgramSelect.add(new Option('Magister Manajemen (S2)'));
                                                    } else if (selectedFaculty === 'Keguruan & Ilmu Pendidikan') {
                                                        studyProgramSelect.add(new Option('Pendidikan Bahasa Inggris (S1)'));
                                                    } else if (selectedFaculty === 'Ilmu Pemerintahan & Budaya') {
                                                        studyProgramSelect.add(new Option('Ilmu Pemerintahan (S1)'));
                                                        studyProgramSelect.add(new Option('Desain Komunikasi Visual (S1)'));
                                                    } else if (selectedFaculty === 'Stebis') {
                                                        studyProgramSelect.add(new Option('Ekonomi Syariah (S1)'));
                                                        studyProgramSelect.add(new Option('Perbankan Syariah (S1)'));
                                                    } else {
                                                        studyProgramSelect.add(new Option('Pilih Fakultas terlebih dahulu'));
                                                    }
                                                }
                                            </script>
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