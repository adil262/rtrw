@extends('template/master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="card">
   <div class="card-header">
       <h3 class="card-title">Data Jadwal Ronda</h3>
       <div class ="float-right">
    <a href="{{route('jadwalronda.create')}}" type="submit" class="btn btn-primary">Tambah Data</a>
    </div>
   </div>
   
    <div class="card-body">
       <table id="table_jadwalronda" class="table table-bordered table-striped">
           <thead>
               <tr>
                   <th>Jadwal Ronda</th>
                   <th>Warga</th>
                   <th>Ronda</th>
                   <th>Status</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($jadwalronda as $data)
               <tr>
                   <td>{{ $data->id_jawalronda}}</td>
                   <td>{{ $data->id_warga}}</td>
                   <td>{{ $data->id_ronda}}</td>
                   <td>{{ $data->status}}</td>
                   <td>
                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jadwalronda.destroy', $data->id_jawalronda) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                       
                   &nbsp;
                   <a href="{{ route('jadwalronda.edit', $data->id_jawalronda) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                   </td></form>
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
   $("#table_jadwalronda").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_jadwalronda_wrapper .col-md-6:eq(0)');
});
</script>
@endsection
