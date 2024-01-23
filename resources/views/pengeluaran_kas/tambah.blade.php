@extends('template.master')
@section('css')
<link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
@endsection


@section('content')
<div class="col">

    <div class="card card-primary">
        <div class="mt-2 mb-2">
            <a href="{{ route('pengeluaran_kas.index') }}" class="btn btn-primary float-left"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="card-header">
            <h3 class="card-title">Tambah Data Berita</h3>
        </div>
        <form action="{{ route('pengeluaran_kas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Tanggal Pengeluaran</label>
                        <input type="date" class="form-control" id="tgl_pengeluaran" name="tgl_pengeluaran">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Nama Pengeluaran</label>
                        <input type="text" class="form-control" id="nama_pengeluaran" name="nama_pengeluaran" placeholder="Masukkan Nama Pengeluaran">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Total Pengeluaran</label>
                        <input type="number" name="total_pengeluaran" id="total_pengeluaran" class="form-control" placeholder="Masukkan Total Pengeluaran">
                    </div>
                    <div class="co col-md-6 form-group">
                        <label for="exampleInputFile">Bukti</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="bukti" name="bukti">
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
                        <label for="Keterangan">Keterangan</label>
                        <div>
                            <textarea id="deskripsi_form" class="form-control" name="keterangan">
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

@section('js')
<script src="{{ url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function() {
        $('#deskripsi_form').summernote()
    })

</script>
@endsection
