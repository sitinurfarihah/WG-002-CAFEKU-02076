@extends('template')
@section('indexkat')
<div class="container">
    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" id="" name="nama">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection