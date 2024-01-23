<?php

namespace App\Http\Controllers;

use App\Models\Transaksi_iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class TransaksiIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi_iuran = DB::select("SELECT * FROM `transaksi_iurans` as ti, wargas as w , riwayat_iurans as ri WHERE ti.id_warga = w.id_warga && ti.id_iuran = ri.id_iuran");
        return view('transaksi_iuran.index', compact('transaksi_iuran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = DB::select('select * from wargas');
        $riwayat = DB::select('select * from riwayat_iurans');
        return view('transaksi_iuran.tambah', compact('warga','riwayat'));
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
        $bukti->storeAs('public/transaksi_iuran', $bukti->hashName());
        $transaksi_iuran = Transaksi_iuran::create([
            'bukti' => $bukti->hashName(),
            'id_warga' => $request->id_warga,
            'id_iuran' => $request->id_iuran,
            'tgl_iuran' => $request->tgl_iuran,
            'status' => $request->status,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);
        if ($transaksi_iuran) {
            return redirect()->route('transaksi_iuran.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('transaksi_iuran.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi_iuran  $transaksi_iuran
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi_iuran $transaksi_iuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi_iuran  $transaksi_iuran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warga = DB::select('select * from wargas');
        $riwayat = DB::select('select * from riwayat_iurans');
        $transaksi_iuran = Transaksi_iuran::find($id);
        return view('transaksi_iuran.update', compact('transaksi_iuran','warga','riwayat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi_iuran  $transaksi_iuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi_iuran = Transaksi_iuran::findOrFail($id);
        if ($request->file('bukti') == "") {
            $transaksi_iuran->update([
                'id_warga' => $request->id_warga,
                'id_iuran' => $request->id_iuran,
                'tgl_iuran' => $request->tgl_iuran,
                'status' => $request->status,
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);
        } else {
            if (Storage::disk('local')->exists('public/transaksi_iuran/' . $transaksi_iuran->bukti)) {
                Storage::disk('local')->exists('public/transaksi_iuran/' . $transaksi_iuran->bukti);
            }
            $bukti = $request->file('bukti');
            $bukti->storeAs('public/transaksi_iuran', $bukti->hashName());
            $transaksi_iuran->update([
                'bukti' => $bukti->hashName(),
                'id_warga' => $request->id_warga,
                'id_iuran' => $request->id_iuran,
                'tgl_iuran' => $request->tgl_iuran,
                'status' => $request->status,
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);
        }
        if ($transaksi_iuran) {
            return redirect()->route('transaksi_iuran.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('transaksi_iuran.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi_iuran  $transaksi_iuran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi_iuran = Transaksi_iuran::findOrFail($id);
        Storage::disk('local')->delete('public/transaksi_iuran/' . $transaksi_iuran->bukti);
        $transaksi_iuran->delete();
        if ($transaksi_iuran) {
            return redirect()->route('transaksi_iuran.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('transaksi_iuran.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
