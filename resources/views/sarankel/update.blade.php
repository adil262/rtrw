@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">  
       <div class="card-header">
           <h3 class="card-title">Edit Data Saran dan Keluhan</h3>
       </div>
       <form action="{{ route('sarankel.update', $sarankel->id_sarankel) }}" method="POST" enctype="multipart/form-data">
           @csrf  
           @method("PUT")  
           <div class="card-body">
           <div class="row">
           <div class="col col-md-6 form-group">
           <label for="exampleInputFile">Warga</label>
                       <div class="input-group">
                           <select name="id_warga" id="id_warga" class="form-control">
                               <!-- <option value="">-- Status --</option> -->
                               @foreach ($warga as $item)
                                    <option value="{{$item->id_warga}}" class="form-control"
                                    @if($sarankel->status=="{{$item->id_warga}}")
                                    selected
                                    @endif
                                    >{{$item->nama}}</option>
                                @endforeach

                           </select>
                       </div>

                   </div>
                   <div class="col col-md-12 form-group">
                       <label for="exampleInputFile">Keluhan</label>
                       <div class="input-group">
                           <textarea id="deskripsi_form" class="form-control" name="keluhan" >
                               {{$sarankel->keluhan}}
                             </textarea>
                       </div>
               </div>
               <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="Aktif"
                               @if ($sarankel->status=="Aktif")
                                    selected
                               @endif
                                >Aktif</option>
                                <option value="Tidak Aktif"
                                @if ($sarankel->status=="Tidak Aktif")
                                    selected
                                @endif
                                >Tidak Aktif</option>
                           </select>
                       </div>
                   </div>
</div>
                   
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
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Tanggal Create</label>
                       <input type="date" class="form-control"  id="tanggal_create" name="tanggal_create" value="{{$sarankel->tanggal_create}}">
                   </div>
                   <div class="col col-md-6 form-group">
                       <label>Tanggal Finish</label>
                       <input type="date" class="form-control"  id="tanggal_finish" name="tanggal_finish" value="{{$sarankel->tanggal_finish}}">
                   </div>
                   
                  
               </div>
               
             
           </div>
           <div class="card-footer">
               <button type="submit" class="btn btn-primary">Update</button>
           </div>
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

