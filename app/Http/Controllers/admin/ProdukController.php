<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Whatsapp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Optional;
use Yajra\DataTables\Facades\DataTables;
use Image as Img;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Product::orderBy('nama_produk', 'asc');

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                       <a href="javascript:void(0)" class="btn btn-danger btn-block btn-sm" data-id="' . $item->id . '" data-produk="' . $item->nama_produk . '" id="deleteProduk">Hapus</a>
                       <a href="javascript:void(0)" class="btn btn-warning btn-block btn-sm">Ubah</a>
                       <a href="javascript:void(0)" class="btn btn-info btn-block btn-sm">Tambah Gambar</a>
                    ';
                })
                ->addColumn('gambar', function ($item) {
                    return '<img class="img-fluid mx-auto d-block" style="width: 300px; height: 200px" src="/' . $item->thumbnail . '" alt="" srcset="">
                    ';
                })
                ->rawColumns(['action', 'gambar'])
                ->make(true);
        }

        $active = 'produk';
        return view('admin.product.product', compact('active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'produk';
        $template = Optional::where('title', 'Template Pemesanan')->first();
        $whatsapps = Whatsapp::get();
        return view('admin.product.create-product', compact('active', 'whatsapps', 'template'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $validateData = $request->validate([
            'nama_produk' => 'required|unique:products,nama_produk',
            'harga' => 'required',
            'whatsapp_id' => 'required',
            'deskripsi_produk' => '',
            'template_pemesanan' => 'required',
            'gambar' => 'required'
        ]);

        $validateData['harga'] = "Rp. " .  $request->input('harga');
        $validateData['slug'] = Str::slug($request->input('nama_produk'));

        // Save picture
        $picture = $request->file('gambar');

        // FIle Name
        $fileName = $validateData['slug'] . '.' . $picture->getClientOriginalExtension();

        // File Location
        $location = 'image/produk/' . $validateData['slug'];

        // File Name In Folder
        $filePath = 'image/produk/' . $validateData['slug'] . '/' . $fileName;

        if (!file_exists($location)) {
            mkdir($location, 666, true);
        }

        // Image Intervention
        $img = Img::make($picture->path());

        // Resize image and save image
        $img->resize(300, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($filePath);

        // Save Filepath to DB
        $validateData['thumbnail'] = $filePath;

        Product::create($validateData);

        return redirect()->to('admin/produk')->with('message', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Produk
        $produk = Product::find($id);

        // Delete Produk
        $delete = Product::destroy($id);
        if ($delete) {
            unlink($produk->thumbnail);
            return response()->json([
                'status' => 200,
                'message' => 'Produk Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Server Error'
            ]);
        }
    }
}
