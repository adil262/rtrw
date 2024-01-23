<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengeluaranKasResource;
use App\Models\pengeluaran_kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengeluaranKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pengeluaran_kas::latest()->get();
        return response()->json(["pengeluaran_kas" => $data]);
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
        $gambar = $request->file('bukti');
        $gambar->storeAs('public/pengeluaran_kas', $gambar->hashName());
        $pengeluaran_kas = pengeluaran_kas::create([
            'bukti' => $gambar->hashName(),
            'tgl_pengeluaran' => $request->tgl_pengeluaran,
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'total_pengeluaran' => $request->total_pengeluaran,
            'keterangan' => $request->keterangan
        ]);
        if ($pengeluaran_kas) {
            return response()->json(['Pengeluaran Berhasil Ditambah', new PengeluaranKasResource($pengeluaran_kas)]);
        } else {
            return response()->json(['Gagal', new PengeluaranKasResource($pengeluaran_kas)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengeluaran_kas  $pengeluaran_kas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran_kas = pengeluaran_kas::find($id);
        if (is_null($pengeluaran_kas)) {
            return response()->json('Data not Found', 404);
        }
        return response()->json([new PengeluaranKasResource($pengeluaran_kas)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengeluaran_kas  $pengeluaran_kas
     * @return \Illuminate\Http\Response
     */
    public function edit(pengeluaran_kas $pengeluaran_kas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengeluaran_kas  $pengeluaran_kas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengeluaran_kas = pengeluaran_kas::findOrFail($id);
        if ($request->file('bukti') == "") {
            $pengeluaran_kas->update([
                'tgl_pengeluaran' => $request->tgl_pengeluaran,
                'nama_pengeluaran' => $request->nama_pengeluaran,
                'total_pengeluaran' => $request->total_pengeluaran,
                'keterangan' => $request->keterangan
            ]);
        } else {
            if (Storage::disk('local')->exists('public/pengeluaran_kas/' . $pengeluaran_kas->bukti)) {
                Storage::disk('local')->delete('public/pengeluaran_kas/' . $pengeluaran_kas->bukti);
            }
            $bukti = $request->file('bukti');
            $bukti->storeAs('public/pengeluaran_kas', $bukti->hashName());
            $pengeluaran_kas->update([
                'tgl_pengeluaran' => $request->tgl_pengeluaran,
                'nama_pengeluaran' => $request->nama_pengeluaran,
                'total_pengeluaran' => $request->total_pengeluaran,
                'keterangan' => $request->keterangan,
                'bukti' => $bukti->hashName(),
            ]);
        }
        if ($pengeluaran_kas) {
            return response()->json(['Pengeluaran Berhasil DiUpdate', new PengeluaranKasResource($pengeluaran_kas)]);
        } else {
            return response()->json(['Gagal DiUpdate', new PengeluaranKasResource($pengeluaran_kas)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengeluaran_kas  $pengeluaran_kas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran_kas = pengeluaran_kas::findOrFail($id);
        Storage::disk('local')->delete('public/pengeluaran_kas/' . $pengeluaran_kas->bukti);
        $pengeluaran_kas->delete();
        if ($pengeluaran_kas) {
            return response()->json(['Pengeluaran Berhasil DiHapus', new PengeluaranKasResource($pengeluaran_kas)]);
        } else {
            return response()->json(['Gagal DiHapus', new PengeluaranKasResource($pengeluaran_kas)]);
        }
    }
}
