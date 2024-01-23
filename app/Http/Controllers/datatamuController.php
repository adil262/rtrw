<?php

namespace App\Http\Controllers;

use App\Models\datatamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class datatamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatamu = datatamu::latest()->paginate(10);
        return view('datatamu.index', compact('datatamu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datatamu.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bukti = $request->file('bukti');
        $bukti->storeAs('public/datatamu', $bukti->hashName());
        $datatamu= datatamu::create([
            'bukti'  => $bukti->hashName(),
            'nik'   => $request->nik,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
            'jk'   => $request->jk,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'tanggal_masuk'   => $request->tanggal_masuk,
            'tanggal_keluar'   => $request->tanggal_keluar,
            'keperluan'   => $request->keperluan,
        ]);
        if ($datatamu) {
            return redirect()->route('datatamu.index')->with(['success'=>'Data Tamu Berhasil Disimpan!']);
        }else{
            return redirect()->route('datatamu.index')->with(['error'=>'Data Tamu Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datatamu  $datatamu
     * @return \Illuminate\Http\Response
     */
    public function show(datatamu $datatamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datatamu  $datatamu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datatamu =datatamu::find($id);
        return view('datatamu.update',compact('datatamu'));
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\datatamu  $datatamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datatamu = datatamu::findOrFail($id);
        if($request->file('bukti') =="") {
            $datatamu->update([
                'nik'   => $request->nik,
                'nama'   => $request->nama,
                'alamat'   => $request->alamat,
                'jk'   => $request->jk,
                'tanggal_lahir'   => $request->tanggal_lahir,
                'tanggal_masuk'   => $request->tanggal_masuk,
                'tanggal_keluar'   => $request->tanggal_keluar,
                'keperluan'   => $request->keperluan,
              
            ]);
        }else{
            if(
            Storage::disk('local')->delete('public/datatamu/'.$datatamu->bukti)){
            Storage::disk('local')-> delete('public/datatamu/.$datatamu->bukti');
        }
        $bukti = $request->file('bukti');
        $bukti->storeAs('public/datatamu',$bukti->hashName());
            $datatamu->update([
                'nik'   => $request->nik,
                'nama'   => $request->nama,
                'alamat'   => $request->alamat,
                'jk'   => $request->jk,
                'bukti' => $bukti -> hashName(),
                'tanggal_lahir'   => $request->tanggal_lahir,
                'tanggal_masuk'   => $request->tanggal_masuk,
                'tanggal_keluar'   => $request->tanggal_keluar,
                'keperluan'   => $request->keperluan,

            ]);
        }
        if($datatamu){
            return redirect()->route('datatamu.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('datatamu.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datatamu  $datatamu
     * @return \Illuminate\Http\Response
     */
    public function destroy($datatamu)
    {
        $datatamu = datatamu::findOrFail($datatamu);
        Storage::disk('local')->delete('public/datatamu/'.$datatamu->bukti);
        $datatamu->delete();
            if($datatamu){
                return redirect()->route('datatamu.index')->with(['success' =>'Data Berhasil Dihapus!']);
            }else{
                return redirect()->route('datatamu.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
