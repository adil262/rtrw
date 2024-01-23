@extends('template.master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
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
    @if(session('delete'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            {{session('delete')}}
        </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{session('error')}}
    </div>
@endif
   <div class="card-header">

       <h3 class="card-title">Daftar Arsip RT RW</h3>
   </div>
   <div class="card-body">
       <div class ="float-right">
    <a href="{{route('arsiprtrw.create')}}" type="submit" class="btn btn-primary">Tambah Data</a>
    </div>
       <table id="table_arsip_rtrw" class="table table-bordered table-striped">
           <thead>

               <tr>
                   <th>Nama Arsip</th>
                   <th>Deskripsi</th>
                   <th>Id Rt Rw</th>
                   <th>File Arsip</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($arsiprtrw as $data)
               <tr>
                   <td>{{ $data->nama_arsip}}</td>
                   <td>{{$data->deskripsi}}</td>
                   <td>{{$data->id_rt_rw}}</td>
                   <td><a href="{{ asset('storage/arsip_rtrw/'.$data->file_arsip) }}">Download</a></td>
                   <td>
                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('arsiprtrw.destroy', $data->id) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>

                   &nbsp;
                   <a href="{{ route('arsiprtrw.edit', $data->id) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>  </form>
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
   $("#table_aset_warga").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_arsip_rtrw_wrapper .col-md-6:eq(0)');
});
</script>
@endsection