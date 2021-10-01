{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('dash') }}/images/favicon.ico">

    <link href="{{ asset('dash') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="{{ asset('dash') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dash') }}/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dash') }}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dash') }}/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="accountbg"></div>

    <!-- Begin page -->
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('/') }}" class="text-white"><i class="mdi mdi-home h1"></i></a>
    </div>

    <div class="wrapper-page">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages shadow-none mt-4">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="#" class="logo logo-admin">
                                   <h3>Renal</h3>
                                </a>
                            </div>

                            <form class="form-horizontal mt-4" id="loginform" method="POST"
                                action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="username">Email</label>
                                        <input class="form-control" type="text" required="" name="email"
                                            placeholder="Enter Email">

                                        <span class="text-danger errors" id="e-email"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" name="password"
                                            placeholder="Password">
                                        <span class="text-danger errors" id="e-password"></span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-primary">
                                            <div class="custom-control custom-checkbox">
                                                <input name="remember" type="checkbox" class="custom-control-input"
                                                    id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1"> Remember
                                                    me</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">Log In</button>
                                    </div>
                                </div>
{{-- 
                                <div class="form-group text-center mt-4">
                                    <div class="col-12">
                                        <div class="float-left">
                                            <a href="pages-recoverpw.html" class="text-muted"><i
                                                    class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                        </div>

                                    </div>
                                </div> --}}



                            </form>

                        </div>

                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

    <!-- jQuery  -->
    <script src="{{ asset('dash') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dash') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dash') }}/js/metismenu.min.js"></script>
    <script src="{{ asset('dash') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('dash') }}/js/waves.min.js"></script>

    <script src="{{ asset('dash') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('dash') }}/js/app.js"></script>
    <script>
        $("#loginform").submit(function(e) {
            e.preventDefault();

            $('.errors').hide();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(r) {
                    window.location.reload();
                },
                error: function(r) {
                    $.each(r.responseJSON.errors, function(i, f) {
                        $("#e-" + i).show();
                        $("#e-" + i).text(f[0]);
                    })
                }
            });
        });
    </script>
</body>

</html>
