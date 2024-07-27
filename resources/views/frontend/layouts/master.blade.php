<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bet</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('frontend.layouts.includes.css')

</head>

<body>

    <!-- ======= Header ======= -->
    @include('frontend.layouts.includes.header')
    <!-- End Header -->

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('frontend.layouts.includes.footer')

    {{-- <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}

    @include('admin.include.script')
    @include('sweetalert::alert')

    @include('frontend.layouts.includes.script')

</body>

</html>
