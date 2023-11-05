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
        :root {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .tebal {
            display: block;
            border-bottom: 5px solid #000;
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
        <span class="tebal mt-2"></span>
        <span style="display: block; border-bottom: 1px solid #000;" class="mt-1"></span>
        <div style="text-align: center;" class="mt-3"><b class="text-uppercase fs-5">Keputusan</b></div>
        <div style="text-align: center;"><b class="text-uppercase fs-5">Direktur Politeknik Pertanian Negeri Samarinda</b></div>
        <div style="text-align: center;"><b class="text-uppercase fs-5">Nomor: ###/PL21/KM/2023</b></div>
        <div style="text-align: center;" class="mt-2"><b class="text-uppercase fs-5">Tentang</b></div>
        <div style="text-align: center;" class="mt-2"><b class="text-uppercase fs-5">Subject</b></div>
        <div style="text-align: center;" class="mt-1"><b class="text-uppercase fs-5">Direktur Politeknik Pertanian Negeri</b></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
