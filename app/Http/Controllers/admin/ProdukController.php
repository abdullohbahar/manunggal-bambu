<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Whatsapp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Yajra\DataTables\Facades\DataTables;


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
                    return ' <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                       <a href="javascript:void(0)" class="btn btn-danger" data-id="' . $item->id . '" id="deletePembelian">Hapus</a>
                    </div>
                    ';
                })
                ->addColumn('gambar', function ($item) {
                    return '<img src="/' . $item->thumbnail . '" alt="" srcset="">
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
        $whatsapps = Whatsapp::get();
        return view('admin.product.create-product', compact('active', 'whatsapps'));
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

        $validateData['slug'] = Str::slug($request->input('nama_produk'));

        // Save picture
        $picture = $request->file('gambar');

        // FIle Name
        $fileName = $validateData['slug'] . '.' . $picture->getClientOriginalExtension();

        // File Location
        $location = 'image/produk/' . $validateData['slug'];

        // File Path
        $filePath = 'image/produk/' . $validateData['slug'] . '/' . $fileName;

        // Save File To Folder
        $picture->move($location, $fileName);

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
    }
}
