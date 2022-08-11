<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Whatsapp::orderBy('no_whatsapp', 'asc');

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return ' <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                       <a href="javascript:void(0)" class="btn btn-warning" data-id="' . $item->id . '" data-no="' . $item->no_whatsapp . '" id="editWhatsapp">Edit</a>
                       <a href="javascript:void(0)" class="btn btn-danger" data-id="' . $item->id . '" data-no="' . $item->no_whatsapp . '" id="deleteWhatsapp">Hapus</a>
                    </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $active = "whatsapp";

        return view('admin.whatsapp.whatsapp', compact('active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'whatsapp';
        return view('admin.whatsapp.create-whatsapp', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'nama_pemilik_whatsapp' => 'required',
            'no_whatsapp' => 'required|unique:whatsapps,no_whatsapp',
        ]);

        if ($validateData->fails()) {
            return response()->json([
                'data' => $request->all(),
                'status' => 400,
                'errors' => $validateData->getMessageBag()
            ]);
        } else {
            Whatsapp::create($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Nomor Whatsapp Berhasil Ditambahkan'
            ]);
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
        $delete = Whatsapp::destroy($id);
        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Nomor Whatsapp Berhasil Dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error'
            ]);
        }
    }
}
