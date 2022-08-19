<?php

namespace App\Http\Controllers\Api;

use App\Models\Catatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CatatanResource;
use Illuminate\Support\Facades\Validator;

class CatatanController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get Catatan
        $catatan = Catatan::latest()->paginate(5);

        //return collection of Catatan as a resource
        return new CatatanResource(true, 'List Data Catatan', $catatan);
    }


    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nik'     => 'required',
            'nama_lengkap'     => 'required',
            'tanggal'   => 'required',
            'waktu'   => 'required',
            'lokasi'   => 'required',
            'suhu'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $catatan = Catatan::create([
            'nik'     => $request->title,
            'nama_lengkap'     => $request->title,
            'tanggal'   => $request->content,
            'waktu'   => $request->content,
            'lokasi'   => $request->content,
            'suhu'   => $request->content,
        ]);

        //return response
        return new CatatanResource(true, 'Data Catatan Berhasil Ditambahkan!', $catatan);
    }

}