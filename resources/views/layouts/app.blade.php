<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta charset="utf-8" />  
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('assets-dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-dashboard/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.form.io/formiojs/formio.full.min.css">
<script src="https://cdn.form.io/formiojs/formio.full.min.js"></script>

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets-dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    @vite('resources/css/app.css')

</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="app-blank app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        @yield('content')
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    @vite('resources/js/app.js')
    <script type="text/javascript">
  window.onload = function() {
    Formio.createForm(document.getElementById('formio'), 'https://vbhpcbywdjdtqwe.form.io/applicationtesting');
  };
</script>
    <script> var hostUrl = "assets-dashboard/"; </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets-dashboard/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets-dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('assets-dashboard/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets-dashboard/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom/apps/user-management/users/list/add.js') }}"></script>

    <script src="{{ asset('assets-dashboard/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>