@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">  
       <div class="card-header">
           <h3 class="card-title">Edit Data Usaha Warga</h3>
       </div>
       <form action="{{ route('usahawarga.update', $usahawarga->id) }}" method="POST" enctype="multipart/form-data">
           @csrf  
           @method("PUT")  
           <div class="card-body">
           <div class="row">
           <div class="col col-md-6 form-group">
               <label>ID Warga</label>
                       <input type="text" class="form-control" id="id_warga" name="id_warga" value="{{$usahawarga->id_warga}}" placeholder="Masukkan id">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Judul</label>
                       <input type="text" class="form-control" id="judul" name="judul" value="{{$usahawarga->judul}}" placeholder="Masukkan Judul">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Deskripsi</label>
                       <input type="text" class="form-control"  id="deskripsi" name="deskripsi" value="{{$usahawarga->deskripsi}}" placeholder="Masukkan Deskripsi">
                   </div>
               </div>
               <div class="row">
                   <div class="co col-md-6 form-group">
                       <label for="exampleInputFile">Gambar</label>
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
                       <label>Nomor HP</label>
                       <input type="text" class="form-control"  id="no_hp_usaha" name="no_hp_usaha" value="{{$usahawarga->no_hp_usaha}}"placeholder="Masukkan Nomor HP">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="publish"
                               @if ($usahawarga->status=="publish")
                                    selected
                               @endif>Publish</option>

                               <option value="draft"
                               @if ($usahawarga->status=="draft")
                                    selected
                               @endif>Draft</option>

                               <option value="unpublish"
                               @if ($usahawarga->status=="unpublish")
                                    selected
                               @endif>Unpublish</option>
                           </select>
                       </div>
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