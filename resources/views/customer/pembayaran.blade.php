@extends('layouts.landingpage')
@section('title', 'Form Pembayaran')
@section('content')
<section class="accomodation_area section_gap">

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>
              <center>
                  Pembayaran Kamar
              </center>
            </h2>
        </div>
      </div>
        <!-- How to change your own map point
        1. Go to Google Maps
        2. Click on your location point
        3. Click "Share" and choose "Embed map" tab
        4. Copy only URL and paste it within the src="" field below
        -->

        <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Nomor Kamar</th>
                                <th>Tipe Kamar</th>
                                <th>Jumlah Pesanan</th>
                                <th>Harga Permalam</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center table-primary">
                                <td>{{ $nomorKamar }}</td>
                                <td>{{ $dataType->nama }}</td>
                                <td>{{ $jumlahPesanan }}</td>
                                <td>@currency($dataType->harga)</td>
                                <td>@currency($totalHarga)</td>
                            </tr>
                            {{-- <td>{{$data->lili->nama_fasilitas}}</td> --}}
                        </tbody>
                    </table>
                </div>

                <div>
                    <a href="{{ route('customer.invoice') }}" class="btn btn-primary float-right">Pay</a>
                    {{-- <button type="submit" class="btn btn-primary float-right">Pay</button> --}}
                {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
