<?php

namespace App\Http\Controllers;

use App\Models\Sarankel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class SarankelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $sarankel=DB::select("SELECT * FROM sarankels as sr, wargas as w WHERE sr.id_warga = w.id_warga");
        return view('sarankel.index', compact('sarankel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = DB::select('select * from wargas');
        $sarankel = DB::select('select * from sarankels');
        return view('sarankel.tambah', compact('warga','sarankel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public/sarankel', $foto->hashName());
        $sarankel = sarankel::create([
            'id_warga' => $request->id_warga,
            'foto' => $foto->hashName(),
            'keluhan' =>$request->keluhan,
            'status' =>$request->status,
            'tanggal_create' =>$request->tanggal_create,
            'tanggal_finish' =>$request->tanggal_finish,
        ]);
        if($sarankel){
            return redirect()->route('sarankel.index')->with(['success' =>'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('sarankel.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sarankel  $sarankel
     * @return \Illuminate\Http\Response
     */
    public function show(Sarankel $sarankel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sarankel  $sarankel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warga=DB::select('select * from wargas');
        $sarankel=DB::select('select * from sarankels');
        $sarankel = Sarankel::find($id);
        return view('sarankel.update',
        compact('sarankel', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sarankel  $sarankel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sarankel=Sarankel::findOrFail($id);
        if($request->file('foto')== ""){
            $sarankel->update([
                'id_warga' =>$request->id_warga,
                'keluhan' =>$request->keluhan,
                'status' =>$request->status,
                'tanggal_create' =>$request->tanggal_create,
                'tanggal_finish' =>$request->tanggal_finish,
            ]);
        }else{
            if(Storage::disk('local')->exists('public/sarankel/'.$sarankel->foto)){
                Storage::disk('local')->delete('public/sarankel/'.$sarankel->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public/sarankel', $foto->hashName());
            $sarankel->update([
                'foto' => $foto->hashName(),
                'keluhan' => $request->keluhan,
                'status' => $request->status,
                'tanggal_create' =>$request->tanggal_create,
                'tanggal_finish' =>$request->tanggal_finish,
            ]);
        }
        if($sarankel){
            return redirect()->route('sarankel.index')->with(['success' =>'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('sarankel.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sarankel  $sarankel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sarankel = Sarankel::findOrFail($id);
        Storage::disk('local')->delete('public/sarankel/'.$sarankel->foto);
        $sarankel->delete();
            if($sarankel){
                return redirect()->route('sarankel.index')->with(['success' =>'Data Berhasil Dihapus!']);
            }else{
                return redirect()->route('sarankel.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
