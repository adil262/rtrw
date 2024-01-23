<?php

namespace App\Http\Controllers;

use App\Models\ronda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storages;
class rondaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ronda = ronda::latest()->paginate(10);
        return view('ronda.index',compact('ronda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ronda.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $ronda = ronda::create([
            'hari' => $request->hari,
            'jam' => $request->jam,
            'nama_ronda' => $request->nama_ronda,
            'tanggal' => $request->tanggal,
            'status' =>$request->status,

        ]);
        if($ronda){
            return redirect()->route('ronda.index')->with(['succes'=> 'Data Berhasil Disimpan']);
        }else{
            return redirect()->route('ronda.index')->with(['error'=>'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ronda  $ronda
     * @return \Illuminate\Http\Response
     */
    public function show(ronda $ronda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ronda  $ronda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ronda = ronda::find($id);
        return view('ronda.update', compact('ronda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ronda  $ronda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ronda = ronda::findOrFail($id);
            $ronda->update([
            'hari' => $request->hari,
            'jam' => $request->jam,
            'nama_ronda' => $request->nama_ronda,
            'tanggal' => $request->tanggal,
            'status' =>$request->status,
            ]);
        
        if($ronda){
            return redirect()->route('ronda.index')->with(['succes'=> 'Data Berhasil Disimpan']);
        }else{
            return redirect()->route('ronda.index')->with(['error'=>'Data Gagal Disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ronda  $ronda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ronda = ronda::findOrFail($id);
       
        $ronda->delete();
        if($ronda){
            return redirect()->route('ronda.index')->with(['succes'=> 'Data Berhasil Disimpan']);
        }else{
            return redirect()->route('ronda.index')->with(['error'=>'Data Gagal Disimpan']);
        }

        }

    
    }

