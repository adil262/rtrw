@extends('template/master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="card">
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
        {{session('success')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif
   <div class="card-header">
       <h3 class="card-title">Data Table Riwayat Iuran</h3>
       <div class="float-right">
        <a href="{{route('riwayat_iuran.create')}}" type="button" class="btn btn-primary">Tambah</a>
       </div>
   </div>
   <div class="card-body">
   <table id="table_riwayat_iuran" class="table table-bordered table-striped">
           <thead>
               <tr>
                   <th>Nama Iuran</th>
                   <th>Periode</th>
                   <th>Jumlah</th>
                   <th>Status Jumlah</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($riwayat_iuran as $data)
               <tr>
                   <td>{{ $data->nama_iuran}}</td>
                   <td>{{ $data->periode}} Hari</td>
                   <td>Rp. {{ $data->jumlah}}</td>
                   <td>{{ $data->status_jumlah}}</td>
                   <td>
                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('riwayat_iuran.destroy', $data->id_iuran) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                           <a href="{{ route('riwayat_iuran.edit', $data->id_iuran) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                       </form>
                   &nbsp;
                   
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
   $("#table_riwayat_iuran").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_riwayat_iuran_wrapper .col-md-6:eq(0)');
});
</script>
@endsection
