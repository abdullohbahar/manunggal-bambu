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
                       <a href="/admin/add-image-product/' . $item->slug . '" class="btn btn-info btn-block btn-sm">Tambah Gambar</a>
                    ';
                })
                ->addColumn('gambar', function ($item) {
                    return '<img class="img-fluid mx-auto d-block img-preview" src="/' . $item->thumbnail . '" alt="" srcset="">
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
            'gambar' => 'required'
        ]);

        $encodeProduk = urlencode($request->nama_produk);

        $validateData['template_pemesanan'] = "Halo%20Admin%2C%20Saya%20Mau%20Order%20Nih%0ANama%20Pemesan%20%3A%C2%A0%0ANama%20Produk%20Yang%20Akan%20Dipesan%20%3A%C2%A0" . $encodeProduk . "Jumlah%20Produk%20Yang%20Dipesan%20%3A%C2%A0%C2%A0";

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

    public function addImageProduct($slug)
    {
        $slug = $slug;
        $active = 'produk';
        $images = Image::where('product_slug', $slug)->get();
        $product = Product::where('slug', $slug)->first();
        return view('admin.product.add-image-product', compact('active', 'images', 'product', 'slug'));
    }

    public function storeImageProduct(Request $request)
    {
        $slug = $request->input('slug');
        // Save picture
        $picture = $request->file('gambar');

        // FIle Name
        $fileName = $slug . time() . '.' . $picture->getClientOriginalExtension();

        // File Location
        $location = 'image/produk/' . $slug;

        // File Name In Folder
        $filePath = 'image/produk/' . $slug . '/' . $fileName;

        if (!file_exists($location)) {
            mkdir($location, 666, true);
        }

        // Image Intervention
        $img = Img::make($picture->path());

        // Resize image and save image
        $img->resize(300, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($filePath);

        // Save to DB
        $data = [
            'product_slug' => $slug,
            'gambar' => $filePath
        ];

        Image::create($data);

        return redirect()->to('admin/add-image-product/' . $slug)->with('message', 'Foto Produk Berhasil Ditambahkan');
    }

    public function deleteImageProduct(Request $request, $id)
    {
        $slug = $request->input('slug');
        // Get Produk
        $produk = Image::find($id);

        // Delete Produk
        $delete = Image::destroy($id);
        if ($delete) {
            unlink($produk->gambar);
            return redirect()->to('admin/add-image-product/' . $slug)->with('message', 'Foto Produk Berhasil Dihapus');
        }
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
