@extends('layouts.dashboard')

@section('container1')
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">SIPSTA</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="dashboard-index"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="nilai-table">Nilai</a></li>
        <li class="breadcrumb-item"><a href="nilai-table-penjadwalan-sidang-{{ $nilai1->id }}">Penjadwalan Sidang</a></li>
        <li class="breadcrumb-item active">Tambah Penjadwalan Sidang</li>
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
          Tambah Penjadwalan Sidang - {{ $nilai1->id }}
        </div>
        <form role="form" action="/create-penjadwalan-sidang-{{ $nilai1->id }}" method="POST">
          @csrf
          <div class="form-group">
            <label class="form-control-label" for="input-username">Nilai</label>
              <select class="form-control @error('id_nilai') is-invalid @enderror" name="id_nilai" required>
                  <option value="{{ $nilai1->id }}" selected>{{ $nilai1->id }}</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-username">Dosen Penguji 1</label>
              <select class="form-control @error('dosen_penguji1') is-invalid @enderror" name="dosen_penguji1" required>
                @foreach ($dosens as $dosen)
                  <option value="{{ $dosen->nama_dosen }}">{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-username">Dosen Penguji 2</label>
              <select class="form-control @error('dosen_penguji2') is-invalid @enderror" name="dosen_penguji2" required>
                @foreach ($dosens as $dosen)
                  <option value="{{ $dosen->nama_dosen }}">{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-username">Dosen Penguji 3</label>
              <select class="form-control @error('dosen_penguji3') is-invalid @enderror" name="dosen_penguji3" required>
                @foreach ($dosens as $dosen)
                  <option value="{{ $dosen->nama_dosen }}">{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
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