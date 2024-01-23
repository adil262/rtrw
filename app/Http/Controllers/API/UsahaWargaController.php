<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UsahaWarga;
use Illuminate\Http\Request;
use App\Http\Resources\UsahaWargaResource;
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
        $data = DB::select("SELECT * FROM usaha_wargas as uw, wargas as w WHERE uw.id_warga = w.id_warga");
        return response()->json(["data_usaha"=>$data, 'Program Fetched']);
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
            return response()->json(['Usaha Warga Berhasil Ditambah', new UsahaWargaResource($usahawarga)]);
        } else {
            return response()->json(['Gagal', new UsahaWargaResource($usahawarga)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsahaWarga  $usahaWarga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usahawarga = DB::select("SELECT * FROM usaha_wargas as uw, wargas as w WHERE uw.id_warga = w.id_warga AND uw.id='$id'");
        if(is_null($usahawarga)){
            return response()->json('Data Not Found', 404);
        }
        return response()->json(["data_usaha"=>$usahawarga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsahaWarga  $usahaWarga
     * @return \Illuminate\Http\Response
     */
    public function edit(UsahaWarga $usahaWarga)
    {
        //
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
        return response()->json(['Program Update Successfully.', $usahawarga]);
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
        return response()->json('Data Deleted Successfully');
    }
}
