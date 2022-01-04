@extends('layouts.dashboard')

@section('container1')
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">SIPSTA</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="dashboard-index"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="dosen-table">Dosen</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
      </ol>
    </nav>
  </div>
@endsection

@section('container2')
<div class="row">
  <div class="col row justify-content-center">
    <div class="card border-0 col-lg-6 col-md-8">
      <div class="card-body px-lg-13 py-lg-5">
        <div class="text-center text-muted mb-4">
          {{ $title }} - {{ $dosen->nama_dosen }}
        </div>
        <form role="form" action="/update-dosen-{{ $dosen->id }}" method="POST">
          @method('put')
          @csrf
          <div class="form-group">
              <label class="form-control-label" for="input-username">Alamat</label>
              <input class="form-control @error('alamat_dosen') is-invalid @enderror" type="text" name="alamat_dosen" value="{{ old('alamat_dosen', $dosen->alamat_dosen) }}" required>
              @error('alamat_dosen')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">HP</label>
              <input class="form-control @error('hp') is-invalid @enderror" type="number" name="hp" value="{{ old('hp', $dosen->hp) }}" required>
              @error('hp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">Email</label>
              <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $dosen->email) }}" required>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">Password</label>
              <input class="form-control" type="password" name="password" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection