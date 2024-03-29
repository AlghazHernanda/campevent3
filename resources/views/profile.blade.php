@extends('layouts.profile') {{-- ini memanggil file main yang di dalam layout --}}
@section('container')
    <div class="container">
        <h1 class="h1-header">Profile Setting</h1>
        <hr class="hr">
        <div class="row">
            <div class="col-md-7 col-sm-8">
                <div class="card shadow mb-5" style="background-color: #F3F4F8; border-radius: 20px;">
                    <div class="card-left">
                        <div class="card-body">
                            <h2 class="h2-profile">Personal Information</h2>
                            <form class="card-form" method="post" action="/profile" enctype="multipart/form-data">
                                @method('put')

                                @csrf

                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col">
                                        <div class="rounded mb-3 mb-md-0" style="padding-top: 28px;">
                                            <div class="image">
                                                {{-- <img class="rounded-circle img-preview img-fluid" src="bariz1.png"
                                                    width="120" height="120px"> --}}
                                                <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                                            </div>
                                        </div>
                                        <button class="btn btn-1">
                                            Upload Photo
                                            <input type="hidden" name="oldImage" value="{{ auth()->user()->fullname }}">
                                            <input class="form-control @error('image') is-invalid @enderror"
                                                value="{{ auth()->user()->fullname }}" type="file" id="image"
                                                name="image">
                                        </button>
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <h5 class="h5-pi">*Image files should be .png or .jpg</h5>
                                    </div>
                                </div>

                                <div class="row" style="padding-top: 44px;">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-login">
                                            <label for="#" class="form-label">
                                                <h6 class="h6-form">Full Name</h6>
                                            </label>
                                            <input type="text"
                                                class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                                                name="fullname" placeholder="Enter your full name"
                                                value="{{ auth()->user()->fullname }}">
                                            @error('fullname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-login" style="padding-top: 26px;">
                                            <label for="#" class="form-label">
                                                <h6 class="h6-form">Username</h6>
                                            </label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" id="username"
                                                name="username" placeholder="Enter your username"
                                                value="{{ auth()->user()->username }}">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-login">
                                            <label for="#" class="form-label">
                                                <h6 class="h6-form">University</h6>
                                            </label>
                                            <input type="text"
                                                class="form-control @error('university') is-invalid @enderror"
                                                id="university" name="university" placeholder="Enter your University"
                                                value="{{ auth()->user()->university }}">
                                            @error('university')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-login" style="padding-top: 26px;">
                                            <label for="#" class="form-label">
                                                <h6 class="h6-form">Email</h6>
                                            </label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Enter your username"
                                                value="{{ auth()->user()->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="text-align: center;">
                                        <button type="submit" class="btn btn-3">Save Change</button>
                                    </div>
                                </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-sm-4">
                <div class="card shadow mb-5" style="background-color: #F3F4F8; border-radius: 20px;">
                    <div class="card-right">
                        <div class="card-body">
                            <h2 class="h2-profile">Password Settings</h2>
                            <h4 class="h4-ps">You can change your previous password with your new password</h4>
                            <form action="/change" method="get">
                                <button type="submit" class="btn btn-4">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch("/dashboard/post/checkSlug?title=" + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)

        });

        // untuk mematikan fitur file upload nya trix editor
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })


        //untuk menampilkan image preview
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
