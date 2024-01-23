@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Saran dan Keluhan</h3>
       </div>
       <form action="{{ route('sarankel.store') }}" method="POST" enctype="multipart/form-data">
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
                   <div class="col col-md-12 form-group">
                       <label for="exampleInputFile">Saran dan Keluhan</label>
                       <div class="input-group"> 
                       <textarea id="deskripsi_form" class="form-control" name="keluhan" >
                               Place <em>some</em> <u>text</u> <strong>here</strong>
                             </textarea>
                       </div>
                   </div>
               </div>
               <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="Aktif">Aktif</option>
                               <option value="Tidak Aktif">Tidak Aktif</option>
                           </select>
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
                   </div></div>
                   <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Tanggal Create</label>
                       <input type="date" class="form-control"  id="tanggal_create" name="tanggal_create">
                   </div>
</div>
               
               <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Tanggal Finish</label>
                       <input type="date" class="form-control"  id="tanggal_finish" name="tanggal_finish">
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

