@extends('layouts.eventdetail')
@section('container')
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
    <div class="header">
        <div>
            <h1 class="h1-header">Event Details</h1>
        </div>
        <hr class="hr">

        <div class="photo">
            <img src="{{ url("/images/{$event->image}") }}" class="ifest" alt=" " />
        </div>

        <div class="techno">
            <div>
                <h2 class="h2-text" style="padding-top: 25px; padding-bottom: 25px;">{{ $event->title }}</h2>
                <div class="row desc">
                    <div class="col-sm">
                        <div class="row text">
                            {{-- @for ($i = 0; $i < 2; $i++)
                                <div class="col status">{{ $event->eventTheme[$i] }}</div>
                            @endfor --}}
                            <div class="col status">{{ $event->eventTheme[1] }}</div>
                            <div class="eventtype">{{ $event->eventTheme[0] }}</div>


                            {{-- <div class="col info">online</div> --}}
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="event">
                                <div class="status-event">{{ $event->eventType }}</div>
                            {{-- <div class="">Free</div> --}}
                        </div>
                    </div>
                    <div class="col-sm">
                        <form action="/eventdetail/{{ $event->id }}" method="post">
                            @csrf
                            <button class="btn btn-love"><i class="bi bi-heart-fill fs-4"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="about">
            <h3>About the event :</h3>
            <h4 class="h4-about">
                {!! $event->desc !!}
            </h4>
            <h3>Date and Time :</h3>
            <p class="bi bi-calendar2-week-fill"> {{ convertDateDBtoIndo($event->date) }}</p>
            {{-- <h3 style="padding-top: 40px;">Place :</h3>
            <p class="bi bi-geo-alt-fill"> Zoom Meeting</p> --}}
            <h3 style="padding-top: 40px;">Speaker :</h3>
            <ul class="speaker">
                <li>{{ $event->speaker }}</li>
                {{-- <li>Hadyan Almer (Founder Freeyork.id)</li>
                <li>Many more</li> --}}
            </ul>

            <!-- Ticket -->
            <div class="row mb-5">
                <center>
                    <div class="col">
                        <div class="card text-center w-50" style="background: #e0ddaa;">
                            <div class="card-body">
                                <h2 class="card-title"><i class="bi bi-ticket-fill"></i> Ticket Price :
                                    Rp{{ format_uang($event->price) }}</h2>

                                <form action="/payment/{{ $event->id }}" method="get">
                                @csrf
                                <button class="btn btn-success mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="font-weight: bold">
                                    Buy Ticket
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </center>
            </div>

            {{-- <div class="ticket">
                <p class="bi bi-ticket-fill"> Ticket Price :</p>
                <h2 class="h2-price">Rp.{{ format_uang($event->price) }}</h2>
                <div class="col-sm-12"> --}}
            <!-- Quantity -->
            {{-- <div class="d-flex">
                        <button class="btn btn-minus"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="bi bi-dash"></i>
                        </button>

                        <div class="form-outline">
                            <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
                        </div>

                        <button class="btn btn-plus"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div> --}}
            {{-- <h6>You can pay with gopay and dana :</h6>
            <h4>{{ $event->no_hp }}</h4>
        </div> --}}

        </div>
    </div>
@endsection
