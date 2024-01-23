@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Edit Data {{$wargas->nama}}</h3>
       </div>
       <form action="{{ route('wargas.update', $wargas->id_warga) }}" method="POST" enctype="multipart/form-data">
          @csrf    
          @method('put')
          <div class="card-body">
              <div class="row">
                  <div class="col col-md-6 form-group">
                      <label>NIK</label>
                      <input type="text" class="form-control" value="{{$wargas->nik}}" id="nik" name="nik" placeholder="Masukkan NIK">
                  </div>
                  <div class="col col-md-6 form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" value="{{$wargas->nama}}"  id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                  </div>
                  <div class="col col-md-6 form-group">
                    <label>Kelurahan</label>
                    <input type="text" class="form-control" value="{{$wargas->kelurahan}}"  id="kelurahan" name="kelurahan" placeholder="Masukkan kelurahan">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Agama</label>
                    <input type="text" class="form-control" value="{{$wargas->agama}}"  id="agama" name="agama" placeholder="Masukkan agama">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Pekerjaan</label>
                    <input type="text" class="form-control" value="{{$wargas->pekerjaan}}" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan">
                </div>
                <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Level</label>
                    <div class="input-group">
                        <select name="level" id="level" class="form-control">
                            <option value="{{$wargas->level}}">{{$wargas->level}}</option>
                            <option value="anak">Anak</option>
                            <option value="kepala keluarga">Kepala Keluarga</option>
                            <option value="istri">Istri</option>
                        </select>
                    </div>
                </div>
                <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Status</label>
                    <div class="input-group">
                        <select name="status" id="status" class="form-control">
                            <option value="{{$wargas->status}}">{{$wargas->status}}</option>
                            <option value="pindah">Pindah</option>
                            <option value="meninggal">Meninggal</option>
                            <option value="aktif">Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Jenis Kelamin</label>
                    <div class="input-group">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="{{$wargas->jenis_kelamin}}">{{$wargas->jenis_kelamin}}</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Role</label>
                    <div class="input-group">
                        <select name="role" id="role" class="form-control">
                            <option value="{{$wargas->role}}">{{$wargas->role}}</option>
                            <option value="lurah">Lurah</option>
                            <option value="rt">RT</option>
                            <option value="rw">RW</option>
                            <option value="warga">Warga</option>
                        </select>
                    </div>
                </div>
                <div class="co col-md-6 form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input value="{{$wargas->foto}}" type="file" class="custom-file-input" id="foto" name="foto">
                            <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
              </div>

                <div class="row">
            
                    <div class="co col-md-6 form-group">
                        <label for="exampleInputFile">Tanggal Lahir</label>
                        <div class="input-group">
                            <input value="{{$wargas->tanggal_lahir}}" type="date" class="form-control"  id="date" name="tanggal_lahir" >
                        </div>
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" value="{{$wargas->password}}" id="password" name="password" placeholder="Masukkan pekerjaan">
                    </div>
                </div>
            
            </div>
          
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
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
