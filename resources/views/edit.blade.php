@extends('layouts.app')

@section('content')
<html>
<head>
	<title>Siswa</title>
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
<div class="container border">
	<h3>Edit Data Siswa</h3>
 
	
	
	<br/>
	<br/>
 
    @foreach($siswa as $p)
	<form action="/siswa/update" method="post">
		{{ csrf_field() }}
        <table class="table table-hover">
        <tr>
            <td>ID</td>
            <td><input type="text" id="disabledInput" name="id"  value="{{ $p->id }}" class="form-control" disabled="">
            <input type="hidden" name="id" value="{{ $p->id }}" class="form-control">
            </td>
        </tr>
        <tr>
            <td>NIS</td>
            <td><input type="text"  name="nis" required="required"  value="{{ $p->nis }}" class="form-control" placeholder="Nis">
            </td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td><input type="text" name="nama_siswa" required="required" value="{{ $p->nama_siswa }}" class="form-control" placeholder="Nama Siswa"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" required="required" value="{{ $p->alamat }}" class="form-control" placeholder="Alamat"></td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td><input type="number" name="no_hp" required="required" value="{{ $p->no_hp }}" class="form-control" pattern="[0-9]" placeholder="No Hp"></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" value="Simpan Data" class="btn btn-success">
            <a href="/siswa" class="btn btn-danger"> Kembali</a></td>
        </tr>
		
	</form>
    @endforeach
</div>
</body>
</html>
@endsection