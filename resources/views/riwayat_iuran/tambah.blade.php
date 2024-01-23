@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Iuran</h3>
       </div>
       <form action="{{ route('riwayat_iuran.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="card-body">
           <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Nama Iuran</label>
                       <input type="text" class="form-control" id="nama_iuran" name="nama_iuran" placeholder="Masukkan Nama Iuran">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Periode</label>
                       <input type="text" class="form-control"  id="periode" name="periode" placeholder="Masukkan Periode">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Jumlah</label>
                       <input type="number" class="form-control"  id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
                   </div>

                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status Jumlah</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status Jumlah --</option>
                               <option value="Tetap">Tetap</option>
                               <option value="Tidak Tetap">Tidak Tetap</option>

                           </select>
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
