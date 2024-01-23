@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Jadwal Ronda</h3>
       </div>
       <form action="{{ route('jadwalronda.store') }}" method="POST" enctype="multipart/form-data">
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
                   <div class="col col-md-6 form-group">
                       <label>Ronda</label>
                       <input type="number" class="form-control"  id="id_ronda" name="id_ronda" >
                   </div>
               </div>
               <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="Ada" >Ada</option>
                               <option value="Tidak Ada">Tidak Ada</option>
                           </select>
                       </div>
                   </div>
                <!-- </div> -->
                   <!-- <div class="row"> -->
 
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
