<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Boostrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    {{-- Google Font --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

    {{-- my stylse --}}
    <link rel="stylesheet" href="{{ asset('source/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('source/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('source/css/eventdetail.css') }}">

    <title>CampEvent</title>
</head>

<body>

    {{-- manggil navbar di folder partials.navbar --}}
    @include('partials.navbar')

    <div class="container-fluid">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="image"> <img class="vector rounded mx-auto d-block" src="/source/img/Vector.png">
                        </div>
                        <h2 class="h2-modal">
                            1 STEP LEFT!
                        </h2>
                        <h3 class="h3-modal">
                            Fill the form and upload the payment receipt in the payment page
                        </h3>
                    </div>
                    <div class="modal-footer align-self-center">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <a href="/payment">
                            <button type="button" class="btn"
                                style="background: #F7CC74; color:#fff; font-weight:bold">Go to Payment
                                Page</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @yield('container') {{-- jadi ini nanti isinya halaman-halaman lain, biar pake boostrap nya 1 aja --}}

    </div>

    {{-- manggil footer di folder partials.footer --}}
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
