<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\SarankelResource;
use App\Http\Controllers\Controller;
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
        $data=DB::select("SELECT * FROM sarankels as sr ,wargas as w where sr.id_warga = w.id_warga");
        return response()->json(["sarankel" => $data, 'Programs Fecthed.']);
        
        // $data = Sarankel::latest()->get();
        // // return response()->json([SarankelResource::collection($data), 'Programs Fecthed.']);
        // return response()->json(["saran_keluhan" => $data]);
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
        $fotos = $request->file('foto');
        $fotos->storeAs('public/sarankel', $fotos->hashName());
        $sarankel = Sarankel::create([
            'id_warga' => $request->id_warga,
            'foto' => $fotos->hashName(),
            'keluhan' => $request->keluhan,
            'status' => $request->status,
            'tanggal_create' => $request->tanggal_create,
            'tanggal_finish' => $request->tanggal_finish,

        ]);
        if($sarankel){
            return response()->json(['Saran Keluhan Berhasil Ditambahkan', new SarankelResource($sarankel)]);
        }else{
            return response()->json(['Gagal', new SarankelResource($sarankel)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sarankel  $sarankel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sarankel = DB::select("SELECT * FROM sarankels as sr, wargas as w WHERE sr.id_warga = w.id_warga AND sr.id_warga ='$id'");
        if (is_null($sarankel)){
            return response()->json('Data Not Found', 404);
        }
        return response()->json(["data_sarankel" => $sarankel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sarankel  $sarankel
     * @return \Illuminate\Http\Response
     */
    public function edit(Sarankel $sarankel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sarankel  $sarankel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sarankels)
    {
        $sarankel = Sarankel::findOrFail($id_sarankels);
        if ($request->file('foto') == ""){
            $sarankel->update([
                'id_warga' => $request->id_warga,
                'keluhan' => $request->keluhan,
                'status' => $request->status,
                'tanggal_create' => $request->tanggal_create,
                'tanggal_finish' => $request->tanggal_finish, 
            ]);
        }else{
            if (Storage::disk('local')->exists('public/sarankel/'.$sarankel->foto)){
                Storage::disk('local')->delete('public/sarankel/'.$sarankel->foto);
            }
            $foto =$request->file('foto');
            $foto->storeAs('public/sarankel', $foto->hashName());
            $sarankel->update([
                'id_warga' => $request->id_warga,
                'foto' => $foto->hashName(),
                'keluhan' => $request->keluhan,
                'status' => $request->status,
                'tanggal_create' => $request->tanggal_create,
                'tanggal_finish' => $request->tanggal_finish, 

            ]);
        }
        return response()->json(['Program updated succesfully.', $sarankel]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sarankel  $sarankel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sarankels)
    {
        $sarankel = Sarankel::find($id_sarankels);
        $sarankel->delete();
        return response()->json('Data deleted successfully');
    }
}
