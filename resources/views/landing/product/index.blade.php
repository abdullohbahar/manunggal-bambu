@extends('landing.layout.app')

@section('title')
  Kelompok Usaha Bersama Manunggal Bambu
@endsection

@push('addons-css')
@endpush

@section('content')
    <section>
        <div class="content-wrapper-product">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-5 mb-3">
                        <h1><b>Produk</b></h1>
                        <p>
                            <b>
                                Produk Yang Dihasilkan Kelompok Usaha Bersama Manunggal Bambu
                            </b>
                        </p>
                    </div>
                </div>
                {{-- <div class="row justify-content-end mt-2 mb-5">
                    <div class="col-0">
                        <select name="sort" id="sort" class="form-control">
                            <option value="">-- Urutkan Berdasar --</option>
                            <option value="A-to-Z">A ke Z</option>
                            <option value="Z-to-A">Z ke A</option>
                        </select>
                    </div>
                </div> --}}
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-5">
                            <div class="card" style="max-height: 550px;">
                                <center>
                                    <div style="width: 340px; height: 350px; position: relative;">
                                        <img src="{{ asset($product->thumbnail) }}" class="card-img-top image-product w-100" alt="{{ $product->nama_produk }}">
                                    </div>
                                </center>
                                <div class="card-body" style="background-color: #F7F7F7">
                                    <h5 class="card-title text-center">
                                        <b>
                                            {{ $product->nama_produk }}
                                        </b>
                                    </h5>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                            <a href="{{ route('detail', $product->slug) }}" class="btn btn-outline-info btn-block rounded-pill">Detail Produk</a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                            <a href="https://wa.me/{{ $product->whatsapp_id . "?text=" . $product->template_pemesanan }}" target="_blank" class="btn btn-outline-success btn-block rounded-pill"><i class="fab fa-whatsapp"></i> Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <div class="col-0 text-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('addons-js')
@endpush