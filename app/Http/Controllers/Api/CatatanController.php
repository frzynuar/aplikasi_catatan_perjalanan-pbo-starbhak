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
            'waktu'     => 'required',
            'lokasi'     => 'required',
            'suhu'   => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        $catatan = Catatan::create([
            'nik'     => $request->nik,
            'nama_lengkap'     => $request->nama_lengkap,
            'tanggal'   => $request->tanggal,
            'waktu'     => $request->waktu,
            'lokasi'     => $request->lokasi,
            'suhu'   => $request->suhu
        ]);

        //return response
        return new CatatanResource(true, 'Data Catatan Berhasil Ditambahkan!', $catatan);
    }

    public function show(Catatan $catatan)
    {
        //return single post as a resource
        return new CatatanResource(true, 'Data Catatan Ditemukan!', $catatan);
    }

    public function update(Request $request, Catatan $catatan)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nik'     => 'required',
            'nama_lengkap'     => 'required',
            'tanggal'   => 'required',
            'waktu'     => 'required',
            'lokasi'     => 'required',
            'suhu'   => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $catatan->update([
            'nik'     => $request->nik,
            'nama_lengkap'     => $request->nama_lengkap,
            'tanggal'   => $request->tanggal,
            'waktu'     => $request->waktu,
            'lokasi'     => $request->lokasi,
            'suhu'   => $request->suhu
        ]);

        //return response
        return new CatatanResource(true, 'Data Catatan Berhasil Diubah!', $catatan);
    }

    public function destroy(Catatan $catatan)
    {
        //delete image
        // Storage::delete('public/posts/'.$post->image);

        //delete post
        $catatan->delete();

        //return response
        return new CatatanResource(true, 'Data Catatan Berhasil Dihapus!', null);
    }

}