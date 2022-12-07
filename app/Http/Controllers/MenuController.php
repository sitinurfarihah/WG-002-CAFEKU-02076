<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
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
        return view ('menu.index', compact ('kategori','menu'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //untuk menampilkan data
        $kategori = kategori::all();
        $menu= menu::all();
        return view ('menu.create', compact ('kategori','menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk memfungsikan create
        $menu = $request->all();
        menu::create([
            'namamenu' =>$request->namamenu,
            'foto' =>Storage::put('artikel/foto', $request->foto),
            'harga' =>$request->harga,
            'keterangan' =>$request->keterangan,
            'kategoris_id' =>$request->kategoris_id,
        ]); 
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        {
            //untuk menampilkan data
            // $kategori = kategori::all();
            // $menu= menu::all();
            return view ('menu.edit', compact ('menu'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //untuk memasukkan editan
        $data = $request->all();

        try {
            $data['foto'] = Storage::put('artikel/foto', $request->foto);

            $menu->update($data);
        }catch (\Throwable $th) {
                $data['foto'] = $menu->foto;
                $menu->update($data);
            }

            return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
    //untuk memfungsikan hapus
    public function delete($id)
    {
        $data = menu::find($id);

        $data->delete();
        return redirect ('menu');
    }
}
