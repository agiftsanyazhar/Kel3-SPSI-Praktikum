@extends('layouts.login-register')

@section('container')
  <div class="main-content">
    <!-- Header -->
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                {{ $title }}
              </div>
              <form role="form" action="/register" method="POST">
                @csrf
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control @error('nama_mahasiswa') is-invalid @enderror" placeholder="Nama" type="text" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}" required>
                    @error('nama_mahasiswa')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control @error('alamat_mahasiswa') is-invalid @enderror" placeholder="Alamat" type="text" name="alamat_mahasiswa" value="{{ old('alamat_mahasiswa') }}" required>
                    @error('alamat_mahasiswa')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control @error('hp') is-invalid @enderror" placeholder="HP" type="number" name="hp" value="{{ old('hp') }}" required>
                    @error('hp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control @error('prodi') is-invalid @enderror" placeholder="Prodi" type="text" name="prodi" value="{{ old('prodi') }}" required>
                    @error('prodi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Register</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="/" class="text-light"><small>Login</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection