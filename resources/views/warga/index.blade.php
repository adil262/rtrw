@extends('template/master')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" bhref="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{session('error')}}
    </div>
@endif
    <div class="card-header">
        <h3 class="card-title">Daftar Aset Warga</h3>
        <div class ="float-right">
          <a href="{{route('wargas.create')}}" type="submit" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
   <div class="card-body table-responsive-sm">
       <table id="table_berita" class="table table-bordered table-striped">
           <thead>
               <tr>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Kelurahan</th>
                    <th>Pekerjaan</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($warga as $data)
                <tr>
                    <td>{{ $data->nama}}</td>
                    <td>{{ $data->nik}}</td>
                    <td>{{ $data->tanggal_lahir}}</td>
                    <td>{{ $data->jenis_kelamin}}</td>
                    <td>{{ $data->agama}}</td>
                    <td>
                        @if ($data->status== "Aktif")
                            <span class="p-2 rounded bg-success">Aktif</span>
                        @elseif($data->status == "Pindah")
                            <span class="p-2 rounded bg-warning">Pindah</span>
                        @else
                            <span class="p-2 rounded bg-danger">Meninggal</span>
                        @endif        
                    </td>
                    <td>{{ $data->kelurahan}}</td>
                    <td>{{ $data->pekerjaan}}</td>
                    <td>{{ $data->role}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('wargas.destroy', $data->id_warga) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    
                    <a href="{{ route('wargas.edit', $data->id_warga) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>
 @endsection

 @section('js')
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
       $("#table_berita").DataTable({
           "responsive": true,
           "lengthChange": false,
           "autoWidth": false,
           "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
       }).buttons().container().appendTo('#table_berita_wrapper .col-md-6:eq(0)');
    });
    </script>
@endsection
