<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengajuanSuratResource;
use App\Models\Pengajuan_Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengajuan_Surat::latest()->get();
        return response()->json([PengajuanSuratResource::collection($data), 'Program Fetched']);
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
        $pengajuan_surat = Pengajuan_Surat::create([
            'id_warga' => $request->id_warga,
            'keperluan' => $request->keperluan,
            'jenis' => $request->jenis,
            'dibuat_untuk' => $request->dibuat_untuk,
            'status' => $request->status,
            'tgl_keperluan' => $request->tgl_keperluan,
            'keterangan' => $request->keterangan,
        ]);
        if ($pengajuan_surat) {
            return response()->json(['Data baru berhasil ditambah', new PengajuanSuratResource($pengajuan_surat)]);
        } else {
            return response()->json(['Gagal', new PengajuanSuratResource($pengajuan_surat)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan_Surat  $pengajuan_surat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengajuan_surat = Pengajuan_Surat::find($id);
        if (is_null($pengajuan_surat)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new PengajuanSuratResource($pengajuan_surat)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan_Surat  $pengajuan_surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan_Surat $pengajuan_surat)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuan_Surat  $pengajuan_surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengajuan_surat = Pengajuan_Surat::findOrFail($id);
        $pengajuan_surat->update([
            'id_warga' => $request->id_warga,
            'keperluan' => $request->keperluan,
            'jenis' => $request->jenis,
            'dibuat_untuk' => $request->dibuat_untuk,
            'status' => $request->status,
            'tgl_keperluan' => $request->tgl_keperluan,
            'keterangan' => $request->keterangan,
        ]);
        return response()->json(['Program updated succesfully', $pengajuan_surat]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan_Surat  $pengajuan_surat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengajuan_surat = Pengajuan_Surat::findOrFail($id);
        $pengajuan_surat->delete();
        if ($pengajuan_surat) {
            return response()->json('Data deleted succesfully');
        } else {
            return response()->json('Delete Error!');
        }
    }
}
