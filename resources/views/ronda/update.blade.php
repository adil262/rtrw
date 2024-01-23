@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Update Data Ronda</h3>
       </div>
       <form action="{{ route('ronda.update', $ronda->id_ronda) }}" method="POST" enctype="multipart/form-data">

       @method("PUT")
           @csrf    
           <div class="card-body">
               <div class="row">
               <div class="col col-md-6 form-group">
                       <label>Ronda</label>
                       <input type="text" class="form-control" id="id_ronda" name="id_ronda" placeholder="Masukkan Judul">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Hari</label>
                       <input type="text" class="form-control" id="hari" name="hari" value="{{ $ronda->hari}}" placeholder="Masukkan Hari">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Jam</label>
                       <input type="text" class="form-control"  id="jam" name="jam" value="{{ $ronda->jam}}" placeholder="Masukkan Jam Ronda">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Nama Ronda</label>
                       <input type="text" class="form-control"  id="nama_ronda" name="nama_ronda" value="{{ $ronda->nama_ronda}}" placeholder="Masukkan Nama Ronda">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Tanggal</label>
                       <input type="date" class="form-control"  id="tanggal" name="tanggal" value="{{ $ronda->tanggal}}" placeholder="Masukkan Tanggal">
                   </div>
               </div>
        
                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="Ada"
                               @if ($ronda->status=="Ada")
                                     selected
                               @endif
                               >Ada</option>
                               <option value="Tidak Ada"
                                @if ($ronda->status=="Tidak Ada")
                                    selected
                               @endif>Tidak Ada</option>
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
