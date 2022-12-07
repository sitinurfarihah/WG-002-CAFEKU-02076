@extends('template')
@section('editkat')
    <div class="container">
        <form action="{{ url('kategori/'. $kategori->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" id="" name="namakategori" value="{{ $kategori->namakategori  }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection