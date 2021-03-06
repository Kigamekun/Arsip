<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('assets/img/download.png') }}">
    <title>
        ARSIP KECAMATAN
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ url('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('assets/css/argon-dashboard.css?v=2.0.3') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    @yield('css')
</head>

<body class="g-sidenav-show   bg-gray-100">
    <style>
        .table-responsive {
            padding: 20px;
        }
    </style>

    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
                target="_blank">
                <img src="{{ url('assets/img/download.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Arsip Kecamatan </span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                        </div>
                        <span class="nav-link-text ms-1">Beranda </span>
                    </a>
                </li>
                @if (Auth::user()->role == 0)

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.surat_masuk.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                        </div>
                        <span class="nav-link-text ms-1">Surat Masuk </span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.surat_keluar.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                        </div>
                        <span class="nav-link-text ms-1">Surat Keluar </span>
                    </a>
                </li>
                @else

                @endif

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <center> <button class="btn btn-danger" type="submit">LOGOUT</button></center>
                    </form>
                </li>

            </ul>
        </div>

    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;"></a></li>
                    </ol>
                    <br>
                    <h2 class="font-weight-bolder text-white mb-0">Arsip Surat Kecamatan Bogor Selatan</h2>
                   
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            
                            
                        </div>
                    </div>

                </div>
            </div>
        </nav>

        <!-- End Navbar -->
        @yield('content')
    </main>


    <!--   Core JS Files   -->
    <script src="{{ url('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('assets/js/argon-dashboard.min.js?v=2.0.3') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $('#detailData').on('shown.bs.modal', function(e) {
            var html = `
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Surat Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="overflow-x:auto;">
                    <table class="table">
                    <tr>
                        <td>KODE SURAT</td>
                        <td>${$(e.relatedTarget).data('kode_surat')}</td>
                    </tr>
                    <tr>
                        <td>NO URUT</td>
                        <td>${$(e.relatedTarget).data('no_urut')}</td>
                    </tr>
                    <tr>
                        <td>TANGGAL</td>
                        <td>${$(e.relatedTarget).data('tanggal')}</td>
                    </tr>
                    <tr>
                        <td>PERIHAL</td>
                        <td>${$(e.relatedTarget).data('perihal')}</td>
                    </tr>
                    <tr>
                        <td>KEPADA</td>
                        <td>${$(e.relatedTarget).data('kepada')}</td>
                    </tr>
                    <tr>
                        <td>PENGIRIM</td>
                        <td>${$(e.relatedTarget).data('pengirim')}</td>
                    </tr>
                </table>
                </div>
            </div>
            `;

            $('#modal-detail').html(html);
            $('.dropify').dropify();

        });
    </script>
    <script>
        $('#updateData').on('shown.bs.modal', function(e) {
            var html = `

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="${$(e.relatedTarget).data('url')}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <div class="mb-3">
                            <label for="kepada" class="form-label">kepada</label>
                            <input type="text" class="form-control" id="kepada" name="kepada"
                                placeholder="isi kepada" value="${$(e.relatedTarget).data('kepada')}">
                        </div>


                        <div class="mb-3">
                            <label for="pengirim" class="form-label">pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim"
                                placeholder="isi pengirim" value="${$(e.relatedTarget).data('pengirim')}">
                        </div>



                        <div class="mb-3">
                            <label for="perihal" class="form-label">perihal</label>
                            <textarea name="perihal" id="" cols="30" rows="10" class="form-control">${$(e.relatedTarget).data('perihal')}</textarea>
                        </div>




                        <div class="mb-3">
                            <label for="file" class="form-label">file</label>
                            <input type="file" class="form-control dropify" id="file" data-default-file="${$(e.relatedTarget).data('file')}" name="file"
                                placeholder="isi file">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                `;

            $('#modal-content').html(html);
            $('.dropify').dropify();

        });
    </script>
    @if (Session::has('message'))
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: @json(Session::get('status')),
                title: @json(Session::get('status')),
                text: @json(Session::get('message')),

            })
        </script>
    @endif
    @yield('js')
</body>

</html>
