@extends('template/master')
@section('content')
<br>
<div class="col">
   <div class="card card-primary">
       <div class="card-header">
           <h3 class="card-title">Tambah Data Warga</eritah3>
       </div>
       <form action="{{ route('wargas.store') }}" method="POST" enctype="multipart/form-data">
          @csrf    
          <div class="card-body">
              <div class="row">
                  <div class="col col-md-6 form-group">
                      <label>NIK</label>
                      <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
                  </div>
                  <div class="col col-md-6 form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control"  id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                  </div>
                  <div class="col col-md-6 form-group">
                    <label>Kelurahan</label>
                    <input type="text" class="form-control"  id="kelurahan" name="kelurahan" placeholder="Masukkan kelurahan">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Agama</label>
                    <input type="text" class="form-control"  id="agama" name="agama" placeholder="Masukkan agama">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Pekerjaan</label>
                    <input type="text" class="form-control"  id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan">
                </div>
                <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Level</label>
                    <div class="input-group">
                        <select name="level" id="level" class="form-control">
                            <option value="">-- level --</option>
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
                            <option value="">-- Status --</option>
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
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Role</label>
                    <div class="input-group">
                        <select name="role" id="role" class="form-control">
                            <option value="">-- Role --</option>
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
                            <input type="file" class="custom-file-input" id="foto" name="foto">
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
                            <input type="date" class="form-control"  id="date" name="tanggal_lahir" >
                        </div>
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Password</label>
                        <input type="password" class="form-control"  id="password" name="password" placeholder="Masukkan pekerjaan">
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
