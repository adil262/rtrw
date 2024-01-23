<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\JadwalrondaResource;
use App\Models\jadwalronda;
use Illuminate\Http\Request;

class JadwalrondaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jadwalronda::latest()->get();
        return response()->json([JadwalrondaResource::collection($data), 'Programs Fechted']);
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
        $jadwalkendaraan = Jadwalronda::create([
            'id_warga' =>$request->id_warga,
            'id_ronda' =>$request->id_ronda,
            'status' =>$request->status,
        ]);
        if($jadwalkendaraan){
            return response()->json(['Jadwal Ronda Berhasil Ditambah', new JadwalrondaResource($jadwalkendaraan)]);
        }else{
            return response()->json(['Gagal', new JadwalrondaResource($jadwalkendaraan)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwalkendaraan  $jadwalkendaraan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwalkendaraan = Jadwalronda::find($id);
        if (is_null($jadwalkendaraan)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new JadwalrondaResource($jadwalkendaraan)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwalkendaraan  $jadwalkendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwalkendaraan $jadwalkendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwalkendaraan  $jadwalkendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jadwalkendaraan = Jadwalronda::findOrFail($id);
        $jadwalkendaraan ->update ([
            'id_warga' =>$request->id_warga,
            'id_ronda' =>$request->id_ronda,
            'status' =>$request->status,
            ]);
       
        
        return response()->json(['Program updated successfully',$jadwalkendaraan]);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwalkendaraan  $jadwalkendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwalkendaraan = Jadwalronda::findOrFail($id);
        $jadwalkendaraan->delete();
        return response()->json('Data deletede succesfully');
    }
}
