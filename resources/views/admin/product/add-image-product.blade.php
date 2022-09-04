@extends('admin.layout.app')

@section('title')
    Foto Produk
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
          <h1 class="m-0">Tambah Foto Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Tambah Foto Produk</li>
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
                      <div class="row">
                        <div class="col-12">
                          <h3>Thumbnail Produk</h3>
                          <img class="img-fluid d-block img-preview w-25" src="{{ asset($product->thumbnail) }}" alt="" srcset="">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                          <form action="{{ route('update-thumbnail-product',$product->slug) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                              <label>Ubah Thumbnail Produk</label>
                              <input type="file" name="gambar" class="form-control" id="gambar" onchange="previewImage()" required>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-success btn-block">Ubah Thumbnail Produk</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <h3>Foto Produk</h3>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                          <form action="{{ route('store-image-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="slug" value="{{ $slug }}" id="">
                            <div class="form-group">
                              <label>Tambah Foto Produk</label>
                              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                  <img class="img-preview-product img-fluid" alt="">
                              </div>
                              <input type="file" name="gambar" class="form-control" id="foto-produk" onchange="previewImageProduct()" required>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-success btn-block">Tambah Foto Produk</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <hr>
                        </div>
                        @foreach ($images as $image)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mt-3 mx-auto text-center">
                            {{-- <form action="{{ route('delete-image-product', $image->id) }}" method="POST">
                              @csrf
                              @method('delete') --}}
                              <input type="hidden" name="slug" value="{{ $slug }}">
                              <img class="img-fluid" style="width: 300px; height: 200px;" src="{{ asset($image->gambar) }}" alt="" srcset="">
                              <button class="btn btn-danger btn-block mt-3 mb-3" id="deleteImageProduk" data-id="{{ $image->id }}" data-slug="{{ $slug }}" type="submit">Hapus Foto Produk</button>
                            {{-- </form> --}}
                          </div>
                        @endforeach
                      </div>
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
@endpush