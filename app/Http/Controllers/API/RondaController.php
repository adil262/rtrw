<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RondaResource;
use App\Models\Ronda;
use Illuminate\Http\Request;

class RondaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ronda::latest()->get();
        return response()->json([RondaResource::collection($data), 'Programs Fechted']);
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
        $ronda = Ronda::create([
            'hari' =>$request->hari,
            'jam' =>$request->jam,
            'nama_ronda' =>$request->nama_ronda,
            'tanggal' =>$request->tanggal,
            'status' =>$request->status,
        ]);
        if($ronda){
            return response()->json([' Ronda Berhasil Ditambah', new RondaResource($ronda)]);
        }else{
            return response()->json(['Gagal', new RondaResource($ronda)]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ronda  $ronda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ronda = Ronda::find($id);
        if (is_null($ronda)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new RondaResource($ronda)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ronda  $ronda
     * @return \Illuminate\Http\Response
     */
    public function edit(Ronda $ronda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ronda  $ronda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ronda = Ronda::findOrFail($id);
        
            $ronda->update([
            'hari' => $request ->hari,
            'jam' =>$request ->jam,
            'nama_ronda' =>$request ->nama_ronda,
            'tanggal' =>$request ->tanggal,
                'status' => $request->status,
            ]);
     
        
        return response()->json(['Program updated succesfully', $ronda]);
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ronda  $ronda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ronda = Ronda::findOrFail($id);
        $ronda->delete();
        return response()->json('Data deletede succesfully');
    }
}