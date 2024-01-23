<?php

namespace App\Http\Controllers;

use App\Models\Informasi_Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class Informasi_WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi_warga = DB::select("SELECT * FROM `informasi_wargas` as iw, wargas as w  WHERE iw.id_warga = w.id_warga");
        return view('informasi_warga.index', compact('informasi_warga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = DB::select('select * from wargas');
        return view('informasi_warga.tambah', compact('warga'));
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
        $gambar->storeAs('public/informasi_warga', $gambar->hashName());
        $informasi_warga = Informasi_Warga::create([
            'id_warga' => $request->id_warga,
            'foto' => $gambar->hashName(),
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
        ]);
        if ($informasi_warga) {
            return redirect()->route('informasi_warga.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('informasi_warga.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi_Warga  $informasi_Warga
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi_Warga $informasi_Warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi_Warga  $informasi_Warga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi_warga = Informasi_Warga::find($id);
        $warga = DB::select('select * from wargas');
        return view('informasi_warga.update', compact('informasi_warga', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informasi_Warga  $informasi_Warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $informasi_warga = Informasi_Warga::findOrFail($id);
        if ($request->file('foto') == "") {
            $informasi_warga->update([
                'deskripsi' => $request->deskripsi,
                'jenis' => $request->jenis,
            ]);
        } else {
            if (Storage::disk('local')->exists('public/informasi_warga/' . $informasi_warga->foto)) {
                Storage::disk('local')->delete('public/informasi_warga/' . $informasi_warga->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public/informasi_warga', $foto->hashName());
            $informasi_warga->update([
                'foto' => $foto->hashName(),
                'deskripsi' => $request->deskripsi,
                'jenis' => $request->jenis,
            ]);
        }
        if ($informasi_warga) {
            return redirect()->route('informasi_warga.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('informasi_warga.index')->with(['error' => 'Data Gagal Diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi_Warga  $informasi_Warga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi_warga = Informasi_Warga::findOrFail($id);
        Storage::disk('local')->delete('public/informasi_warga/' . $informasi_warga->foto);
        $informasi_warga->delete();
        if ($informasi_warga) {
            return redirect()->route('informasi_warga.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('informasi_warga.index')->with(['error' => 'Data Gagal Dihapus']);
        }
    }
}
