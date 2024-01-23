<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posyandu = Posyandu::latest()->paginate(10);
        return view('posyandu.index', compact('posyandu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posyandu.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('foto');
        $gambar->storeAs('public/posyandu', $gambar->hashName());
        $posyandu = Posyandu::create([
            'foto' => $gambar->hashName(),
            'lokasi' => $request->lokasi,
            'lat' => $request->lat,
            'long' => $request->long,
            'deskripsi' => $request->deskripsi,
        ]);
        if($posyandu){
            return redirect()->route('posyandu.index');
        }else{
            return redirect()->route('posyandu.index');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function show(Posyandu $posyandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posyandu=Posyandu::find($id);
        return view('posyandu.update', compact('posyandu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_posyandu)
    {
        $posyandu = Posyandu::findOrFail($id_posyandu);
        if ($request->file('foto') == ""){
            $posyandu->update([
                'lokasi' => $request->lokasi,
                'lat' => $request->lat,
                'long' => $request->long,
                'deskripsi' => $request->deskripsi,
            ]);
        }else{
            if (Storage::disk('local')->exists('public/posyandu/' . $posyandu->foto)) {
                Storage::disk('local')->delete('public/posyandu/' . $posyandu->foto);
            }
            $gambar = $request->file('foto');
            $gambar->storeAs('public/posyandu', $gambar->hashName());
            $posyandu->update([
                'foto' => $gambar->hashName(),
                'lokasi' => $request->lokasi,
                'lat' => $request->lat,
                'long' => $request->long,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        if($posyandu){
            return redirect()->route('posyandu.index');
        }else{
            return redirect()->route('posyandu.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        $posyandu = Posyandu::findOrFail($id);
        Storage::disk('local')->delete('public/posyandu'.$posyandu->foto);
        $posyandu->delete();
        if($posyandu){
            return redirect()->route('posyandu.index')->with(['succes'=>'Data Berhasil Dihapus']);
        }else{
            return redirect()->route('posyandu.index')->with(['error'=>'Data Gagal Dihapus']);
        }
    }
}
