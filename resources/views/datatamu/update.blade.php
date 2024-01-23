@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Update Data Tamu</h3>
       </div>
       <form action="{{ route('datatamu.update', $datatamu->id) }}" method="POST" enctype="multipart/form-data">
          
           @csrf
           @METHOD("PUT")    
           <div class="card-body">
               <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>NIK</label>
                       <input type="text" class="form-control" id="nik" name="nik" value="{{ $datatamu->nik}}" placeholder="Masukkan NIK">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Nama</label>
                       <input type="text" class="form-control"  id="nama" name="nama" value="{{ $datatamu->nama}}" placeholder="Masukkan Nama">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Alamat</label>
                       <input type="text" class="form-control"  id="alamat" name="alamat" value="{{ $datatamu->alamat}}"placeholder="Masukkan Alamat">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Jenis Kelamin</label>
                       <div class="input-group">
                           <select name="jk" id="jk" class="form-control">
                               <option value="">-- Jenis Kelamin --</option>
                               <option value="laki-laki">Laki-Laki</option>
                               <option value="perempuan">Perempuan</option>

                           </select>
                       </div>
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Tanggal Lahir</label>
                       <input type="date" class="form-control"  id="tanggal_lahir" name="tanggal_lahir" value="{{ $datatamu->tanggal_lahir}}">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Tanggal Masuk</label>
                       <input type="date" class="form-control"  id="tanggal_masuk" name="tanggal_masuk" value="{{ $datatamu->tanggal_masuk}}">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Tanggal Keluar</label>
                       <input type="date" class="form-control"  id="tanggal_keluar" name="tanggal_keluar"value="{{ $datatamu->tanggal_keluar}}">
                   </div>
                  
                   

               </div>
               <div class="row">
                   <div class="co col-md-6 form-group">
                       <label for="exampleInputFile"> Bukti</label>
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
                   
                   
               </div>
                   <div class="row">
                   <div class="col col-md-12 form-group">
                       <label>Deskripsi Data Tamu</label>
                       <div class="input-group">
                           <textarea id="deskripsi_form" class="form-control" name="keperluan"value="{{ $datatamu->keperluan}}">
                               {{$datatamu->keperluan}}
                              
                             </textarea>
                       </div>
                   </div>
              

           </div>
           <div class="card-footer">
               <button type="submit" class="btn btn-primary">Update</button>
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





