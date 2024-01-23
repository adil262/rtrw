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
       <h3 class="card-title">Data Usaha Warga</h3>
       <a class="btn btn-primary float-right" href="{{ route('usahawarga.create') }}" role="button">+ Tambah</a><br><br>
   </div>
   <div class="card-body">

   <table id="table_usahawarga" class="table table-bordered table-striped">
           <thead>
               <tr>
                   <th>Warga</th>
                   <th>Judul</th>
                   <th>Deskripsi</th>
                   <th>Foto</th>
                   <th>Nomor HP</th>
                   <th>Status</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($usahawarga as $data)
               <tr>
                   <td>{{ $data->nama}}</td>
                   <td>{{ $data->judul}}</td>
                   <td>{{ $data->deskripsi}}</td>
                   <td><img src="{{url('storage/usahawarga/'. $data->foto)}}" width="100px" alt=""></td>
                   <td>{{ $data->no_hp_usaha}}</td>
                   <td>{{ $data->status}}</td>
                   <td>
                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('usahawarga.destroy', $data->id) }}"
                           method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>

                           <a href="{{ route('usahawarga.edit', $data->id) }}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                       </form>

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
   $("#table_usahawarga").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_usahawarga_wrapper .col-md-6:eq(0)');
});
</script>
@endsection
