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
<div class="dashboard col container">
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
                    <th>Action</th>
                </tr>
            </thead>
            {{--@foreach ($events as $event)--}}
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Bariz</td>
                    <td>IFEST 2022</td>
                    <td>bariz.racing@gmail.com</td>
                    <td><a href="#">Screenshot-12.jpg</a></td>
                    <td>
                        <div class="action row">
                            <div class="col-sm">
                                <a href="#" class="accept">Accept<a></a>
                            </div>
                            <div class="col-sm">
                                <form action="#" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="delete" onclick="return confirm('are you sure?')"><span data-feather="x-circle">Decline</span></button>
                                </form>
                                {{-- <a href="#" class="delete">Delete<a></a> --}}
                            </div>
                    </td>
                </tr>
            </tbody>
            {{--@endforeach--}}
        </table>

    </div>
</div>
@endsection