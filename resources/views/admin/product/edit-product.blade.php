@extends('admin.layout.app')

@section('title')
    Ubah Produk
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
          <h1 class="m-0">Ubah Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Ubah Produk</li>
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
                        <form action="{{ route('update-product', $product->slug) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $product->nama_produk) }}" id="" placeholder="Nama Produk" required>
                                        @error('nama_produk')
                                            <div class="invalid-feedback" id="nomorValidationMessage">
                                                Nama Produk Sudah Dipakai
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="harga" value="{{ $product->harga }}">
                                <input type="hidden" name="slug" value="{{ $product->slug }}">
                                {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Harga Satuan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">Rp.</span>
                                            </div>
                                            <input type="text" name="harga" class="form-control" value="{{ old('harga') }}" id="harga" placeholder="Harga">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Nomor Whatsapp</label>
                                        <select name="whatsapp_id" id="" class="form-control" required>
                                            <option value="">-- Pilih Nomor Whatsapp --</option>
                                            @foreach ($whatsapps as $whatsapp)
                                                @if (old('whatsapp_id', $product->whatsapp_id) == $whatsapp->no_whatsapp)
                                                    <option value="{{ $whatsapp->no_whatsapp }}" selected>{{ $whatsapp->nama_pemilik_whatsapp }} | {{ $whatsapp->no_whatsapp }}</option>
                                                @else
                                                    <option value="{{ $whatsapp->no_whatsapp }}">{{ $whatsapp->nama_pemilik_whatsapp }} | {{ $whatsapp->no_whatsapp }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label>Deskripsi Produk</label>
                                        <textarea name="deskripsi_produk" id="" class="form-control">{{ old('deskripsi_produk', $product->deskripsi_produk) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Thumbnail / Gambar Produk (<i>Biarkan jika tidak ingin mengubah gambar</i>)</label>
                                        <input type="file" name="gambar" class="form-control" id="gambar" onchange="previewImage()">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                    <img src="{{ asset($product->thumbnail) }}" class="img-preview img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block">
                                        Ubah Produk
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
<script src="{{ asset('./js/admin/produk.js') }}"></script>
<script src="//cdn.ckeditor.com/4.19.1/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi_produk');
</script>
@endpush