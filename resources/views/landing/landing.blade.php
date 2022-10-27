@extends('landing.layout.app')

@section('title')
  Kerajinan Bambu Gunung Kidul Yogyakarta
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
                Kerajinan Bambu Gunungkidul Yogyakarta
              </b>
            </h1>
            <p>
              Kami Menyediakan Kerajinan Bambu. Anda Juga Bisa Melakukan Request Untuk Dibuatkan Suatu Kerajinan Dari Bambu.
              Lokasi Kami Terletak di Dusun Mandesan, Desa Semin, Kecamatan Semin, Kabupaten Gunung Kidul.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="sejarah">
    <div class="content-wrapper-3">
      <div class="container">
        <div class="row justify-content-center pt-5 pb-5">
          <div class="col-12 text-center text-light">
            <h3><b>KUB Manunggal Bambu</b></h3>
            <h5>
              Adalah Kelompok Usaha Bersama yang menciptakan kerajinan dari bambu. 
              Produk dari Kelompok Usaha Bersama tersebut kebanyakan berupa mainan bambu yang bernilai rendah.
              Usaha Mikro Kecil Menengah (UMKM) kerajinan bambu tersebut terletak di Dusun Mandesan, Desa Semin, Kecamatan Semin, Kabupaten Gunung Kidul.
            </h5>
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
        <div class="row mt-5 justify-content-center">
          @foreach ($products as $product)
              <div class="col-sm-4 col-md-4 col-lg-3 col-xl-3 mb-3">
                <div class="card">
                  <img src="{{ asset($product->thumbnail) }}" class="card-img-top" alt="{{ $product->nama_produk }}">
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
              <a href="https://wa.me/6285876232199?text=Halo%20kak%2C%20Saya%20mau%20request%20kerajinan%20bambu" class="btn btn-info"><i class="fab fa-whatsapp"></i> Request Produk</a>
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
        <div class="row text-center">
          <div class="col-12 mb-5">
            <img src="{{ asset('./dist/img/struktur-organisasi.svg') }}" class="img-fluid w-75" alt="" srcset="">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('addons-js')
@endpush