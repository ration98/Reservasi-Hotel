@extends('layouts.landingpage')

@section('content')
<section class="accomodation_area section_gap">

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>
              <center>
                  Daftar Transaksi
              </center>
            </h2>
        </div>
      </div>
      <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Nama Pemesan</th>
                                <th>Nomor Kamar</th>
                                <th>Type Kamar</th>
                                <th>Jumlah Pesanan</th>
                                <th>Harga Permalam</th>
                                <th>Total Harga</th>
                                <th>Status Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($datas == '[]')
                                <tr class="text-center table-primary">
                                    <td colspan="7">Tidak ada transaksi</td>

                                </tr>
                            @else

                                @foreach ($datas as $item)

                                    <tr class="text-center table-primary">
                                        <td>{{ $item->customer->nama }}</td>
                                        <td></td>
                                        <td>{{ $item->room->roomType->nama }}</td>
                                        <td>{{ $item->many_room }}</td>
                                        <td>@currency($item->room->roomType->harga)</td>
                                        <td>@currency($item->payment->harga)</td>
                                        <td>{{ $item->status }}</td>
                                        <td> @if ($item->status == 'canceled')
                                            Transaction Canceled
                                        @elseif ($item->status == 'process')
                                            Transaction on Process
                                        @elseif ($item->status == 'verified')
                                            <a href="{{ route('customer.transaction.proof', $item->id) }}" class="btn btn-sm btn-success">Print Proof</a>
                                        @elseif ($item->status == 'failed')
                                            Transaction Failed
                                        @elseif($item->status == 'checked in')
                                            Checked In on {{ $item->updated_at }}
                                        @elseif($item->status == 'checked out')
                                            Checked Out on {{ $item->updated_at }}
                                        @else
                                            <div class="btn-group">
                                                <a href="{{ route('customer.transaction.cancel', $item->id) }}" onclick="return confirm('Yakin ingin membatalkan transaksi ini?')" class="btn btn-sm btn-danger">Cancel</a>
                                            </div>
                                        @endif</td>
                                    </tr>

                                @endforeach
                            @endif]
                        </tbody>
                    </table>
                </div>
                <div>
                    <a href="{{ route('cutomer.home') }}" class="btn btn-md btn-warning float-right mx-2">Back To Home</a>
                    <a href="{{ route('customer.invoice') }}" class="btn btn-md btn-primary float-right">Pay Now</a>
                </div>
            </div>
    </div>
  </div>
  </div>
</section>
@endsection
