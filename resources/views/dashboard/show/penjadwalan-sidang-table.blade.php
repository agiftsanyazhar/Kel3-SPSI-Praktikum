@extends('layouts.dashboard')

@section('container1')
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">SIPSTA</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="dashboard-index"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="nilai-table">Nilai</a></li>
        <li class="breadcrumb-item active">{{ $nilai->id }}</li>
      </ol>
    </nav>
  </div>
@endsection

@section('container2')
  <div class="row">
    <div class="col">
      {{-- @can('paa') --}}
        <div class="mb-3">
          <a href="{{ url('/form-create-penjadwalan-sidang-') }}{{ $nilai->id }}" class="btn btn-sm btn-success py-2 px-3">Tambah</a>
        </div>
      {{-- @endcan --}}
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Penjadwalan Sidang - {{ $nilai->id }}</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">No.</th>
                <th scope="col" class="sort" data-sort="budget">Dosen Penguji 1</th>
                <th scope="col" class="sort" data-sort="budget">Dosen Penguji 2</th>
                <th scope="col" class="sort" data-sort="budget">Dosen Penguji 3</th>
                <th scope="col" class="sort" data-sort="budget">Aksi</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($jadwal_sidang as $jadwal)
                  <tr>
                    <td class="budget">{{ $counter++ }}</td>
                    <td class="budget">{{ $jadwal->dosen_penguji1 }}</td>
                    <td class="budget">{{ $jadwal->dosen_penguji2 }}</td>
                    <td class="budget">{{ $jadwal->dosen_penguji3 }}</td>
                    <td class="budget">
                      <div class="d-inline">
                        <a href="{{ url('/form-edit-penjadwalan-sidang-') }}{{ $jadwal->id }}"><button type="submit" class="btn btn-warning">Edit</button></a>
                        <form action="{{ url('/delete-penjadwalan-sidang-') }}{{ $jadwal->id }}" method="POST">
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