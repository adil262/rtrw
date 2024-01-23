@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Posyandu</h3>
           <div class="float-right">
                    <a href="{{ route('posyandu.index') }}" class="btn btn-primary float-right"> <i
                            class="fa fa-plus"></i>Kembali</a>
                </div>
       </div>
       <form action="{{ route('posyandu.store') }}" method="POST" enctype="multipart/form-data">
           @csrf    
           <div class="card-body">
               <div class="row">
                   <div class="col col-md-6 form-group">
                       <label>Lokasi</label>
                       <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Lat</label>
                       <input type="text" class="form-control"  id="lat" name="lat" placeholder="Masukkan Lat">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Long</label>
                       <input type="text" class="form-control"  id="long" name="long" placeholder="Masukkan Long">
                   </div>
                <!-- </div> -->
                   <!-- <div class="row"> -->
                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Gambar</label>
                       <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  id="foto" name="foto" >
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
                       <label for="exampleInputFile">Deskripsi Posyandu</label>
                       <div class="input-group">
                            <textarea id="deskripsi_form" class="form-control" name="deskripsi">
                               Place <em>some</em> <u>text</u> <strong>here</strong>
                            </textarea>
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


