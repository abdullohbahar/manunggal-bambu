@extends('landing.layout.app')

@section('title')
  Kelompok Usaha Bersama Manunggal Bambu
@endsection

@push('addons-css')
@endpush

@section('content')
{{-- first section --}}
  <section id="home">
    <div class="content-wrapper-1 section-bg">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 content text-light">
            <h1>
              <b>
                KUB Manunggal Bambu
              </b>
            </h1>
            <p>
              Adalah Kelompok Usaha Bersama yang menciptakan kerajinan dari bambu. 
              Produk dari Kelompok Usaha Bersama tersebut kebanyakan berupa mainan bambu yang bernilai rendah.
              Usaha Mikro Kecil Menengah (UMKM) kerajinan bambu tersebut terletak di Dusun Mandesan, Desa Semin, Kecamatan Semin, Kabupaten Gunung Kidul.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Second section --}}
  <section id="produk">
    <div class="content-wrapper-2">
      <div class="container">
        <div class="row text-center pt-3">
          <div class="col-12 mt-5">
            <h1><b>Produk</b></h1>
            <p>
              <b>
                Produk Yang Dihasilkan Kelompok Usaha Bersama Manunggal Bambu
              </b>
            </p>
          </div>
        </div>

        {{-- Product List --}}
        <div class="row mt-5">
          @foreach ($products as $product)
              <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="card" style="max-height: 550px;">
                  <div style="width: 348px; height: 350px; position: relative;">
                    <img src="{{ asset($product->thumbnail) }}" class="card-img-top image-product w-100" alt="{{ $product->nama_produk }}">
                  </div>
                  <div class="card-body" style="background-color: #F7F7F7">
                    <h5 class="card-title">
                      <b>
                        {{ $product->nama_produk }}
                      </b>
                    </h5>
                    <p class="card-text">
                      {!! Str::limit($product->deskripsi_produk, 30, '...') !!}
                    </p>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                        <a href="{{ route('detail', $product->slug) }}" class="btn btn-outline-info btn-block rounded-pill">Detail Produk</a>
                      </div> --}}
                      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                        <a href="https://wa.me/{{ $product->whatsapp_id . "?text=" . $product->template_pemesanan }}" target="_blank" class="btn btn-outline-success btn-block rounded-pill"><i class="fab fa-whatsapp"></i> Pesan</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </div>
        <div class="row justify-content-center pb-5">
          <div class="col-12 text-center">
            <a href="{{ route('product') }}" class="btn rounded-pill btn-primary">Lihat Produk Lainnya</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  {{-- Third Section --}}
  <section>
    <div class="content-wrapper-3">
      <div class="container">
        <div class="row justify-content-center pt-5 pb-5">
          <div class="col-12 text-center text-light">
            <h3><b>Anda Tidak Menemukan Produk Yang Anda Cari?</b></h3>
            <h5>Anda Bisa Request Untuk Dibuatkan Suatu Produk</h5>
            <h5>Hubungi Admin Untuk Informasi Lebih Lanjut</h5>
            <p>
              <a href="" class="btn btn-info"><i class="fab fa-whatsapp"></i> Request Produk</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="struktur-organisasi">
    <div class="content-wrapper-2">
      <div class="container">
        <div class="row justify-content-center pt-5 pb-5">
          <div class="col-12 text-center">
            <h3><b>Struktur Organisasi</b></h3>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('addons-js')
@endpush