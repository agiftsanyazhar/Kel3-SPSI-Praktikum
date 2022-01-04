@extends('layouts.dashboard')

@section('container1')
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">SIPSTA</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="dashboard-index"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="nilai-table">Nilai</a></li>
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
        <form role="form" action="/create-nilai" method="POST">
          @csrf
          <div class="form-group">
              <label class="form-control-label" for="input-username">Nilai Presentasi</label>
              <input class="form-control @error('nilai_presentasi') is-invalid @enderror" type="number" step="0.01" name="nilai_presentasi" value="{{ old('nilai_presentasi') }}" required>
              @error('nilai_presentasi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">Nilai Buku Proposal</label>
              <input class="form-control @error('nilai_buku_proposal') is-invalid @enderror" type="number" step="0.01" name="nilai_buku_proposal" value="{{ old('nilai_buku_proposal') }}" required>
              @error('nilai_buku_proposal')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-group">
              <label class="form-control-label" for="input-username">Nilai Ide Inovasi Proposal</label>
              <input class="form-control @error('nilai_ide_inovasi_proposal') is-invalid @enderror" type="number" step="0.01" name="nilai_ide_inovasi_proposal" value="{{ old('nilai_ide_inovasi_proposal') }}" required>
              @error('nilai_ide_inovasi_proposal')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection