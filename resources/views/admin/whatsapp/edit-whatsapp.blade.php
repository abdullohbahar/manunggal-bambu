@extends('admin.layout.app')

@section('title')
    Nomor Whatsapp
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
          <h1 class="m-0">Ubah Nomor Whatsapp</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Ubah Nomor Whatsapp</li>
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
                        <input type="hidden" name="id" id="id" value="{{ $whatsapp->id }}">
                        <form id="editData">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Nama Pemilik Nomor Whatsapp</label>
                                        <input type="text" name="nama_pemilik_whatsapp" class="form-control" id="" placeholder="Nama Pemilik Nomor Whatsapp" value="{{ $whatsapp->nama_pemilik_whatsapp }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Nomor Whatsapp</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="validatedInputGroupSelect">+62</label>
                                            </div>
                                            <input type="number" name="no_whatsapp" class="form-control" id="nomorValidation" placeholder="Nomor Whatsapp" value="{{ $whatsapp->no_whatsapp }}" required>
                                            <div class="invalid-feedback" id="nomorValidationMessage">
                                                Nomor Whatsapp Sudah Terdaftar
                                            </div>
                                        </div>
                                        <span><i>Mohon memasukkan nomor Whatsapp tanpa awalan 0. Contoh 08123 menjadi 8123 saja</i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success btn-block">
                                        Ubah Nomor Whatsapp
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
<script src="{{ asset('./js/admin/whatsapp.js') }}"></script>
@endpush