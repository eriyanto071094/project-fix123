@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<body>
<center>


<div class="container p-3 my-3 border">

  <h2>Data Siswa</h2>

	<a href="/siswa/tambah"> + Tambah Siswa Baru</a>
	
	<br/>
	<br/>

	<table class="table table-striped table-bordered data">
		<thead>
			<tr class="success">
				<th>ID</th>
				<th>NIS</th>
				<th>Nama Siwa</th>
				<th>Alamat</th>
				<th>No Hp</th>
				<th>Opsi</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach($siswa as $p)
			<tr>
				<td>{{ $p->id }}</td>
				<td>{{ $p->nis }}</td>
				<td>{{ $p->nama_siswa }}</td>
				<td>{{ $p->alamat }}</td>
				<td>{{ $p->no_hp }}</td>
				<td>
					<a href="/siswa/edit/{{ $p->id }}" type="button" class="btn btn-info">Edit</a>
					|
					<a href="/siswa/hapus/{{ $p->id }}" type="button" class="btn btn-danger" onclick="return confirm('Yakin Hapus?')">Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
	</div>
</body>
</html>
@endsection
