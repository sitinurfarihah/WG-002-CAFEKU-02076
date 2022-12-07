<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk menampilkan data
        $kategori = kategori::all();
        $menu= menu::all();
        return view ('beranda', compact ('kategori','menu'));
    }
}