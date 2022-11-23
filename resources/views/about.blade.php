@extends('layouts.main') {{-- ini memanggil file main yang di dalam layout --}}
@section('container')
    <div class="container">
        <div class="mt-4" style="text-align:center; padding-bottom: 20px;">
            <div class="col-sm-12">
                <h1 style="color:  #ad8b73;">Meet our team</h1>
            </div>
        </div>
        <div>
            <div style="text-align:center; padding-bottom: 86px;">
                <div class="col-sm-12">
                    <h3 style="color:  #bfbfbf;">We build this project using our care and awareness. We care about the
                        stability of event in indonesia</h3>
                    <h3 style="color:  #bfbfbf;"> Together we can change the future!</h3>
                </div>
            </div>
        </div>
        <div class="container" style="padding-bottom: 100px;">
            <div class="row justify-content-around">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <div class="image">
                            <img src="/source/img/bariz1.png" class="image1">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex flex-column">
                        <div class="p-2">
                            <h2>Roisyal Bariz</h2>
                        </div>
                        <div class="p-2">
                            <p style="color: #bfbfbf;">Project Manager</p>
                        </div>
                        <div class="p-2">
                            <p style="color: black;">He has a responsibility to lead our team. Start with project
                                planning, Project backlog, etc. He makes sure that the flow of our work is going
                                well.</p>
                        </div>
                        <div class="p-2">
                            <a class="btn btn-primary" href="#" role="button">
                                <p class="bi bi-linkedin"> Bariz's Linkedin</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-bottom: 100px;">
            <div class="row justify-content-around flex-row-reverse">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <div class="image ms-auto">
                            <img src="/source/img/galang1.png" class="image1">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex flex-column">
                        <div>
                            <div class="p-2">
                                <h2>Muhammad Galang Satria</h2>
                            </div>
                            <div class="p-2">
                                <p style="color: #bfbfbf;">UI/UX Designer</p>
                            </div>
                            <div class="p-2">
                                <p style="color: black;">Galang made high fidelity design this website. Besides that, he
                                    made the copywriting start from the description, content, etc.</p>
                            </div>
                            <div class="p-2">
                                <a class="btn btn-primary" href="#" role="button">
                                    <p class="bi bi-linkedin"> Galang's Linkedin</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-bottom: 100px;">
            <div class="row justify-content-around">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <div class="image"> <img src="/source/img/anki1.png" class="image1"> </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex flex-column">
                        <div>
                            <div class="p-2">
                                <h2>Anki Prawira Hidayat</h2>
                            </div>
                            <div class="p-2">
                                <p style="color: #bfbfbf;">Front-end & QA Engineer</p>
                            </div>
                            <div class="p-2">
                                <p style="color: black;">Anki is responsible to implement design to the website and also
                                    responsible to test and maintain the quality of CampEvent.</p>
                            </div>
                            <div class="p-2"><a class="btn btn-primary" href="#" role="button">
                                    <p class="bi bi-linkedin"> Anki's Linkedin</p>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-bottom: 100px;">
            <div class="row justify-content-around flex-row-reverse">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <div class="image  ms-auto">
                            <img src="/source/img/alghaz1.png" class="image1">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex flex-column">
                        <div>
                            <div class="p-2">
                                <h2>Mohamad Alghaz Hernanda</h2>
                            </div>
                            <div class="p-2">
                                <p style="color: #bfbfbf;">Back-end Engineer</p>
                            </div>
                            <div class="p-2">
                                <p style="color: black;">Alghaz is responsible to make an algorithm for this website.
                                    Using Laravel for the framework, Almer with Alghaz work together.</p>
                            </div>
                            <div class="p-2"><a class="btn btn-primary" href="#" role="button">
                                    <p class="bi bi-linkedin"> Alghaz's Linkedin</p>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-bottom: 100px;">
            <div class="row justify-content-around">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <div class="image"> <img src="/source/img/almer1.png" class="image1"> </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex flex-column">
                        <div class="p-2">
                            <h2>Prianggara Hadyan Almer</h2>
                        </div>
                        <div class="p-2">
                            <p style="color: #bfbfbf;">Front-end Engineer</p>
                        </div>
                        <div class="p-2">
                            <p style="color: black;">Almer is responsible to make an algorithm for this website.
                                Using Laravel for the framework, Almer with Alghaz work together.</p>
                        </div>
                        <div class="p-2">
                            <a class="btn btn-primary" href="#" role="button">
                                <p class="bi bi-linkedin"> Almer's Linkedin</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
