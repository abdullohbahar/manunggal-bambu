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
                <div class="row mt-5 justify-content-center">
                    @foreach ($products as $product)
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