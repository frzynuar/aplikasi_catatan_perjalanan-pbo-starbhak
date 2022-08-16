<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;


class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('catatan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
}
