<?php

namespace App\Http\Controllers;

use App\Models\jadwalronda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class jadwalrondaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalronda = DB::select("SELECT * FROM jadwalrondas as jr, wargas as w WHERE jr.id_warga = w.id_warga");
        // $jadwalronda = Jadwalronda::latest()->paginate(10);
        return view('jadwalronda.index', compact('jadwalronda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = DB::select('select * from wargas');
        $jadwalronda = DB::select('select * from jadwalrondas');
        return view('jadwalronda.tambah', compact('warga','jadwalronda'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwalronda= jadwalronda::create([
            'id_jawalronda' => $request->id_jawalronda,
            'id_warga' => $request->id_warga,
            'id_ronda' => $request->id_ronda,
            'status' => $request->status,
        ]);
        if($jadwalronda) {
            return redirect()->route('jadwalronda.index')->with(['succes' =>'Berhasil']);

        }else{
            return redirect()->route('jadwalronda.index')->with(['succes' =>'Gagal']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadwalronda  $jadwalronda
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $jadwalronda = DB::select("SELECT * FROM jadwalrondas as jr, wargas as w , rondas as r 
            WHERE jr.id_warga = w.id_warga AND jr.id_warga ='$id' && jr.id_ronda = r.id_ronda AND jr.id_ronda = '$id'");
            if (is_null($jadwalronda)) {
                return response()->json('Data Not Found', 404);
            }
            return response()->json(["data_transaksi" => $jadwalronda]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwalronda  $jadwalronda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warga = DB::select('select * from wargas');
        $ronda = DB::select('select * from rondas');
        $jadwalronda = jadwalronda::find($id);
        return view('jadwalronda.update', compact('jadwalronda','warga','ronda'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwalronda  $jadwalronda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,   $id)
    {
        $jadwalronda = jadwalronda::findOrFail($id);
            $jadwalronda->update([
            'status' =>$request->status,
            ]);
        
        if($id){
            return redirect()->route('jadwalronda.index')->with(['succes'=> 'Data Berhasil Disimpan']);
        }else{
            return redirect()->route('jadwalronda.index')->with(['error'=>'Data Gagal Disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwalronda  $jadwalronda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwalronda = jadwalronda::find($id);
        $jadwalronda->delete();
       return response()->json('Data deleted successfully');

        }
}
