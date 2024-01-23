<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\datatamuResource;
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
        $data = datatamu::latest()->get();
        return response()->json([datatamuResource::collection(($data),'Programs Fecthed.')]);
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
        $bukti = $request->file('bukti');
        $bukti->storeAs('public/datatamu', $bukti->hashName());
        $datatamu= datatamu::create([
            'bukti'  => $bukti->hashName(),
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keperluan' => $request->keperluan,
            

        ]);
        if ($bukti) {
            return response()->json(['Data Tamu Berhasil Ditambah', new datatamuResource($datatamu)]);
        }else{
            return response()->json(['Gagal', new datatamuController($datatamu)]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datatamu  $datatamu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datatamu = datatamu::find($id);
        if (is_null($datatamu)) {
            return response()->json('Data Not Found, 404');
        }
        return response()->json([new datatamuResource($datatamu)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datatamu  $datatamu
     * @return \Illuminate\Http\Response
     */
    public function edit(datatamu $datatamu)
    {
        //
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
        if($request->file('bukti')==""){
            $datatamu->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keperluan' => $request->keperluan,
            

            ]);
        }else{
            if (Storage::disk('local')->exists('public/datatamu/'.$datatamu->bukti)){
                Storage::disk('local')->delete('public/datatamu/'.$datatamu->bukti);
            }
            $bukti =$request->file('bukti');
            $bukti->storeAs('public/datatamu', $bukti->hashName());
            $datatamu->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jk' => $request->jk,
                'bukti'=> $bukti->hashName(),
                'tanggal_lahir' => $request->tanggal_lahir,
                'tanggal_masuk' => $request->tanggal_masuk,
                'tanggal_keluar' => $request->tanggal_keluar,
                'keperluan' => $request->keperluan,
                
            ]);
        }
        return response()->json(['Program update succesfully.', $datatamu]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datatamu  $datatamu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datatamu = datatamu::find($id);
        $datatamu->delete();
        return response()->json('Data deleted successfully');
    }
}
