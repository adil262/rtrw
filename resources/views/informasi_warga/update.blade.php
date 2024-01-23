@extends('template.master')
@section('css')
<link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
@endsection


@section('content')
<div class="col">

    <div class="card card-primary">
        <div class="mt-2 mb-2">
            <a href="{{ route('informasi_warga.index') }}" class="btn btn-primary float-left"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="card-header">
            <h3 class="card-title">Tambah Data Informasi</h3>
        </div>
        <form action="{{ route('informasi_warga.update', $informasi_warga->id) }}" method="POST" enctype="multipart/form-data">


            @csrf
            @method("PUT")
            <div class="card-body">
            <div class="row">
                    <div class="col col-md-12 form-group">
                    <label for="exampleInputFile">Warga</label>
                       <div class="input-group">
                           <select name="id_warga" id="id_warga" class="form-control">
                               <!-- <option value="">-- Status --</option> -->
                               @foreach ($warga as $item)
                                    <option value="{{$item->id_warga}}" class="form-control"
                                    @if($informasi_warga->status=="{{$item->id_warga}}")
                                    selected
                                    @endif
                                    >{{$item->nama}}</option>
                                @endforeach
                            </select>
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 form-group">
                    <label for="exampleInputFile">Jenis</label>
                    <div class="input-group">
                        <select id="jenis" name="jenis" class="form-control">
                            <option value="{{$informasi_warga->jenis}}">{{$informasi_warga->jenis}}</option>
                            <option value="miskin">Miskin</option>
                            <option value="anak yatim">Anak Yatim</option>
                            <option value="sakit">Sakit</option>
                            <option value="musibah">Musibah</option>
                        </select>
                    </div>
                </div>
                    <div class="col col-md-6 form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $informasi_warga->deskripsi }}">
                    </div>
                </div>
                <div class="row">
                    <div class="co col-md-6 form-group">
                        <label for="exampleInputFile">Gambar Informasi</label>
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
