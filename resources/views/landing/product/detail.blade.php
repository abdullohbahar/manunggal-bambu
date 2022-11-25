@extends('landing.layout.app')

@section('title')
  Kelompok Usaha Bersama Manunggal Bambu
@endsection

@push('addons-css')
<style>
    .selectedImage{
        background-color: #00a1ff !important;
    }
</style>
@endpush

@section('content')
    <section>
        <div class="content-wrapper-product">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-5 mb-3">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <img src="{{ asset($product->thumbnail) }}" class="img-thumbnail img-fluid w-100" id="firstImage" alt="" srcset="">
                        <div class="row mt-2 mb-4">
                            <div class="col-4">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset($product->thumbnail) }}" data-image="{{ asset($product->thumbnail) }}" class="img-thumbnail selectedImage img-fluid w-100" id="selectImage" alt="" srcset="">
                                </a>
                            </div>
                            @foreach ($images as $image)
                                <div class="col-4">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset($image->gambar) }}" data-image="{{ asset($image->gambar) }}" class="img-thumbnail img-fluid w-100" alt="" id="selectImage" srcset="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <h1><b>{{ $product->nama_produk }}</b></h1>
                        {!! $product->deskripsi_produk !!}
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <a href="https://wa.me/{{ $product->whatsapp_id . "?text=" . $product->template_pemesanan }}" target="_blank" class="btn btn-info btn-block rounded-pill"><i class="fab fa-whatsapp"></i> Pesan {{ $product->nama_produk }} Sekarang</a>
                        <br>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <hr>
                        <h3><b>Produk Lainnya</b></h3>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    @foreach ($randProduct as $product)
                        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-3 mb-3">
                            <div class="card">
                                <img src="{{ asset($product->thumbnail) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">
                                        <h4 class="text-center">
                                            <b>
                                            {{ $product->nama_produk }}
                                            </b>
                                        </h4>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <a href="{{ route('detail', $product->slug) }}" class="btn btn-outline-info btn-block rounded-pill">Detail Produk</a>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <a href="https://wa.me/{{ $product->whatsapp_id . "?text=" . $product->template_pemesanan }}" target="_blank" class="btn btn-outline-success btn-block rounded-pill"><i class="fab fa-whatsapp"></i> Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center pb-5 mt-5">
                    <div class="col-12 text-center">
                        <a href="{{ route('product') }}" class="btn rounded-pill btn-primary">Lihat Produk Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('addons-js')
<script src="{{ asset('./js/detail-product.js') }}"></script>
@endpush