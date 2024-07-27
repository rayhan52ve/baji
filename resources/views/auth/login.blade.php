{{-- <div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Register') }}</div>

               <div class="card-body">
                   <form method="POST" action="{{ route('register') }}">
                       @csrf

                       <div class="row mb-3">
                           <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                           <div class="col-md-6">
                               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                               @error('name')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="row mb-3">
                           <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                           <div class="col-md-6">
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                               @error('email')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="row mb-3">
                           <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                               @error('password')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="row mb-3">
                           <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                           <div class="col-md-6">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           </div>
                       </div>

                       <div class="row mb-0">
                           <div class="col-md-6 offset-md-4">
                               <button type="submit" class="btn btn-primary">
                                   {{ __('Register') }}
                               </button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div> --}}

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
{{-- @include('admin.include.script') --}}
@include('sweetalert::alert')

<style>
    @import url("https://fonts.googleapis.com/css?family=Raleway:400,700");

    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    .body {
        min-height: 100vh;
        font-family: "Raleway", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(158, 90, 204);
        margin: 0;
    }

    .card {
        width: 800px;
        height: 450px;
        position: relative;
        overflow: hidden;
    }

    .container {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .container:hover .top:before,
    .container:hover .top:after,
    .container:hover .bottom:before,
    .container:hover .bottom:after,
    .container:active .top:before,
    .container:active .top:after,
    .container:active .bottom:before,
    .container:active .bottom:after {
        margin-left: 200px;
        transform-origin: -200px 50%;
        transition-delay: 0s;
    }

    .container:hover .center,
    .container:active .center {
        opacity: 1;
        transition-delay: 0.2s;
    }

    .top:before,
    .top:after,
    .bottom:before,
    .bottom:after {
        content: "";
        display: block;
        position: absolute;
        width: 200vmax;
        height: 200vmax;
        top: 50%;
        left: 50%;
        margin-top: -100vmax;
        transform-origin: 0 50%;
        transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
        z-index: 10;
        opacity: 0.65;
        transition-delay: 0.2s;
    }

    .top:before {
        transform: rotate(45deg);
        background: #e46569;
    }

    .top:after {
        transform: rotate(135deg);
        background: #ecaf81;
    }

    .bottom:before {
        transform: rotate(-45deg);
        background: #60b8d4;
    }

    .bottom:after {
        transform: rotate(-135deg);
        background: #3745b5;
    }

    .center {
        position: absolute;
        width: 400px;
        height: 400px;
        top: 50%;
        left: 50%;
        margin-left: -200px;
        margin-top: -200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 30px;
        opacity: 0;
        transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
        transition-delay: 0s;
        color: #333;
    }

    .center input {
        width: 100%;
        padding: 15px;
        margin: 5px;
        border-radius: 1px;
        border: 1px solid #ccc;
        font-family: inherit;
    }
</style>
<div class="body">
    <div class="card" style="background-color: rgb(16, 105, 51)">
        <div class="card-header">

        </div>
        <div class="container" onclick="onclick">
            <div class="top"></div>
            <div class="bottom"></div>
            <div class="center">
                <h2>Please Sign In</h2>
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input id="identifier" name="identifier" type="text"
                                    placeholder="Username Or Phone Number" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input id="password" name="password" placeholder="Password" type="password">
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="checkbox style3">
                                <input type="checkbox" id="test_1">
                                <label for="test_1">
                                    Remember Me</a>
                                </label>
                            </div>
                        </div> --}}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end mb-20">
                            <a href="" class="link style1">Forgot Password?</a>
                        </div>
                        <input type="hidden" name="hr_login" value="1">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-success style1 w-100 d-block">
                                    Login Now
                                </button>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                           <p class="mb-0">Don't have an Account? <a class="link style1" href="{{route('register')}}">Create One</a></p>
                        </div> --}}
                    </div>
                </form>

                {{-- <input type="email" placeholder="email" />
                <input type="password" placeholder="password" /> --}}
                <h2>&nbsp;</h2>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</body>

</html>
