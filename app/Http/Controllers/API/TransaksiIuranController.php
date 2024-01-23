<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiIuranResource;
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
        $data = DB::select("SELECT * FROM `transaksi_iurans` as ti, wargas as w , riwayat_iurans as ri WHERE ti.id_warga = w.id_warga && ti.id_iuran = ri.id_iuran");
        return response()->json(["data_transaksi" => $data, 'Program Fecthed.']);
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
        $bukti = $request->file('bukti');
        $bukti->storeAs('public/transaksi_iuran', $bukti->hashName());
        $transaksi_iuran = Transaksi_iuran::create([
            'bukti' => $bukti->hashName(),
            'id_warga' => $request->id_warga,
            'id_iuran' => $request->id_iuran,
            'tgl_iuran' => $request->tgl_iuran,
            'jumlah_iuran' => $request->jumlah_iuran,
            'status' => $request->status,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);
        if ($transaksi_iuran) {
            return response()->json(['Transaksi Iuran', new TransaksiIuranResource($transaksi_iuran)]);
        } else {
            return response()->json(['Gagal', new TransaksiIuranResource($transaksi_iuran)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi_iuran  $transaksi_iuran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi_iuran = DB::select("SELECT * FROM `transaksi_iurans` as ti, wargas as w , riwayat_iurans as ri 
            WHERE ti.id_warga = w.id_warga AND ti.id_warga ='$id' && ti.id_iuran = ri.id_iuran AND ti.id_iuran = '$id'");
        if (is_null($transaksi_iuran)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json(["data_transaksi" => $transaksi_iuran]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi_iuran  $transaksi_iuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi_iuran $transaksi_iuran)
    {
        //
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
            Storage::disk('local')->delete('public/transaksi_iuran/' . $transaksi_iuran->bukti);
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
        return response()->json(['Program updated successfully.', $transaksi_iuran]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi_iuran  $transaksi_iuran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi_iuran = Transaksi_iuran::find($id);
        $transaksi_iuran->delete();
        return response()->json('Data deleted successfully');
    }
}
