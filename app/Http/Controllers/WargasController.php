<?php

namespace App\Http\Controllers;

use App\Models\Wargas;
use GrahamCampbell\ResultType\Success;
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
        $warga = Wargas::latest()->paginate(10);
        return view('warga.index', compact('warga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warga.tambah');
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
            'id_rtrws' => '2',
            'id_rumahs' => '2',
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
            return redirect()->route('wargas.index');
        } else {
            return redirect()->route('wargas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wargas  $wargas
     * @return \Illuminate\Http\Response
     */
    public function show(Wargas $wargas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wargas  $wargas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wargas = Wargas::find($id);
        return view('warga.update', compact('wargas'));
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

        if ($wargas) {
            return redirect()->route('wargas.index');
        } else {
            return redirect()->route('wargas.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wargas  $wargas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_warga)
    {
        // $warga = Wargas::findOrFail($id);
        // Storage::disk('local')->delete('public/wargas/' . $warga->foto);
        // $warga->delete();
        // // Wargas::destroy($warga->id_warga);
        $warga = Wargas::find($id_warga);
        $warga->delete();
        return redirect()->route('wargas.index');
    }
}
