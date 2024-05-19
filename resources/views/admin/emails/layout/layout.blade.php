<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ config('app.name', '') }}</title>

    <meta name="description" content="{{ config('app.name', '') }}">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('/css/oneui.css') }}">
    <link rel="stylesheet" href="{{asset('/js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/js/plugins/simplemde/simplemde.min.css')}}">
    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/amethyst.css') }}"> -->
@yield('css_after')

<!-- Scripts -->

</head>
<body>

<style type="text/css">
    @media screen and (max-width:767px) {
        .store-logos{
            width: 80% !important;
        }

        .main-logo{
            width: 80% !important;
        }
    }

    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
        .wrapper {
            padding: 50px 20px 40px 20px !important;
            overflow: hidden;
            display: grid;
            justify-content: center;
        }
    }

    /*@media only screen and (max-width: 500px) {*/
    /*    .button {*/
    /*        width: 100% !important;*/
    /*    }*/
    /*}*/
</style>

@stack('media_query')

<style type="text/css">

    .body {
        background-color: transparent !important;
        border: none !important;
    }

    .wrapper {
        padding: 40px !important;
    }

    .content-cell {
        justify-content: center;
        display: grid;
        overflow: hidden;
    }

    .header {
        padding: 0 !important;
    }

    .header-table {
        background-color: #ffffff !important;
    }

    .table-row {
        padding: 0 !important;
        border: none !important;
        text-align: center;
    }

    .footer-signature h3 {
        font-family: Roboto, serif;
        font-size: 18px;
        font-weight: 700;
        line-height: 21px;
        text-align: center;
        color: #212121;
    }

    .footer-signature-content {
        font-family: Roboto, serif !important;
        font-size: 16px !important;
        font-weight: 400 !important;
        line-height: 19px !important;
        text-align: center !important;
        color: #404040 !important;
    }

    .content-footer-content{
        padding: 0 35px !important;
    }

    .email-footer-logos{
        padding-bottom: 0 !important;
        padding-top: 0 !important;
    }

    .email-footer-container{
        display: flex!important;
        justify-content: space-around;
    }

</style>

@stack('style')

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                               role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    @yield('content')
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


            </table>
        </td>
    </tr>
</table>

<!-- OneUI Core JS -->
<script src="{{ asset('js/oneui.app.js') }}"></script>
<!-- Page JS Plugins -->
<script src="{{asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>
<!-- Page JS Helpers (BS Notify Plugin) -->
<script>jQuery(function(){One.helpers(['notify', 'select2', 'simplemde']);});</script>

<!-- Laravel Scaffolding JS -->
<!-- <script src="{{ asset('/js/laravel.app.js') }}"></script> -->
</body>
</html>
