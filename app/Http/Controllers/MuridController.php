<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;


class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $dataMurid = Murid::all();
        return view('Murid.data-murid',compact('dataMurid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Murid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Murid::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'suhu' => $request->suhu
        ]);

        return redirect('data-murid');
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
        $murid = Murid::findorfail($id);
        return view('Murid.edit-murid',compact('murid'));
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
        $murid = Murid::findorfail($id);
        $murid->update($request->all());
        return redirect('data-murid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid = Murid::findorfail($id);
        $murid->delete();
        return back();
    }
}
