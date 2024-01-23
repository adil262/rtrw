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
       <h3 class="card-title">Data Table Transaksi Iuran</h3>
       <div class="float-right">
        <a href="{{route('transaksi_iuran.create')}}" type="button" class="btn btn-primary">Tambah</a>
       </div>
   </div>
   <div class="card-body">
   <table id="table_transaksi_iuran" class="table table-bordered table-striped">
           <thead>
               <tr>
                   <th>Warga</th>
                   <th>Iuran</th>
                   <th>Tanggal Iuran</th>
                   <th>Jumlah Iuran</th>
                   <th>Bukti</th>
                   <th>Status</th>
                   <th>Motode Pembayaran</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($transaksi_iuran as $data)
               <tr>
                   <td>{{ $data->nama}}</td>
                   <td>{{ $data->nama_iuran}}</td>
                   <td>{{ $data->tgl_iuran}}</td>
                   <td>{{ $data->jumlah}}</td>
                   <td>
                       <img src="{{url('storage/transaksi_iuran/', $data->bukti)}}" width="100px">
                   </td>
                   <td>{{ $data->status}}</td>
                   <td>{{ $data->metode_pembayaran}}</td>
                   <td>
                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('transaksi_iuran.destroy', $data->id_transaksi_iuran) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                           <a href="{{ route('transaksi_iuran.edit', $data->id_transaksi_iuran) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
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
   $("#table_transaksi_iuran").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_transaksi_iuran_wrapper .col-md-6:eq(0)');
});
</script>
@endsection
