<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Informasi_Warga;
use App\Http\Resources\InformasiWargaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Informasi_Warga::latest()->get();
        return response()->json([InformasiWargaResource::collection($data), 'Program Fetched']);
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
        $fotos = $request->file('foto');
        $fotos->storeAs('public/informasi_warga', $fotos->hashName());
        $informasi_warga = Informasi_Warga::create([
            'foto' => $fotos->hashName(),
            'id_warga' => $request->id_warga,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
        ]);
        if ($informasi_warga) {
            return response()->json(['Data baru berhasil ditambah', new InformasiWargaResource($informasi_warga)]);
        } else {
            return response()->json(['Gagal', new InformasiWargaResource($informasi_warga)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi_Warga  $informasi_warga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informasi_warga = Informasi_Warga::find($id);
        if (is_null($informasi_warga)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new InformasiWargaResource($informasi_warga)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi_Warga  $informasi_warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi_Warga $informasi_warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informasi_Warga  $informasi_warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $informasi_warga = Informasi_Warga::findOrFail($id);
        if ($request->file('foto') == "") {
            $informasi_warga->update([
                'id_warga' => $request->id_warga,
                'deskripsi' => $request->deskripsi,
                'jenis' => $request->jenis,
            ]);
        } else {
            if (Storage::disk('local')->exists('public/informasi_warga/' . $informasi_warga->foto)) {
                Storage::disk('local')->delete('public/informasi_warga/' . $informasi_warga->foto);
            }
            $fotos = $request->file('foto');
            $fotos->storeAs('public/informasi_warga', $fotos->hashName());
            $informasi_warga->update([
                'foto' => $fotos->hashName(),
                'id_warga' => $request->id_warga,
                'deskripsi' => $request->deskripsi,
                'jenis' => $request->jenis,
            ]);
        }
        return response()->json(['Program updated succesfully', $informasi_warga]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi_Warga  $informasi_warga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi_warga = Informasi_Warga::findOrFail($id);
        if (Storage::disk('local')->exists('public/informasi_warga/' . $informasi_warga->foto)) {
            Storage::disk('local')->delete('public/informasi_warga/' . $informasi_warga->foto);
        }
        $informasi_warga->delete();
        if ($informasi_warga) {
            return response()->json('Data deleted succesfully');
        } else {
            return response()->json('Delete Error!');
        }
    }
}
