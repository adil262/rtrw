@extends('template/master')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" bhref="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<br>
<div class="card">
   <div class="card-header">
       <h3 class="card-title">Data Posyandu</h3>
       @if (Session::has('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="float-right">
                <a href="{{ route('posyandu.create') }}" class="btn btn-primary float-right"> <i
                        class="fa fa-plus"></i>Tambah Data</a>
            </div>
   </div>
   <div class="card-body">
       <table id="table_posyandu" class="table table-bordered table-striped">
           <thead>
           <tr>
                    <th>Lokasi</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               @foreach($posyandu as $data)
               <tr>
                   <td>{{ $data->lokasi}}</td>
                   <td>{{ $data->lat}}</td>
                   <td>{{ $data->long}}</td>
                   <td>{{ $data->deskripsi}}</td>
                   <td><img src="{{ url('storage/posyandu/' .$data->foto) }}" width="100px"></td>
                   <td>
                   <form onSubmit="return confirm('apakah anda yakin ?');" action= "{{ route('posyandu.destroy', $data->id_posyandu) }}" method="POST">
                       @csrf
                       @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                            </button>
                                    &nbsp; 
                        <a href="{{ route('posyandu.edit', $data->id_posyandu) }}" class="btn btn-outline-warning">
                                        <i class="fa fa-edit"></i> </a>    
                    </td>
               </tr>
            </form>
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
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script><script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
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
   $("#table_posyandu").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   }).buttons().container().appendTo('#table_posyandu_wrapper .col-md-6:eq(0)');
});
</script>
@endsection


