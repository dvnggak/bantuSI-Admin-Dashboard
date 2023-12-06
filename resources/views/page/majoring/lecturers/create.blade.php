@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Dosen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Dosen</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.majoring.lecturers.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Dosen</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputLecturerNik">NIK</label>
                                                <input type="number" name="nik" class="form-control" id="exampleInputLecturerNik" placeholder="Masukan NIK">
                                                @error('nik')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLecturerNidn">NIDN</label>
                                                <input type="number" name="nidn" class="form-control" id="exampleInputLecturerNidn" placeholder="Masukan NIDN">
                                                @error('nidn')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLecturerName">Nama Dosen</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputLecturerName" placeholder="Masukan Nama Dosen">
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLecturerGender">Jenis Kelamin</label>
                                                <select class="form-control" name="gender" id="exampleInputLecturerGender">
                                                    <option value="" selected></option>
                                                    <option>Laki - laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                                @error('gender')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUniversity">Universitas</label>
                                                <input type="text" name="university" class="form-control" id="exampleInputUniversity" placeholder="Masukan Nama Universitas">
                                                @error('university')
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFunctionalPosition">Jabatan Fungsional</label>
                                                <input type="text" name="functional_position" class="form-control" id="exampleInputFunctionalPosition" placeholder="Masukan Jabatan Fungsional">
                                                @error('functional_position')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmploymentStatus">Status Ikatan Kerja</label>
                                                <select class="form-control" name="employment_status" id="exampleInputEmploymentStatus">
                                                    <option value="" selected></option>
                                                    <option>Aktif</option>
                                                    <option>Non-Aktif</option>
                                                </select>
                                                @error('employment_status')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputHighestEducation">Pendidikan Tertinggi</label>
                                                <input type="text" name="highest_education" class="form-control" id="exampleInputHighestEducation" placeholder="Masukan Pendidikan Tertinggi">
                                                @error('highest_education')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLecturerStatus">Status</label>
                                                <select class="form-control" name="status" id="exampleInputLecturerStatus">
                                                    <option value="" selected></option>
                                                    <option>Dosen Tetap</option>
                                                    <option>Dosen Tidak Tetap</option>
                                                </select>
                                                @error('status')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLecturerEmail">Email</label>
                                                <input type="email" name="email" class="form-control" id="exampleInputLecturerEmail" placeholder="Masukan Email">
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLecturerPhoneNumber">Nomor Telepon</label>
                                                <input type="number" name="phone_number" class="form-control" id="exampleInputLecturerPhoneNumber" placeholder="Masukan Nomor Telepon">
                                                @error('phone_number')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.majoring.lecturers.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                        </div>
                        <!-- /.card-body -->

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