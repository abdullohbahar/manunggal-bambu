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
          <h1 class="m-0">Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
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
                  <div class="card-header">
                    <div class="row justify-content-end">
                      <div class="row">
                        <div class="mx-auto">
                          <a href="{{ route('create-product') }}" class="btn btn-success">+ Tambah Produk</a>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Thumbnail Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
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
<script>
  $("#example1").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    lengthChange: false,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    ajax: {
        url: "{!! url()->current() !!}",
    },
    columns: [
        {
            title: "No",
            data: null,
            searchable: false,
            orderable: false,
            width: "50px",
            className: "text-center border-bottom",
            render: (data, type, row, meta) => {
                return meta.row + meta.settings._iDisplayStart + 1;
            },
        },
        {
            data: "gambar",
            name: "gambar",
        },
        {
            data: "nama_produk",
            name: "nama_produk",
        },
        {
            data: "harga",
            name: "harga",
        },
        {
            data: "action",
            name: "action",
        },
    ],
});
</script>
@endpush