@extends('template/master')
@section('content')
<br>
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pengajuan Surat</h3>
        </div>
        <form action="{{ route('pengajuan_surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Keperluan</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Masukkan keperluan">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan jenis">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Dibuat Untuk</label>
                        <input type="text" class="form-control" id="dibuat" name="dibuat_untuk" placeholder="Dibuat Untuk">
                    </div>
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
                </div>
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Tanggal Keperluan</label>
                        <input type="date" class="form-control" id="tgl_keperluan" name="tgl_keperluan" placeholder="Masukkan Tanggal">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label for="Keterangan">Keterangan</label>
                        <div>
                            <textarea id="deskripsi_form" class="form-control" name="keterangan">
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
    $(function() {
        $('#deskripsi_form').summernote()
    })
</script>
@endsection
