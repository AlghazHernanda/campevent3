@extends('layouts.payment')
@section('payment')
<div class="payment">
    <div class="tatacara h-75 w-100">
        <div class="peserta">
            <h1 class="text-beige m-0 pt-5 text-center">Tata Cara Pembayaran</h1>
            <p class="pt-5">Hallo Peserta!</p>
            <p class="pt-2">Selamat Datang di pembayaran tiket seminar CampEvent . Berikut tata cara pembayaran tiket seminar :</p>
            <p class="pt-2">1. Isi data diri yang tertera pada form di bawah ini</p>
            <p class="pt-2">2. Upload bukti pembayaran berupa screenshoot gambar bukti transfer atau bukti pembayaran lainnya</p>
            <p class="pt-2">3. Tekan tombol submit untuk pengecekan oleh tim admin</p>
            <p class="pt-2">4. Tunggu tiket dikirim pada email kalian</p>
            <p class="pt-2 pb-5">5. Happy join the event!</p>
        </div>
    </div>
    <div class="pembayaran">
        <form action="/payment" method="post" class="card-form pt-5" enctype="multipart/form-data">
            @csrf
            <div class="form-login mb-4">
                <label for="#" class="form-label">
                    <h6 class="h6-form">1. Nama Lengkap</h6>
                </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                name="name" id="name"  placeholder="Masukkan nama lengkap">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-login mb-4">
                <label for="#" class="form-label">
                    <h6 class="h6-form">2. Tiket Event yang dibeli</h6>
                </label>
                <input type="text" class="form-control @error('event_title') is-invalid @enderror"
                name="event_title" id="event_title" placeholder="Contoh : IFEST 2022">
                @error('event_title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-login mb-4">
                <label for="#" class="form-label">
                    <h6 class="h6-form">3. Email</h6>
                </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" id="email" placeholder="Masukkan Email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                
            </div>
            <div class="mb-4">
                <h6 class="h6-form">Rekening Pembayaran:</h6>
                <p class="rekening">4123778583775834 a.n PT. Campevent (Mandiri)</p>
            </div>
            <div class="mb-4">
                <label for="#" class="form-label">
                    <h6 class="h6-form">4. Upload bukti pembayaran</h6>
                </label>
                <br>
                <input class="form-control @error('image') is-invalid @enderror" type="file"
                id="image" name="image">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-4 text-center col mb-5">
                <button class="btn btn-1 tombol rounded"  data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
            </div>
    </div>
</div>
</form>
@endsection