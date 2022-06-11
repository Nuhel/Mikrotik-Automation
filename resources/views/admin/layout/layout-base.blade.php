<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        {{ $title ?? 'Mosque' }}
    </title>
    @include('admin.layout.styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
        integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
    <style>
        @media (max-width: 1199.98px) {
            body:not(.g-sidenav-pinned) .sidenav {
                transform: translateX(-17.125rem);
            }
        }


        .select2-container {
            height: 100%;
            display: flex;
        }

        .select2-container .selection {
            width: 100%;
        }

        .select2-container .selection .select2-selection {
            height: 100%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .select2-selection__arrow {
            position: unset !important;
        }

        .select2-selection__arrow b {
            left: unset !important;
        }

        .select2-container--open .select2-dropdown--below,
        .select2-container--open .select2-dropdown--above {
            margin-top: 5px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 13px -3px rgba(0, 0, 0, 0.20);
            padding: 5px;
        }

        .select2-search--dropdown {
            padding: 5px;
        }

        .select2-results__option--selectable {
            margin: 5px;
            color: #7b809a;
            border-radius: 5px;
            transition: all 0.1s ease-in-out 0s;
        }

        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable.select2-results__option--highlighted {
            background-color: #e91e63;
            border-color: #e91e63;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-radius: 5px;
            border: none;
            transition: 0.2s ease;
            background: no-repeat bottom, 50% calc(100%);
            background-size: 0 100%, 100% 100%;
            background-image: linear-gradient(0deg, #e91e63 2px, rgba(156, 39, 176, 0) 0), linear-gradient(0deg, #d2d2d2 1px, rgba(209, 209, 209, 0) 0)
        }

        .select2-container--default .select2-search--dropdown .select2-search__field:focus-visible {

            outline: none;
            background-image: linear-gradient(0deg, #e91e63 2px, rgba(156, 39, 176, 0) 0), linear-gradient(0deg, #d2d2d2 1px, rgba(209, 209, 209, 0) 0);
            background-size: 100% 100%, 100% 100%;
        }

    </style>
    {{-- @livewireStyles --}}
</head>

<body class="bg-gray-200">
    @include('admin.layout.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">

                    <ul class="navbar-nav  justify-content-end">
                        @auth
                            <li class="nav-item d-flex align-items-center">
                                <form action="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0"
                                    method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="btn text-body font-weight-bold px-0 m-0 btn-sm">Logout</button>
                                </form>

                            </li>
                        @endauth

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center d-none">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid pb-4 px-0">
            @yield('section')
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://syed-nuhel.com/" class="font-weight-bold" target="_blank">Syed Nuhel</a>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </main>
    @if (false)
        @include('admin.layout.settings')
    @endif

    @include('admin.layout.scripts')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2();


            $('.js-example-basic-single').one('select2:open', function(e) {
                //console.log()
                $('input.select2-search__field').prop('placeholder', $(this).data('placeholder'));
            });


            $("input[type=datepicker]").datepicker({
                dateFormat: 'dd-mm-yy',
                onSelect: function(dateText, inst) {
                    $(inst).val(dateText); // Write the value in the input
                }
            });
        });
    </script>

    @yield('script')
    {{-- @livewireScripts --}}

</body>

</html>
