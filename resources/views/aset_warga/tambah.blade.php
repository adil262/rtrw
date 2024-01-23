@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Aset Warga</h3>
       </div>
       <form action="{{ route('aset_warga.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="card-body">
               <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Nama Aset</label>
                       <input type="text" class="form-control" id="nama_aset" name="nama_aset" placeholder="Masukkan Nama Aset">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Jumlah</label>
                       <input type="number" class="form-control"  id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
                   </div>
               </div>
               <div class="row">
                   <div class="co col-md-6 form-group">
                       <label for="exampleInputFile">Foto</label>
                       <div class="input-group">
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" id="foto" name="foto">
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
                               <option value="tersedia">Tersedia</option>
                               <option value="dipinjam">Dipinjam</option>
                           </select>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Peminjaman</label>
                       <input type="number" class="form-control"  id="id_peminjaman" name="id_peminjaman" placeholder="Masukkan id peminjaman">
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
