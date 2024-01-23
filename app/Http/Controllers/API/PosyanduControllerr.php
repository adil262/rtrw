<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PosyanduResource;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PosyanduControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Posyandu::latest()->get();
        return response()->json([PosyanduResource::collection($data), 'Programs Fecthed.']);
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
        $gambar->storeAs('public/posyandu', $gambar->hashName());
        $posyandu = Posyandu::create([
            'foto' => $gambar->hashName(),
            'lokasi' => $request->lokasi,
            'lat' => $request->lat,
            'long' => $request->long,
            'deskripsi' => $request->deskripsi,
        ]);
        if($posyandu){
            return response()->json(['Posyandu Berhasil ditambah', new PosyanduResource($posyandu)]);
        } else {
            return response()->json(['Gagal', new PosyanduResource($posyandu)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posyandu = Posyandu::find($id);
        if (is_null($posyandu)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new PosyanduResource($posyandu)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function edit(Posyandu $posyandu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  
    {
        $posyandu = Posyandu::findOrFail($id);
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
            return response()->json(['Pengeluaran Berhasil DiUpdate', new PosyanduResource($posyandu)]);
        }else{
            return response()->json(['Pengeluaran Berhasil DiUpdate', new PosyanduResource($posyandu)]);
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
        $posyandu->delete();
        return response()->json(['Data deleted success']);
    }
}
