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
    <div class="col">
      {{-- @can('dosen') --}}
        <div class="mb-3">
          <a href="/form-create-nilai" class="btn btn-sm btn-success py-2 px-3">Tambah</a>
        </div>
      {{-- @endcan --}}

      {{-- Nilai --}}
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
      @endif
      @if (session()->has('update'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('update') }}
        </div>
      @endif
      @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
        </div>
      @endif

      {{-- Jadwal --}}
      @if (session()->has('successJadwal'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('successJadwal') }}
        </div>
      @endif
      @if (session()->has('updateJadwal'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('updateJadwal') }}
        </div>
      @endif
      @if (session()->has('deleteJadwal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleteJadwal') }}
        </div>
      @endif
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">{{ $title }}</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">No.</th>
                <th scope="col" class="sort" data-sort="budget">Nilai Prsentasi</th>
                <th scope="col" class="sort" data-sort="status">Nilai Buku Proposal</th>
                <th scope="col" class="sort" data-sort="completion">Nilai Ide Inovasi Proposal</th>
                <th scope="col" class="sort" data-sort="completion">Aksi</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($nilais as $nilai)
                  <tr>
                    <td class="budget">{{ $counter++ }}</td>
                    <td class="budget">{{ $nilai->nilai_presentasi }}</td>
                    <td class="budget">{{ $nilai->nilai_buku_proposal }}</td>
                    <td class="budget">{{ $nilai->nilai_ide_inovasi_proposal }}</td>
                    <td class="budget">
                      <div class="d-inline">
                        <a href="{{ url('/nilai-table-penjadwalan-sidang-') }}{{ $nilai->id }}"><button type="submit" class="btn btn-primary">Detail</button></a>
                        <a href="{{ url('/form-edit-nilai-') }}{{ $nilai->id }}"><button type="submit" class="btn btn-warning">Edit</button></a>
                        <form action="{{ url('/delete-nilai-') }}{{ $nilai->id }}" method="POST">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection