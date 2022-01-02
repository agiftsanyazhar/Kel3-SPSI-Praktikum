@extends('layouts.dashboard')

@section('container1')
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">SIPSTA</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="dashboard-index"><i class="fas fa-home"></i></a></li>
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
          {{ $title }}
        </div>
        <form role="form" action="/register" method="POST">
          @csrf
          <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
              <input class="form-control" placeholder="Nama" type="text" name="Nama" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
              <input class="form-control" placeholder="Email" type="email" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
              <input class="form-control" placeholder="HP" type="number" name="hp" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
              <input class="form-control" placeholder="Alamat" type="text" name="alamat_dosen" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
              <input class="form-control" type="password" placeholder="Password" required/>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Daftar Sidang</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection