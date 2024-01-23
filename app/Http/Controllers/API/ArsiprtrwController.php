<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Arsiprtrw;
use Illuminate\Http\Request;
use App\Http\Resources\ArsiprtrwResource;
use Illuminate\Support\Facades\Storage;

class ArsiprtrwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Arsiprtrw::latest()->get();
        return response()->json([ArsiprtrwResource::collection($data), 'Programs Fecthed.']);
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
        $arsipfile = $request->file('file_arsip');
        $arsipfile->storeAs('public/arsip_rtrw', $arsipfile->hashName());
        $arsiprtrw = Arsiprtrw::create([
            'file_arsip' => $arsipfile->hashName(),
            'nama_arsip' => $request->nama_arsip,
            'deskripsi' => $request->deskripsi,
            'id_rt_rw' => $request->id_rt_rw,
        ]);
        if ($arsiprtrw){
            return response()->json(['Arsip Berhasil Ditambahkan', new ArsiprtrwResource($arsiprtrw)]);
        } else {
            return response()->json(['Gagal', new ArsiprtrwResource($arsiprtrw)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arsiprtrw  $arsiprtrw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsiprtrw = Arsiprtrw::find($id);
        if (is_null($arsiprtrw)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new ArsiprtrwResource($arsiprtrw)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arsiprtrw  $arsiprtrw
     * @return \Illuminate\Http\Response
     */
    public function edit(Arsiprtrw $arsiprtrw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arsiprtrw  $arsiprtrw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arsiprtrw = Arsiprtrw::findOrFail($id);
        if ($request->file('file_arsip') == "") {
            $arsiprtrw->update([
             'nama_arsip' => $request->nama_arsip,
            'deskripsi' => $request->deskripsi,

            ]);
        } else { 
            Storage::disk('local')->delete('public/arsip_rtrw/' . $arsiprtrw->file_arsip);
            $file = $request->file('file_arsip');
            $file->storeAs('public/arsip_rtrw', $file->hashName());
            $arsiprtrw->update([
                'file_arsip' => $file->hashName(),
                'nama_arsip' => $request->nama_arsip,
                'deskripsi' => $request->deskripsi,
                
            ]);
        }
        
        return response()->json(['Program updated succesully.', $arsiprtrw]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arsiprtrw  $arsiprtrw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsiprtrw = Arsiprtrw::find($id);
        $arsiprtrw->delete();
        return response()->json('Data deleted successfully');
    }
}
