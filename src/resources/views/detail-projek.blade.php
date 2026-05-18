<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $projek->judul }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
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

        .card{
            background:white;
            padding:50px;
            border-radius:30px;
            box-shadow:0 20px 50px rgba(0,0,0,0.08);
        }

        .back{
            display:inline-block;
            margin-bottom:30px;
            text-decoration:none;
            color:#4f46e5;
            font-weight:600;
        }

        .badge{
            display:inline-block;
            padding:10px 18px;
            border-radius:999px;
            color:white;
            font-size:14px;
            margin-bottom:20px;
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
            margin-bottom:30px;
            font-size:17px;
        }

        .info{
            margin-bottom:30px;
        }

        .info strong{
            color:#0f172a;
        }

        .button-wrapper{
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn{
            display:inline-block;
            padding:14px 24px;
            border-radius:14px;
            text-decoration:none;
            font-weight:600;
            transition:.3s;
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

    </style>
</head>
<body>

    <div class="container">

        <a href="/" class="back">
            ← Kembali ke Home
        </a>

        <div class="card">

            <div class="badge {{ $projek->status_progress == 'Selesai' ? 'selesai' : 'belum' }}">
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

                @if ($projek->laporan_pdf)

                    <a
                        href="{{ asset($projek->laporan_pdf) }}"
                        target="_blank"
                        class="btn btn-secondary"
                    >
                        Lihat Laporan
                    </a>

                @endif

            </div>

        </div>

    </div>

</body>
</html>w