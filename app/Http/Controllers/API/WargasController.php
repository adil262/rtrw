<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WargasResource;
use App\Models\Wargas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WargasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wargas::latest()->get();
        return response()->json(["warga" => $data]);
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
        $image = $request->file('foto');
        $image->storeAs('public/warga', $image->hashName());
        $wargas = Wargas::create([
            'level' => $request->level,
            'nama' => $request->nama,
            'password' => $request->password,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status' => $request->status,
            'kelurahan' => $request->kelurahan,
            'foto' => $image,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => $request->role,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
        ]);
        if ($wargas) {
            return response()->json(['Data bisa ditambah', new WargasResource($wargas)]);
        } else {
            return response()->json(['Gagal', new WargasResource($wargas)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wargas  $wargas
     * @return \Illuminate\Http\Response
     */
    public function show($id_warga)
    {
        $wargas = Wargas::find($id_warga);
        if (is_null($wargas)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new WargasResource($wargas)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wargas  $wargas
     * @return \Illuminate\Http\Response
     */
    public function edit(Wargas $wargas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wargas  $wargas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_warga)
    {
        $wargas = Wargas::findOrFail($id_warga);
        if ($request->file('foto') == "") {
            $wargas->update([
                'level' => $request->level,
                'nama' => $request->nama,
                'password' => $request->password,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => $request->status,
                'kelurahan' => $request->kelurahan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'role' => $request->role,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
            ]);
        } else {
            Storage::disk('local')->delete('public/wargas/' . $wargas->foto);
            $image = $request->file('foto');
            $image->storeAs('public/warga', $image->hashName());
            $wargas->update([
                'foto' => $image->hashName(),
                'level' => $request->level,
                'nama' => $request->nama,
                'password' => $request->password,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status' => $request->status,
                'kelurahan' => $request->kelurahan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'role' => $request->role,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
            ]);
        }
        return response()->json(['Program updated successfully', $wargas]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wargas  $wargas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_warga)
    {
        $wargas = Wargas::find($id_warga);
        $wargas->delete();
        return response()->json('data deleted successfully');
    }
}
