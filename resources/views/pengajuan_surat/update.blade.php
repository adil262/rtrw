@extends('template.master')
@section('css')
<link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
@endsection


@section('content')
<div class="col">

    <div class="card card-primary">
        <div class="mt-2 mb-2">
            <a href="{{ route('pengajuan_surat.index') }}" class="btn btn-primary float-left"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="card-header">
            <h3 class="card-title">Tambah Data Pengajuan Surat</h3>
        </div>
        <form action="{{ route('pengajuan_surat.update', $pengajuan_surat->id) }}" method="POST" enctype="multipart/form-data">


            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>keperluan</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" value="{{ $pengajuan_surat->keperluan }}">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $pengajuan_surat->jenis }}">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Dibuat Untuk</label>
                        <input type="text" class="form-control" id="dibuat_untuk" name="dibuat_untuk" value="{{ $pengajuan_surat->dibuat_untuk }}">
                    </div>
                <div class="row">
                    <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Warga</label>
                       <div class="input-group">
                           <select name="id_warga" id="id_warga" class="form-control">
                               <!-- <option value="">-- Status --</option> -->
                               @foreach ($warga as $item)
                                    <option value="{{$item->id_warga}}" class="form-control"
                                    @if($pengajuan_surat->status=="{{$item->id_warga}}")
                                    selected
                                    @endif
                                    >{{$item->nama}}</option>
                                @endforeach
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $pengajuan_surat->status }}">
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Tanggal Keperluan</label>
                        <input type="date" class="form-control" id="tgl_keperluan" name="tgl_keperluan" value="{{ $pengajuan_surat->tgl_keperluan }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label for="exampleInputFile">Keterangan</label>
                        <div class="input-group">
                            <textarea id="deskripsi_form" class="form-control" name="keterangan">
                            {{ $pengajuan_surat->keterangan }}
                            </textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
