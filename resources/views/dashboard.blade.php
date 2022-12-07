@extends('template')

@section('dashboard')
    <div class="container-fluid m-5">
        <div class="container text">
            <div class="row">
              <div class="col-sm-5 col-md-6">
                  <form action="{{ route('dashboard.store') }}" method="post">
                    @csrf
                  <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" class="form-control" id="" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesanan</label>
                      <input type="text" class="form-control" id="" name="pesanan">
                      <label for="keterangan">Pisahkan posanan anda dengan tanda koma (,)</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="member">member</option>
                            <option value="non-member">non-member</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Keterangan</th>
                          </tr>
                        </thead>
                        @isset($data)
                        <tbody>
                            <tr>
                              <th>Nama</th>
                              <td>{{ $data['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Pesanan</th>
                                <td>{{ $data['jumlahpesanan'] }}</td>
                            </tr>
                            <tr>
                                <th>Total Pesanan</th>
                                <td>{{ $data['totalpesanan'] }}</td>
                              </tr>
                              <tr>
                                <th>Status</th>
                                <td>{{ $data['status'] }}</td>
                              </tr>
                              <tr>
                                <th>Diskon</th>
                                <td>{{ $data['diskon'] }}</td>
                              </tr>
                              <tr>
                                <th>Total Pembayaran</th>
                                <td>{{ $data['totalpembayaran'] }}</td>
                              </tr>                  
                            </tbody>
                            @endisset
                      </table>
                    </div>

                        </div>
                    </div>
                </div>
                </div>
            
        </div>

    </div>
@endsection