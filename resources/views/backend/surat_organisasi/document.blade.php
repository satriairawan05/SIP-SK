<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Surat Keputusan Politeknik Pertanian Negeri Samarinda">
    <meta name="author" content="Deuwi Satriya Irawan">
    <title>{{ env('APP_NAME') }} | Print SK</title>
    <link href="{{ asset('ruang-admin/img/logo/logo.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .tebal {
            border: 6px solid #000;
            color: #000;
            line-height: 1;
        }

        @media print {

            @page {
                size: F4;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- <table>
            <thead>
                <tr>
                    <td><img src="{{ asset('ruang-admin/img/snapedit_1698973548659.png') }}" alt="Kop Surat"
                            width="100%" style="top:0;"></td>
                </tr>
            </thead>
        </table> --}}
        <table class="mt-2">
            <thead>
                <tr>
                    <td><img src="{{ asset('ruang-admin/img/logo_politani.png') }}" alt="Cover"
                            style="width: 135px; height: 135px;" class="mx-2"></td>
                    <td align="center">
                        <font size="4" class="mt-0">Kementrian Pendidikan, Kebudayaan, Riset dan Teknologi
                        </font><br>
                        <font size="5" class="mt-0"><b>Politeknik Pertanian Negeri Samarinda</b></font><br>
                        <font size="1" class="mt-0" class="fs-2">Kampus Gunung Panjang Jl. Samratulangi
                            Samarinda 75131
                            Telepon.0541-260421, Fax.0541-260680</font><br>
                        <font size="1" class="mt-0" class="fs-2">email: <u>info@politanisamarinda.ac.id</u>
                            dan
                            <u>politanismd@gmail.com</u> www.politanisamarinda.ac.id
                        </font>
                    </td>
                </tr>
            </thead>
        </table>
        <hr class="tebal mb-0">
        <hr>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
            window.print();
        </script>
</body>

</html>
