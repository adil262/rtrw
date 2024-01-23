<?php

namespace App\Http\Controllers;

use App\Models\AsetWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Else_;

class AsetWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aset_warga = AsetWarga::latest()->paginate(10);
        return view('aset_warga.index', compact('aset_warga'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aset_warga.tambah');
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
        $gambar->storeAs('public/aset_warga', $gambar->hashName());
        $aset_warga = AsetWarga::create([
            'foto' => $gambar->hashName(),
            'nama_aset' => $request->nama_aset,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'id_peminjaman' => $request->id_peminjaman
        ]);
        if ($aset_warga) {
            return redirect()->route('aset_warga.index')->with(['success' => 'data berhasil disimpan!']);
        } else {
            return redirect()->route('aset_warga.index')->with(['error' => 'gagal disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsetWarga  $asetWarga
     * @return \Illuminate\Http\Response
     */
    public function show(AsetWarga $asetWarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsetWarga  $asetWarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aset_warga = AsetWarga::find($id);
        return view('aset_warga.update', compact('aset_warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AsetWarga  $asetWarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aset_warga = AsetWarga::findOrFail($id);
        if ($request->file('foto') == "") {
            $aset_warga->update([
                'nama_aset' => $request->nama_aset,
                'jumlah' => $request->jumlah,
                'status' => $request->status,
                'id_peminjaman' => $request->id_peminjaman
            ]);
        } else {
            if (Storage::disk('local')->exists('public/aset_warga/' . $aset_warga->foto)) {
                Storage::disk('local')->exists('public/aset_warga/' . $aset_warga->foto);
            }
            $gambar = $request->file('foto');
            $gambar->storeAs('public/aset_warga', $gambar->hashName());
            $aset_warga->update([
                'foto' => $gambar->hashName(),
                'nama_aset' => $request->nama_aset,
                'jumlah' => $request->jumlah,
                'status' => $request->status,
                'id_peminjaman' => $request->id_peminjaman
            ]);
        }
        if ($aset_warga) {
            return redirect()->route('aset_warga.index')->with(['success' => 'data berhasil disimpan!']);
        } else {
            return redirect()->route('aset_warga.index')->with(['error' => 'gagal disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsetWarga  $asetWarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aset_warga = AsetWarga::findOrfail($id);
        Storage::disk('local')->delete('public/asetWarga/' . $aset_warga->foto);
        $aset_warga->delete();
        if ($aset_warga) {
            return redirect()->route('aset_warga.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('aset_warga.index')->with(['error' => 'Data gagal Dihapus!']);
        }
    }
}
