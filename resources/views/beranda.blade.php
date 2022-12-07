
@extends('template')

@section('beranda')
<div class="container m-5">
    <div class="row">
        <h1><center>CAFEKU<center></h1>
        @foreach ($menu as $dt)
        <div class="col-3 mt-2">
            <div class="card ms-3" style="width: 18rem; height: 200px;">
                <img src="{{ asset('storage/'. $dt->foto) }}" class="card-img-top" alt="">
                <div class="card-body-center">
                    <h5 class="card-title"><center>{{ $dt->namamenu }}</center></h5>
                    <h5 class="card-text"><center>{{ $dt->harga }}</center></h5>
                    <p class="card-text"><center>{{ $dt->keterangan }}</center></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection