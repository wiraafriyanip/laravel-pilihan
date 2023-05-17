@extends('template')
@section('judul_halaman','')
@section('konten')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT') 
                        <div class="form-group">
                            <label class="font-weight-bold"> NIS SISWA</label>
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis', $siswa->nis) }}" placeholder="Masukkan Nis Siswa">
                            @error('nis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"> Nama Siswa</label>
                            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" placeholder="Masukkan Nama Siswa">
                            @error('nama_siswa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"> JENIS KELAMIN</label>
                            <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" value="{{ old('jk', $siswa->jk) }}" placeholder="Masukkan Jenis Kelamin">
                            @error('jk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold"> KELAS</label>
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" placeholder="Masukkan kelas Siswa">
                            @error('kelas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jurusan</label>
                            <input type="text" class="form-control @error('jurusan') isinvalid @enderror" name="jurusan" value="{{ old('jurusan', $siswa->jurusan ) 
                            }}" placeholder="Masukkan Jurusan">
                             @error('jurusan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div> 
                    <div class="form-group">
                            <label class="font-weight-bold"> ALAMAT</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $siswa->alamat) }}" placeholder="Masukkan Alamat Siswa">
                            @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                </form> 
            </div>
        </div>
    </div>
</div>
</div>
                
@endsection
