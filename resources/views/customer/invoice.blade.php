@extends('layouts.landingpage')

@section('content')
<section class="accomodation_area section_gap">
<div class="container">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>
              <center>
                  Invoice
              </center>
            </h2>
        </div>
      </div>
      <center>
      <img src="{{asset('image/barcode.png')}}" width="300px" class="mb-4" alt="">
        <div class="table-responsive">
            <table class="table-hover">
                <thead>
                    <tr class="text-center">
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>@currency($totalHarga)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('customer.home') }}" class="btn btn-warning mt-2">Back To Home</a>
    </center>

</div>
</section>
@endsection
