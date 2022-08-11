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
          <h1 class="m-0">Nomor Whatsapp</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Nomor Whatsapp</li>
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
                          <a href="{{ route('create-whatsapp') }}" class="btn btn-success">+ Tambah Nomor Whatsapp</a>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Pemilik Nomor Whatsapp</th>
                            <th>Nomor Whatsapp</th>
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
            data: "nama_pemilik_whatsapp",
            name: "nama_pemilik_whatsapp",
        },
        {
            data: "no_whatsapp",
            name: "no_whatsapp",
        },
        {
            data: "action",
            name: "action",
        },
    ],
});
</script>
@endpush