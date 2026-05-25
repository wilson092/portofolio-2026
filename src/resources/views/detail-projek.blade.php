<!DOCTYPE html>
<html lang="id">
<head>

    @php
        use Illuminate\Support\Facades\Storage;
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $projek->judul }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f5f7fb;
            padding:40px;
            color:#1e293b;
        }

        .container{
            max-width:900px;
            margin:auto;
        }

        .back{
            display:inline-block;
            margin-bottom:30px;
            text-decoration:none;
            color:#4f46e5;
            font-weight:600;
        }

        .card{
            background:white;
            padding:50px;
            border-radius:30px;
            box-shadow:0 20px 50px rgba(0,0,0,.08);
        }

        .badge{
            display:inline-block;
            padding:10px 18px;
            border-radius:999px;
            color:white;
            font-size:14px;
            margin-bottom:20px;
            font-weight:600;
        }

        .selesai{
            background:#22c55e;
        }

        .belum{
            background:#ef4444;
        }

        h1{
            font-size:42px;
            margin-bottom:20px;
        }

        .desc{
            color:#64748b;
            line-height:1.9;
            margin-bottom:35px;
            font-size:17px;
        }

        .button-wrapper{
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:14px 24px;
            border-radius:14px;
            text-decoration:none;
            font-weight:600;
            transition:.25s;
        }

        .btn:hover{
            transform:translateY(-2px);
        }

        .btn-primary{
            background:#4f46e5;
            color:white;
        }

        .btn-primary:hover{
            background:#4338ca;
        }

        .btn-secondary{
            background:#0f172a;
            color:white;
        }

        .btn-secondary:hover{
            background:#020617;
        }

        .empty{
            background:#e2e8f0;
            color:#64748b;
            cursor:not-allowed;
        }

    </style>

</head>

<body>

<div class="container">

    <a href="/" class="back">
        ← Kembali ke Home
    </a>

    <div class="card">

        <div class="badge {{ $projek->status_progress === 'Selesai' ? 'selesai' : 'belum' }}">
            {{ $projek->status_progress }}
        </div>

        <h1>
            {{ $projek->judul }}
        </h1>

        <p class="desc">
            {{ $projek->deskripsi }}
        </p>

        <div class="button-wrapper">

            <a
                href="{{ $projek->link }}"
                target="_blank"
                class="btn btn-primary"
            >
                GitHub
            </a>

            @if($projek->laporan_pdf)

                <a
                    href="{{ Storage::url($projek->laporan_pdf) }}"
                    target="_blank"
                    class="btn btn-secondary"
                >
                    Lihat Laporan
                </a>

            @else

                <span class="btn empty">
                    Tidak Ada Laporan
                </span>

            @endif

        </div>

    </div>

</div>

</body>
</html>