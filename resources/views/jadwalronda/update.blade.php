@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Update Data Jadwal Ronda</h3>
       </div>
       <form action="{{ route('jadwalronda.update', $jadwalronda->id_jawalronda) }}" method="POST" enctype="multipart/form-data">

       @method("PUT")
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
                       <input type="number" class="form-control"  id="id_ronda" name="id_ronda" value="{{$jadwalronda->id_ronda}}">
                   </div>
               </div>
               <div class="col col-md-6 form-group">
                       <label for="exampleInputFile">Status</label>
                       <div class="input-group">
                           <select name="status" id="status" class="form-control">
                               <option value="">-- Status --</option>
                               <option value="Ada"
                               @if ($jadwalronda->status=="Ada")
                                     selected
                               @endif
                               >Ada</option>
                               <option value="Tidak Ada"
                                @if ($jadwalronda->status=="Tidak Ada")
                                    selected
                               @endif>Tidak Ada</option>
                           </select>
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
