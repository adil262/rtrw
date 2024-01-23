<?php

namespace App\Http\Controllers;

use App\Models\Riwayat_iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Storage;

class RiwayatIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat_iuran = Riwayat_iuran::latest()->paginate(10);
        return view('riwayat_iuran.index', compact('riwayat_iuran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('riwayat_iuran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $riwayat_iuran = Riwayat_iuran::create([
            'nama_iuran' => $request->nama_iuran,
            'periode' => $request->periode,
            'jumlah' => $request->jumlah,
            'status' => $request->status_jumlah,
        ]);
        if($riwayat_iuran){
            return redirect()->route('riwayat_iuran.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('riwayat_iuran.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riwayat_iuran  $riwayat_iuran
     * @return \Illuminate\Http\Response
     */
    public function show(Riwayat_iuran $riwayat_iuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riwayat_iuran  $riwayat_iuran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riwayat_iuran = Riwayat_iuran::find($id);
        return view('riwayat_iuran.update', compact('riwayat_iuran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Riwayat_iuran  $riwayat_iuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $riwayat_iuran = Riwayat_iuran::findOrFail($id);
        $riwayat_iuran->update([
            'nama_iuran' => $request->nama_iuran,
            'periode' => $request->periode,
            'jumlah' => $request->jumlah,
            'status' => $request->status_jumlah,
        ]);
        if($riwayat_iuran){
            return redirect()->route('riwayat_iuran.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('riwayat_iuran.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riwayat_iuran  $riwayat_iuran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat_iuran = Riwayat_iuran::findOrFail($id);
        $riwayat_iuran->delete();
        if($riwayat_iuran){
            return redirect()->route('riwayat_iuran.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->route('riwayat_iuran.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
