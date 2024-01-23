@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Iuran</h3>
       </div>
       <form action="{{ route('transaksi_iuran.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="card-body">
           <div class="row">
            <div class="col col-md-6 form-group">
                <label for="exampleInputFile">Nama Warga</label>
                    <div class="input-group">
                        <select name="id_warga" id="id_warga" class="form-control">
                            <option value="">-- Nama Warga --</option>
                            @foreach ($warga as $item)
                                <option value="{{$item->id_warga}}" class="form-control">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
                   <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Nama Iuran</label>
                        <div class="input-group">
                            <select name="id_iuran" id="id_iuran" class="form-control">
                                <option value="">-- Nama Iuran --</option>
                                @foreach ($riwayat as $item)
                                    <option value="{{$item->id_iuran}}" class="form-control">{{$item->nama_iuran}}</option>
                                @endforeach
                            </select>
                        </div>
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Tanggal Iuran</label>
                       <input type="date" class="form-control" id="tgl_iuran" name="tgl_iuran" placeholder="Masukkan Tanggal Iuran">
                   </div>
                   <div class="col col-md-6 form-group">
                   <label for="exampleInputFile">Jumlah Iuran</label>
                        <div class="input-group">
                            <select name="id_iuran" id="id_iuran" class="form-control">
                                <option value="">-- Jumlah --</option>
                                @foreach ($riwayat as $item)
                                    <option value="{{$item->id_iuran}}" class="form-control">{{$item->jumlah}}</option>
                                @endforeach
                            </select>
                        </div>
                   </div>
                   <div class="co col-md-6 form-group">
                       <label for="exampleInputFile">Bukti Pembayaran</label>
                       <div class="input-group">
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" id="bukti" name="bukti">
                               <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                           </div>
                           <div class="input-group-append">
                               <span class="input-group-text">Upload</span>
                           </div>
                       </div>
                    </div>
                    <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="Lunas">Lunas</option>
                               <option value="Belum Lunas">Belum Lunas</option>
                           </select>
                       </div>
                   </div>
                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Metode Pembayaran</label>
                       <div class="input-group">
                           <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                               <option value="">-- Status Pembayaran --</option>
                               <option value="Transfer">Transfer</option>
                               <option value="Langsung">Langsung</option>

                           </select>
                       </div>
                   </div>
               </div>
            </div>
               </div>
           <div class="card-footer">
               <button type="submit" class="btn btn-primary">Tambah</button>
           </div>
       </form>
   </div>
</div>
@endsection
@section('css')
 <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('js')
   <script src="{{ url('plugins/summernote/summernote-bs4.min.js')}}"></script>
   <script>
       $(function () {
         $('#deskripsi_form').summernote()
       })
     </script>
@endsection
