<?php

namespace App\Http\Controllers;

use App\Models\UsahaWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class UsahaWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usahawarga = DB::select("SELECT * FROM usaha_wargas as uw, wargas as w WHERE uw.id_warga = w.id_warga");
        return view('usahawarga.index', compact('usahawarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = DB::select("Select * from wargas");
        return view('usahawarga.tambah', compact('warga'));
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
        $gambar->storeAs('public/usahawarga', $gambar->hashName());
        $usahawarga = UsahaWarga::create([
            'id_warga' => $request->id_warga,
            'foto' => $gambar->hashName(),
            'deskripsi' => $request->deskripsi,
            'judul' => $request->judul,
            'no_hp_usaha' => $request->no_hp_usaha,
            'status' => $request->status,
        ]);

        if($usahawarga){
            return redirect()->route('usahawarga.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('usahawarga.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsahaWarga  $usahaWarga
     * @return \Illuminate\Http\Response
     */
    public function show(UsahaWarga $usahaWarga)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsahaWarga  $usahaWarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id_usaha)
    {
        $usahawarga=UsahaWarga::find($id_usaha);
        return view('usahawarga.update', compact('usahawarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsahaWarga  $usahaWarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usahawarga = UsahaWarga::findOrFail($id);
        if($request->file('foto') == ""){
            $usahawarga->update([
                'id_warga' => $request->id_warga,
                'deskripsi' => $request->deskripsi,
                'judul' => $request->judul,
                'no_hp_usaha' => $request->no_hp_usaha,
                'status' => $request->status,
            ]);
        } else {
            Storage::disk('local')->delete('public/usahawarga/'.$usahawarga->foto);
            $gambar = $request->file('foto');
            $gambar->storeAs('public/usahawarga', $gambar->hashName());
            $usahawarga->update([
                'id_warga' => $request->id_warga,
                'foto' => $gambar->hashName(),
                'deskripsi' => $request->deskripsi,
                'judul' => $request->judul,
                'no_hp_usaha' => $request->no_hp_usaha,
                'status' => $request->status,
            ]);
        }
        if($usahawarga){
            return redirect()->route('usahawarga.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('usahawarga.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsahaWarga  $usahaWarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usahawarga = UsahaWarga::findOrFail($id);
        Storage::disk('local')->delete('public/usahawarga/'.$usahawarga->foto);
        $usahawarga->delete();
        if($usahawarga){
            return redirect()->route('usahawarga.index')->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return redirect()->route('usahawarga.index')->with(['error' => 'Data Gagal Dihapus']);
        }
    }
}
