@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Arsip RT RW</h3>
       </div>
       <form action="{{ route('arsiprtrw.update', $arsiprtrw -> id) }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method("PUT")
           <div class="card-body">
               <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Nama Arsip</label>
                       <input type="text" class="form-control"  id="nama_arsip" name="nama_arsip" value="{{$arsiprtrw->nama_arsip}}">
                   </div>
               </div>
               <div class="row">
                   <div class="co col-md-6 form-group">
                       <label for="exampleInputFile">File Arsip</label>
                       <div class="input-group">
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" id="file_arsip" name="file_arsip">
                               <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                           </div>
                           <div class="input-group-append">
                               <span class="input-group-text">Upload</span>
                           </div>
                       </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Deskripsi</label>
                       <div class="input-group">
                       <textarea id="deskripsi" class="form-control" name="deskripsi">
                               {{$arsiprtrw->deskripsi}}
                             </textarea>
                       </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Id RT RW</label>
                       <input type="number" class="form-control" id="id_rt_rw" name="id_rt_rw" value="{{$arsiprtrw->id_rt_rw}}">
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
         $('#deskripsi').summernote()
       })
     </script>
@endsection