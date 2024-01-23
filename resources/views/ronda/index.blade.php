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
       <h3 class="card-title">Data Ronda</h3>
       <div class ="float-right">
    <a href="{{route('ronda.create')}}" type="submit" class="btn btn-primary">Tambah Data</a>
    </div>
   </div>
   
   <div class="card-body">
       <table id="table_ronda" class="table table-bordered table-striped">
           <thead>
               <tr>
               <th>Ronda</th>
                   <th>Hari</th>
                   <th>Jam</th>
                   <th>Nama Ronda</th>
                   <th>Tanggal</th>
                   <th>Status</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($ronda as $data)
               <tr>
               <td>{{ $data->id_ronda}}</td>
                   <td>{{ $data->hari}}</td>
                   <td>{{ $data->jam}}</td>
                   <td>{{ $data->nama_ronda}}</td>
                   <td>{{ $data->tanggal}}</td>
                   <td>{{ $data->status}}</td>
                   <td>
                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('ronda.destroy', $data->id_ronda) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                       
                   &nbsp;
                   <a href="{{ route('ronda.edit', $data->id_ronda) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
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
   $("#table_ronda").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_ronda_wrapper .col-md-6:eq(0)');
});
</script>
@endsection
