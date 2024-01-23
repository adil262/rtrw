<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan_Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class Pengajuan_SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan_surat = DB::select("SELECT * FROM `pengajuan_surats` as ps, wargas as w  WHERE ps.id_warga = w.id_warga");
        return view('pengajuan_surat.index', compact('pengajuan_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = DB::select('select * from wargas');
        return view('pengajuan_surat.tambah', compact('warga'));
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
            return redirect()->route('pengajuan_surat.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('pengajuan_surat.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan_Surat  $pengajuan_Surat
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan_Surat $pengajuan_Surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan_Surat  $pengajuan_Surat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengajuan_surat = Pengajuan_Surat::find($id);
        $warga = DB::select('select * from wargas');
        return view('pengajuan_surat.update', compact('pengajuan_surat','warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuan_Surat  $pengajuan_Surat
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

        if ($pengajuan_surat) {
            return redirect()->route('pengajuan_surat.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('pengajuan_surat.index')->with(['error' => 'Data Gagal Diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan_Surat  $pengajuan_Surat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengajuan_surat = Pengajuan_Surat::findOrFail($id);
        $pengajuan_surat->delete();
        if ($pengajuan_surat) {
            return redirect()->route('pengajuan_surat.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('pengajuan_surat.index')->with(['error' => 'Data Gagal Dihapus']);
        }
    }
}
