<?php

namespace App\Http\Controllers;

use App\Models\ArsipRtRw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipRtRwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arsiprtrw = ArsipRtRw::latest()->paginate(10);
        return view('arsip_rtrw.index', compact('arsiprtrw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arsip_rtrw.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_arsip = $request->file('file_arsip');
        $file_arsip->storeAs('public/arsip_rtrw', $file_arsip->hashName());
        $arsiprtrw = ArsipRtRw::create([
            'file_arsip' => $file_arsip->hashName(),
            'nama_arsip' => $request->nama_arsip,
            'deskripsi' => $request->deskripsi,
            'id_rt_rw' => $request->id_rt_rw
            
        ]);
        if ($arsiprtrw) {
            return redirect()->route('arsiprtrw.index')->with(['success' => 'data berhasil disimpan!']);
        } else {
            return redirect()->route('arsiprtrw.index')->with(['error' => 'gagal disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArsipRtRw  $arsipRtRw
     * @return \Illuminate\Http\Response
     */
    public function show(ArsipRtRw $arsipRtRw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArsipRtRw  $arsipRtRw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arsiprtrw=ArsipRtRw::find($id);
            return view('arsip_rtrw.update', compact('arsiprtrw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArsipRtRw  $arsipRtRw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arsipRtRw = ArsipRtRw::findOrFail($id);
        if ($request->file('file_arsip') == "") {
            $arsipRtRw->update([
                'nama_arsip' => $request->nama_arsip,
                'deskripsi' => $request->deskripsi,
                
            ]);
        } else {
            if (Storage::disk('local')->exists('public/arsiprtrw/' . $arsipRtRw->foto)) {
                Storage::disk('local')->exists('public/arsiprtrw/' . $arsipRtRw->foto);
            }
            $gambar = $request->file('file_arsip');
            $gambar->storeAs('public/arsiprtrw', $file_arsip->hashName());
            $arsipRtRw->update([
                'file_arsip' => $file_arsip->hashName(),
                'nama_arsip' => $request->nama_arsip,
                'deskirpsi' => $request->deskripsi,
               
            ]);
        }
        if ($arsipRtRw) {
            return redirect()->route('arsiprtrw.index')->with(['success' => 'data berhasil disimpan!']);
        } else {
            return redirect()->route('arsiprtrw.index')->with(['error' => 'gagal disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArsipRtRw  $arsipRtRw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsipRtRw = ArsipRtRw::findOrfail($id);
        Storage::disk('local')->delete('public/arsip_rtrw/'.$arsipRtRw->file);
        $arsipRtRw->delete();
        if ($arsipRtRw) {
            return redirect()->route('arsiprtrw.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('arsiprtrw.index')->with(['error' => 'Data gagal Dihapus!']);
        }
    }

    public function getDownload(){
        //PDF file is stored under project/public/download/info.pdf
        $file="./arsip_rtrw/filename.pdf";
        return Response::download($file);
    }
}
