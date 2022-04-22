@extends('layouts.landingpage')
@section('content')
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="form-group">
            <div class="card">
                <div class="card-header">
                    Form Pengisian Data Customer
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.dtPribadiPost') }}" method="POST">
                    @csrf
                        <input type="hidden" name="check_in" value="{{ $request->check_in }}">
                        <input type="hidden" name="check_out" value="{{ $request->check_out }}">
                        <input type="hidden" name="jumlah" value="{{ $request->jumlah }}">
                        <input type="hidden" name="id_tipe" value="{{ $request->id_tipe }}">

                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Gender</label>
                            <div class="form-radio ml-2">
                                <input class="form-radio-input" type="radio" name="gender" value="male" id="male">
                                <label class="form-radio-label" for="male">
                                    Laki-laki
                                </label>
                            </div>

                            <div class="form-radio ml-2">
                                <input class="form-radio-input" type="radio" name="gender" value="female" id="female">
                                <label class="form-radio-label" for="female">
                                    Perempuan
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Job</label>
                            <input id="pekerjaan" name="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan" autofocus>

                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tgl_lahir">Birthdate</label>
                            <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir" autofocus>

                            @error('tgl_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-warning float-right">Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
