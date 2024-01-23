@extends('template/master')
@section('content')
<br>
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-tittle">Update Data Berita</h3>
            <div class="float-right">
                    <a href="{{ route('posyandu.index') }}" class="btn btn-primary float-right"> <i
                            class="fa fa-plus"></i>Kembali</a>
            </div>
        </div>
        <form action="{{ route('posyandu.update', $posyandu->id_posyandu) }}" method="POST" enctype='multipart/form-data'>
            @csrf 
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col col-md6 form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $posyandu->lokasi }}" placeholder="Masukkan Lokasi">
                        </div>
                    <div class="col col-md6 form-group">
                        <label>Lat</label>
                        <input type="text" class="form-control" id="lat" name="lat" value="{{ $posyandu->lat }}" placeholder="Masukkan Lat">
                        </div>
                    <div class="col col-md6 form-group">
                        <label>Long</label>
                        <input type="text" class="form-control" id="long" name="long" value="{{ $posyandu->long }}" placeholder="Masukkan Long">
                        </div>
                    <div class="col col-md-6 form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $posyandu->deskripsi }}" placeholder="Masukkan Deskripsi" >
                        </div>
                </div> 
                    <div class="row">
                        <div class="co col-md-6 form-group">
                            <label for="exampleInputFile">Gambar Posyandu</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Masukkan Gambar</label>
                                </div>
                            </div>
                        </div> 
                    </div>  
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
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

            
