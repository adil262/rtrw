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
         <a href="{{route('aset_warga.create')}}" type="submit" class="btn btn-primary">Tambah Data</a>
       </div>
   </div>
   <div class="card-body">

       <table id="table_aset_warga" class="table table-bordered table-striped">
           <thead>

               <tr>
                   <th>Nama Aset</th>
                   <th>Jumlah</th>
                   <th>Foto</th>
                   <th>Peminjaman</th>
                   <th>Status</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($aset_warga as $data)
               <tr>
                   <td>{{ $data->nama_aset}}</td>
                   <td>{{ $data->jumlah}}</td>
                   <td><img src="{{url('storage/aset_warga/'.$data->foto)}}" width="100px"></td>
                   <td>{{ $data->id_peminjaman}}</td>
                   <td>{{ $data->status}}</td>
                   <td>
                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('aset_warga.destroy', $data->id) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>

                   &nbsp;
                   <a href="{{ route('aset_warga.edit', $data->id) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>  </form>
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
   }).buttons().container().appendTo('#table_aset_warga_wrapper .col-md-6:eq(0)');
});
</script>
@endsection

