@extends('layouts.requestpayment')
@section('event')
    @php
        function convertDateDBtoIndo($string)
        {
            // contoh : 2019-01-30
        
            $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
            $tanggal = explode('-', $string)[2];
            $bulan = explode('-', $string)[1];
            $tahun = explode('-', $string)[0];
        
            return $tanggal . ' ' . $bulanIndo[abs($bulan)] . ' ' . $tahun;
        }
    @endphp

    <div class="dashboard">
        <h2 class="h2-dashboard">Payment</h2>
        <p class="p-dashboard">You can accept or decline payment.</p>
        <table class="table table-bordered">
            <thead class="reservation">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Tiket yang dibeli</th>
                    <th>Email</th>
                    <th>Bukti Pembayaran</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($payments as $payment)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->event_title }}</td>
                        <td>{{ $payment->email }}</td>
                        {{-- untuk stagging --}}
                        {{-- catatan, kalau php storage link error, delete dulu storage di publik dan post-images di storage, lalu
                        php artisan storage:link --}}
                        <td>
                            
                            <img src="{{ asset('storage/' . $payment->image) }}" class="" alt="image" /></td>

                            {{-- versi production --}}
                            {{-- <img src="{{ url("/images/{$payment->image}") }}" class="bukti" alt=" " /> --}}
                        <td>{{ $payment->status }}</td>
                        <td>
                            <div class="row">
                                <div class="col-5">
                                    <form action="/requestpayment/{{ $payment->id }}" method="POST" class="d-inline">
                                        @method('put')
                                        @csrf
                                        <button class="btn btn-success">Accept</button>
                                        {{-- <a href="#" class="accept">Accept<a></a> --}}
                                    </form>

                                </div>
                                <div class="col-7">
                                    <form action="/declinepayment/{{ $payment->id }}" method="POST" class="d-inline">
                                        @method('put')
                                        @csrf
                                        <button class="btn btn-danger">Decline</button>
                                        {{-- <a href="#" class="accept">Accept<a></a> --}}
                                    </form>
                                    {{-- <a href="#" class="delete">Delete<a></a> --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
