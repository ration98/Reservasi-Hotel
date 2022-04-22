@extends('layouts.landingpage')
@section('title','Detail Kamar')
@section('content')
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('foto/'. $data->foto) }}" width="600px" class="d-block" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            Detail Kamar
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">{{'Tipe Kamar : ' . ' ' . $data->nama}}</h6>
                            <h6 class="card-subtitle mb-2">{{'Fasilitas Kamar : ' . ' ' . $data->fasilitas}}</h6>
                            <h6 class="card-subtitle mb-2">{{'Kapasitas Kasur : ' . '2' }}</h6>
                            <h6 class="card-subtitle mb-2">{{'Harga Permalam : Rp. ' . ' ' . $data->harga}}</h6>
                            <h6 class="card-subtitle mb-2">{{'Kamar Tersedia : ' . ' ' . $jumlahPesanan}}</h6>
                            <h6 class="card-subtitle mb-2">{{'Keterangan Tipe Kamar : ' . ' ' }} <br>
                                <p class="ml-3">{{ $data->informasi }}</p></h6>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="card mt-3">
                        <div class="card-header">
                            Form Booking
                        </div>
                        <div class="card-body">
                            @auth
                            @if ($jumlahPesanan == 0)
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Pesanan</label>
                                    <input type="text" class="form-control" disabled value="Full Book">
                                </div>
                            @else
                                <form action="{{ route('customer.book.now') }}" method="post">
                                    @csrf
                                        <input type="hidden" name="id_tipe" value="{{ $data->id }}">

                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Pesanan</label>
                                            <input type="number" class="form-control" {{ $jumlahPesanan == 0 ? 'disabled' : ''  }} value="{{ $jumlahPesanan == 0 ? '0' : '1'  }}" min="1" max="{{ $jumlahPesanan }}" required name="jumlah" id="jumlah">
                                        </div>
                                        <div class="form-group">
                                            <label for="check_in">Check In</label>
                                            <input type="date" min='<?= date('Y-m-d'); ?>' class="form-control" value="{{old('check_in')}}" onchange="checkout()" required name="check_in" id="check_in">
                                        </div>
                                        <div class="form-group">
                                            <label for="check_out">Check Out</label>
                                            <input type="date" min='<?= date('Y-m-d', strtotime('+1 day')); ?>' class="form-control" value="{{old('check_out')}}" required name="check_out" id="check_out">
                                        </div>

                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-warning float-right">Book Now</button>
                                        </div>
                                </form>
                            @endif
                            @else
                            <center>

                                <a href="{{ route('login') }}" class="btn btn-warning">Login First</a>
                            </center>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    function checkout(){
        var checkin = new Date($('#check_in').val());
        var dd = checkin.getDate()+1;
        var mm = checkin.getMonth()+1;
        var yyyy = checkin.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(dd==32){
            dd='01'
            mm+=1
        }
        if(mm<10){
        mm='0'+mm

        today = yyyy+'-'+mm+'-'+dd;
        console.log(today);
        document.getElementById("check_out").setAttribute("min", today);
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    }
}

@endsection
