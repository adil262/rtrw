<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AsetWargaResource;
use App\Models\AsetWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AsetWarga::latest()->get();
        return response()->json([AsetWargaResource::collection($data), 'Programs Fecthed. ']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            return response()->json(['Aset Warga Berhasil Ditambah', new AsetWargaResource($aset_warga)]);
        } else {
            return response()->json(['Gagal', new AsetWargaResource($aset_warga)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsetWarga  $asetWarga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aset_warga = AsetWarga::findOrFail($id);
        if (is_null($aset_warga)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new AsetWargaResource($aset_warga)]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsetWarga  $asetWarga
     * @return \Illuminate\Http\Response
     */
    public function edit(AsetWarga $asetWarga)
    {
        //
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
        return response()->json(['Program updated succesfully.', $aset_warga]);
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
        if (Storage::disk('local')->exists('public/asetWarga/' . $aset_warga->foto)) {
            (Storage::disk('local')->delete('public/asetWarga/' . $aset_warga->foto));
        }
        $aset_warga->delete();
        if ($aset_warga) {
            return response()->json(['Delete success !']);
        } else {
            return response()->route(['Delete error !']);
        }
    }
}
