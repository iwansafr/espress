@extends('dashboard.main')
@section('content')
    <form action="" method="post">
      <div class="card card-panel">
        <div class="card-header">
          Tambah Kategori
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
      @csrf
    </form>
@endsection