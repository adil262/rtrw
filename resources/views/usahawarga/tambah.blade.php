@extends('template/master')

@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Usaha Warga</h3>
       </div>
       <form action="{{ route('usahawarga.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="card-body">
           <div class="row">
           <div class="col col-md-6 form-group">
                       <label>Pilih Warga</label>
                       <div class="input-group">
                            <select name="id_warga" id="id_warga" class="form-control">
                                @foreach($warga as $item)
                                    <option value="{{$item->id_warga}}" class="form-control">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Judul</label>
                       <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Deskripsi</label>
                       <input type="text" class="form-control"  id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi">
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
                       <input type="text" class="form-control"  id="no_hp_usaha" name="no_hp_usaha" placeholder="Masukkan Nomor HP">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="publish">Publish</option>
                               <option value="draft">Draft</option>
                               <option value="unpublish">Unpublish</option>
                           </select>
                       </div>
                   </div>
               </div>
               <!-- <div class="row">
                   <div class="col col-md-12 form-group">
                       <label for="exampleInputFile">Deskripsi Berita</label>
                       <div class="input-group">
                           <textarea id="deskripsi_form" class="form-control" name="deskripsi">
                               Place <em>some</em> <u>text</u> <strong>here</strong>
                             </textarea>
                       </div>
                   </div>
               </div> -->
               </div>
           <div class="card-footer">
               <button type="submit" class="btn btn-primary">Tambah</button>
               <a class="btn btn-primary" href="{{ route('usahawarga.index') }}" role="button">Kembali</a>
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

