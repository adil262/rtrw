@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Ronda</h3>
       </div>
       <form action="{{ route('ronda.store') }}" method="POST" enctype="multipart/form-data">
           @csrf    
           <div class="card-body">
               <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Hari</label>
                       <input type="text" class="form-control" id="hari" name="hari" placeholder="Masukkan Judul">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Jam</label>
                       <input type="text" class="form-control"  id="jam" name="jam" placeholder="Masukkan Kategori">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Nama Ronda</label>
                       <input type="text" class="form-control"  id="nama_ronda" name="nama_ronda" placeholder="Masukkan Kategori">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Tanggal</label>
                       <input type="date" class="form-control"  id="tanggal" name="tanggal" placeholder="Masukkan Kategori">
                   </div>
               </div>
                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="publish">draft</option>
                               <option value="draft">publish</option>
                           </select>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col col-md-12 form-group">
                      
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
