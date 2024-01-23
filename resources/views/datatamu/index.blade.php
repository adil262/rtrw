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
   <h3 class="card-title">Data Tamu</h3><br>    
   <a href="{{ url('datatamu/create')}}"><button type="submit" class="btn btn-primary">Tambah Data</button></a>
       
   </div>
   <div class="card-body">
       <table id="table_datatamu" class="table table-bordered table-striped">
           <thead>
               <tr>
                   <th>NIK</th>
                   <th>Nama</th>
                   <th>Alamat</th>
                   <th>Jenis Kelamin</th>
                   <th>Tanggal Lahir</th>
                   <th>Tanggal Masuk</th>
                   <th>Tanggal Keluar</th>
                   <th>Keperluan</th>
                   <th>Bukti</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($datatamu as $data)
               <tr>
                   <td>{{ $data->nik}}</td>
                   <td>{{ $data->nama}}</td>
                   <td>{{ $data->alamat}}</td>
                   <td>{{ $data->jk}}</td>
                   <td>{{ $data->tanggal_lahir}}</td>
                   <td>{{ $data->tanggal_masuk}}</td>
                   <td>{{ $data->tanggal_keluar}}</td>
                   <td>{{ $data->keperluan}}</td>
                   <td><img src="{{ asset('storage/datatamu/'.$data->bukti) }}" alt="" {{ $data->bukti }} height="100px"></td>
                   <td>
                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datatamu.destroy', $data->id) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                       
                   &nbsp;
                   <a href="{{ route('datatamu.edit', $data->id) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                   </td>
                   </form>
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
   $("#table_datatamu").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_datatamu_wrapper .col-md-6:eq(0)');
});
</script>
@endsection

