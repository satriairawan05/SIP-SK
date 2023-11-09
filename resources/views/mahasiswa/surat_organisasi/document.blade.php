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
        <div style="text-align: center;"><b class="text-uppercase fs-5">Nomor: 001/PL21/KM/2023</b></div>
        <div style="text-align: center;" class="mt-2"><b class="text-uppercase fs-5">Tentang</b></div>
        <div style="text-align: center;" class="mt-2"><b class="text-uppercase fs-5">{!! $keputusan->sko_subject !!}</b></div>
        <div style="text-align: center;" class="mt-1"><b class="text-uppercase fs-5">Direktur Politeknik Pertanian Negeri</b></div>
        <table style="text-align: justify;">
            <tbody>
                <tr>
                    <td width="10%" style="vertical-align: top;" class="mt-2">Menimbang</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_menimbang !!}</td>
                </tr>
                <tr>
                    <td width="10%" style="vertical-align: top;">Mengingat</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_mengingat !!}</td>
                </tr>
                <tr>
                    <td width="10%" style="vertical-align: top;">Memperhatikan</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_memperhatikan !!}</td>
                </tr>
            </tbody>
        </table>
        <div style="text-align: center;" class="my-2"><b class="text-uppercase fs-5">Memutuskan</b></div>
        <table style="text-align: justify;">
            <tbody>
                <tr>
                    <td width="10%" style="vertical-align: top;">Menetapkan</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_menetapkan !!}</td>
                </tr>
                <tr>
                    <td width="10%" style="vertical-align: top; word-wrap: break-word;">Kesatu</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_kesatu !!}</td>
                </tr>
                <tr>
                    <td width="10%" style="vertical-align: top; word-wrap: break-word;">Kedua</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_kedua !!}</td>
                </tr>
                <tr>
                    <td width="10%" style="vertical-align: top; word-wrap: break-word;">Ketiga</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_ketiga !!}</td>
                </tr>
                <tr>
                    <td width="10%" style="vertical-align: top; word-wrap: break-word;">Keempat</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_keempat !!}</td>
                </tr>
                <tr>
                    <td width="10%" style="vertical-align: top; word-wrap: break-word;">Kelima</td>
                    <td width="5%" style="vertical-align: top;">:</td>
                    <td width="85%" style="vertical-align: top;">{!! $keputusan->sko_kelima !!}</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-6">
            </div>
            <div class="col-6">
                <p style="text-align: left;" class="mb-0">Ditetapkan di : Samarinda</p>
                <p style="text-align: left;" class="mb-0">Pada tanggal : {{ \Carbon\Carbon::parse($keputusan->sko_tgl_surat)->isoformat('D MMMM YYYY') }}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
            </div>
            @if($keputusan->sk_no_surat != null)
            <div class="col-6">
                <p style="text-align: left;" class="mb-0">Direktur, </p>
                <p style="text-align: left;" class="mb-0">{{ $signature->sign_jabatan }}</p>
                <br>
                <br>
                <br>
                <p style="text-align: left;" class="mb-0">{{ $signatur->sign_nama }}</p>
                <p style="text-align: left;" class="mb-0">{{ $signature->sign_nip }}</p>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-6">
                <p style="text-align: left;" class="mb-0">Tembusan </p>
                <p style="text-align: left;" class="mb-0">{!! $keputusan->sko_tembusan !!}</p>
            </div>
            <div class="col-6">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
