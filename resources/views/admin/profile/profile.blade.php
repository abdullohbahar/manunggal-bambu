@extends('admin.layout.app')

@section('title')
    Produk
@endsection

@push('addons-css')
@endpush

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Tambah Produk</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('store-product') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="name" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}" id="" placeholder="Nama Produk" required>
                                        @error('nama_produk')
                                            <div class="invalid-feedback" id="nomorValidationMessage">
                                                Nama Produk Sudah Dipakai
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" id="" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block">
                                        Ubah Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection

@push('addons-js')
<script src="{{ asset('./js/admin/profile.js') }}"></script>
@endpush