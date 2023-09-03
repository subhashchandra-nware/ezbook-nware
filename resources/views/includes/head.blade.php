<!--begin::Head-->
<head><base href="">
    <meta charset="utf-8" />
    <meta name="_token" content="{{ csrf_token() }}">
    <title> @yield('pageTitle') </title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- <link rel="canonical" href="https://keenthemes.com/metronic" /> -->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    {{-- <link href="{{ asset('plugins/custom/select2/select2.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('plugins/custom/select2/select2-bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
    <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet"/>
    <!-- <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/> -->

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <!-- default::JQuery -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script>
        var csrf_token = "{{ csrf_token() }}";
        var csrf_name = "_token";

    </script>

</head>
