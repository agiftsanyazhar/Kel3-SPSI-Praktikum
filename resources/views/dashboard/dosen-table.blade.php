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
      @can('paa')
        <div class="mb-3">
          <a href="form-create-dosen" class="btn btn-sm btn-success py-2 px-3">Tambah</a>
        </div>
      @endcan
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
                <th scope="col" class="sort" data-sort="name">NID</th>
                <th scope="col" class="sort" data-sort="name">Nama</th>
                <th scope="col" class="sort" data-sort="budget">Alamat</th>
                <th scope="col" class="sort" data-sort="status">HP</th>
                <th scope="col" class="sort" data-sort="status">Email</th>
                <th scope="col" class="sort" data-sort="status">Aksi</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($dosens as $dosen)
                  <tr>
                    <td class="budget">{{ $counter++ }}</td>
                    <td class="budget">{{ $dosen->id }}</td>
                    <td class="budget">{{ $dosen->nama_dosen }}</td>
                    <td class="budget">{{ $dosen->alamat_dosen }}</td>
                    <td class="budget">{{ $dosen->hp }}</td>
                    <td class="budget">{{ $dosen->email }}</td>
                    <td class="budget">
                      <div class="d-inline">
                        <a href="{{ url('/form-edit-dosen-') }}{{ $dosen->id }}"><button type="submit" class="btn btn-warning">Edit</button></a>
                        <form action="{{ url('/delete-dosen-') }}{{ $dosen->id }}" method="POST">
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