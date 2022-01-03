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
        <form role="form" action="/create-sidang" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="form-control-label" for="input-username" hidden>NIM</label>
              <input class="form-control" placeholder="Nama" type="text" name="nim" value="{{ auth()->user()->Mahasiswa->id }}" hidden>
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">Dosen Pembimbing</label>
              <select class="form-control @error('nid') is-invalid @enderror" name="nid" required>
                <option value="" disabled selected hidden>Dosen Pembimbing</option>
                @foreach ($dosens as $dosen)
                  <option value="{{ $dosen->id }}">{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">Upload Proposal</label>
              <input class="form-control" type="file" name="proposal" required>
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">Upload KHS</label>
              <input class="form-control" type="file" name="khs" required>
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">Upload TOEFL</label>
              <input class="form-control" type="file" name="toefl" required>
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