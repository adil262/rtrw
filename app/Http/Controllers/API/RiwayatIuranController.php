<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RiwayatIuranResource;
use App\Models\Riwayat_iuran;
use Illuminate\Http\Request;

class RiwayatIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Riwayat_iuran::latest()->get();
        return response()->json([RiwayatIuranResource::collection($data), 'Program Fecthed.']);
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
        $riwayat_iuran = Riwayat_iuran::create([
            'nama_iuran' => $request->nama_iuran,
            'periode' => $request->periode,
            'jumlah' => $request->jumlah,
            'status_jumlah' => $request->status_jumlah,
        ]);
        if($riwayat_iuran){
            return response()->json(['Riwayat Iuran Berhasil Ditambah', new RiwayatIuranResource($riwayat_iuran)]);
        }else{
            return response()->json(['Gagal', new RiwayatIuranResource($riwayat_iuran)]);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riwayat_iuran  $riwayat_iuran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat_iuran = Riwayat_iuran::find($id);
        if(is_null($riwayat_iuran)){
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new RiwayatIuranResource($riwayat_iuran)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riwayat_iuran  $riwayat_iuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Riwayat_iuran $riwayat_iuran)
    {
        //
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
            'status_jumlah' => $request->status_jumlah,
        ]);
        return response()->json(['Program updated successfully.', $riwayat_iuran]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riwayat_iuran  $riwayat_iuran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat_iuran = Riwayat_iuran::find($id);
        $riwayat_iuran -> delete();
        return response() ->json('Data deleted succesfully');
    }
}
