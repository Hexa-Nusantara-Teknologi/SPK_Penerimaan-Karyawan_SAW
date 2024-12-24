<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Register</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="nama" id="nama"
                                        class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus />
                                    <label class="form-label" for="nama">Nama</label>
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" />
                                    <label class="form-label" for="email">Email</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password" />
                                    <label class="form-label" for="password">Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="password-confirm" class="form-control form-control-lg"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <label class="form-label" for="password-confirm">Konfirmasi Password</label>
                                </div>



                                <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                                <p class="text-center mt-4 mb-0">Sudah Punya Akun? <a
                                        href="{{ url('login') }}">Login</a>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--
 MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js">
    </script>
</body>

</html>

register