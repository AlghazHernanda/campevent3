@extends('layouts.listevent') {{-- ini memanggil file main yang di dalam layout --}}
@section('listevent')
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
    <div id="section1">
        <div class="col-sm-12">
            <div class="searchbox">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-outline1">
                            <i class="bi bi-search fs-5"></i>
                            <form action="/listevent">
                                <input type="search" id="#" class="form-control1" name="search"
                                    value="{{ request('search') }}" placeholder="Search your favorite event"
                                    aria-label="Search" />
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-outline2">
                            <i class="bi bi-geo-alt fs-5"></i>
                            <input type="search" id="#" class="form-control2" placeholder="Event location"
                                aria-label="Search" />
                        </div>
                    </div>
                    <div class="col-sm">
                        <button class="btn btn-1" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-sm">
                        <a href="/RegisterEvent"><button class="btn btn-2">Register your event</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="section2">
        <div class="row">
            <div class="col-sm-3">
                <div class="filter">
                    <!-- 1 -->
                    {{-- <h4 style="padding-bottom: 30px;">Events</h4>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Talkshow</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Seminar</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Bootcamp</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Training</p>
                    </div> --}}
                    <!-- 1 -->
                    <!-- 2 -->
                    <h4 style="padding-bottom: 30px; padding-top: 4px;">Theme</h4>

                    @foreach ($eventTypes as $eventType)
                        <div class="form-check">
                            {{-- <input type="checkbox"  class="form-check-input" id="#" name="eventType" /> --}}
                            <p><a href="/listevent/{{ $eventType->id }}"><button class="btn btn-info"></button></a>
                                {{ $eventType->name }}</p>
                        </div>
                    @endforeach
                    {{-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Sport</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Social</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Health</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Music</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Finance</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Fashion</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Education</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Business</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Art</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Lifestyle</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Other</p>
                    </div> --}}
                    <!-- 2 -->
                    <!-- 3 -->
                    {{-- <h4 style="padding-bottom: 30px; padding-top: 40px;">Method</h4>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Offline</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Online</p>
                    </div>
                    <!-- 3 -->
                    <!-- 4 -->
                    <h4 style="padding-bottom: 30px; padding-top: 40px;">Payment type</h4>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Paid</p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="#" name="#" />
                        <p>Free</p>
                    </div> --}}
                    <!-- 4 -->
                </div>
            </div>

            <div class="col-sm-9">
                <div class="head">
                    <div class="row" style="padding-bottom: 42px;">
                        <div class="col-sm-8">
                            <h2 class="h2-head">Show {{ $events->count() }} Events</h2>
                        </div>
                        {{-- <div class="col-sm-4">
                            <div class="drop-event">
                                <i class="bi bi-sort-down fs-2"></i>
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><label class="checkbox"><input type="checkbox"> <i
                                                class="bi bi-sort-alpha-down"></i></label></li>
                                    <li><label class="checkbox"><input type="checkbox"> <i
                                                class="bi bi-sort-alpha-down-alt"></i></label></li>
                                    <li><label class="checkbox"><input type="checkbox"> Last Updated</label></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="body">

                    <div class="row" style="padding-bottom: 40px;">
                        @foreach ($events as $event)
                            @if ($event->status === 'accepted')
                                <div class="col">
                                    <div class="card">
                                        <div class="photo">
                                            <img src="{{ url("/images/{$event->image}") }}" class="" alt="image" />
                                            <div class="row text-card">
                                                @for ($i = 0; $i < 2; $i++)
                                                    <div class="col status-card">{{ $event->eventTheme[$i] }}</div>
                                                    {{-- <div class="col status-card">{{ $event->eventTheme[1]}}</div> --}}
                                                @endfor
                                                {{-- <div class="col status-card">Paid</div>
                                                <div class="col info-card">online</div> --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p class="bi bi-calendar-date"> {{ convertDateDBtoIndo($event->date) }}
                                                    </p>
                                                </div>
                                                <div class="col-sm">
                                                    <p class="bi bi-person-circle">{{ $event->author->fullname }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <a href="/eventdetail/{{ $event->id }}"><button class="btn btn-card">See
                                                        Details</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="col">
                        <div class="card">
                        <div class="photo">
                            <img src="ifest.png" class="ifest" alt=" "/>
                            <div class="row text-card">
                            <div class="col status-card">Paid</div>
                            <div class="col info-card">online</div>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                <p class="bi bi-calendar-date"> 29 Oct 2021 </p>
                                </div>
                                <div class="col-sm">
                                <p class="bi bi-person-circle"> Roisyal </p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a href="#"><button class="btn btn-card">See Details</button></a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                        <div class="photo">
                            <img src="ifest.png" class="ifest" alt=" "/>
                            <div class="row text-card">
                            <div class="col status-card">Paid</div>
                            <div class="col info-card">online</div>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                <p class="bi bi-calendar-date"> 29 Oct 2021 </p>
                                </div>
                                <div class="col-sm">
                                <p class="bi bi-person-circle"> Roisyal </p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a href="#"><button class="btn btn-card">See Details</button></a>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" style="padding-bottom: 40px;">
                    <div class="col">
                        <div class="card">
                        <div class="photo">
                            <img src="ifest.png" class="ifest" alt=" "/>
                            <div class="row text-card">
                            <div class="col status-card">Paid</div>
                            <div class="col info-card">online</div>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                <p class="bi bi-calendar-date"> 29 Oct 2021 </p>
                                </div>
                                <div class="col-sm">
                                <p class="bi bi-person-circle"> Roisyal </p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a href="#"><button class="btn btn-card">See Details</button></a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                        <div class="photo">
                            <img src="ifest.png" class="ifest" alt=" "/>
                            <div class="row text-card">
                            <div class="col status-card">Paid</div>
                            <div class="col info-card">online</div>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                <p class="bi bi-calendar-date"> 29 Oct 2021 </p>
                                </div>
                                <div class="col-sm">
                                <p class="bi bi-person-circle"> Roisyal </p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a href="#"><button class="btn btn-card">See Details</button></a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                        <div class="photo">
                            <img src="ifest.png" class="ifest" alt=" "/>
                            <div class="row text-card">
                            <div class="col status-card">Paid</div>
                            <div class="col info-card">online</div>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                <p class="bi bi-calendar-date"> 29 Oct 2021 </p>
                                </div>
                                <div class="col-sm">
                                <p class="bi bi-person-circle"> Roisyal </p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a href="#"><button class="btn btn-card">See Details</button></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-bottom: 40px;">
                    <div class="col">
                        <div class="card">
                        <div class="photo">
                            <img src="ifest.png" class="ifest" alt=" "/>
                            <div class="row text-card">
                            <div class="col status-card">Paid</div>
                            <div class="col info-card">online</div>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                <p class="bi bi-calendar-date"> 29 Oct 2021 </p>
                                </div>
                                <div class="col-sm">
                                <p class="bi bi-person-circle"> Roisyal </p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a href="#"><button class="btn btn-card">See Details</button></a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                        <div class="photo">
                            <img src="ifest.png" class="ifest" alt=" "/>
                            <div class="row text-card">
                            <div class="col status-card">Paid</div>
                            <div class="col info-card">online</div>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                <p class="bi bi-calendar-date"> 29 Oct 2021 </p>
                                </div>
                                <div class="col-sm">
                                <p class="bi bi-person-circle"> Roisyal </p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a href="#"><button class="btn btn-card">See Details</button></a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                        <div class="photo">
                            <img src="ifest.png" class="ifest" alt=" "/>
                            <div class="row text-card">
                            <div class="col status-card">Paid</div>
                            <div class="col info-card">online</div>
                            </div>
                        </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                <p class="bi bi-calendar-date"> 29 Oct 2021 </p>
                                </div>
                                <div class="col-sm">
                                <p class="bi bi-person-circle"> Roisyal </p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a href="#"><button class="btn btn-card">See Details</button></a>
                            </div>
                            </div>
                        </div>
                    </div> --}}
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- <div class="col-sm-12">
                    <a href="#"><button class="btn btn-3">Load more events</button></a>

                </div> --}}

                <div class="center" style="padding-top: 63px; padding-bottom: 64px;">
                    <div class="pagination">
                        {{ $events->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
