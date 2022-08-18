<?php

namespace App\Http\Controllers\Api;

use App\Models\Catatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CatatanResource;

class CatatanController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $catatan = Catatan::latest()->paginate(5);

        //return collection of posts as a resource
        return new CatatanResource(true, 'List Data Catatan', $catatan);
    }
}