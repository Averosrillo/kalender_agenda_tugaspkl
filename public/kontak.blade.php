<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link rel="icon" href="images/logoss.png" type="image/png">

    <!-- Meta SEO -->
    <meta name="title" content="Kecamatan Jakarta Timur">
    <meta name="description" content="Information about Kecamatan Jakarta Timur.">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Your Name">

    <!-- Social media share -->
    <meta property="og:title" content="Kecamatan Jakarta Timur">
    <meta property="og:site_name" content="Kecamatan Jakarta Timur">
    <meta property="og:url" content="https://demo.themesberg.com/landwind/" />
    <meta property="og:description" content="Information about Kecamatan Jakarta Timur">
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/github/landwind/og-image.png">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@yourtwitterhandle" />
    <meta name="twitter:creator" content="@yourtwitterhandle" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 100;
            font-style: normal;
        }
        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            padding: 11px 210px;
            margin: 100px 90px;
        }

        .card-body {
            background-color: #ffffff;
        }

        .card img {
            filter: grayscale(1);
            transition: all 0.4s ease-in-out;
        }

        .card img:hover {
            filter: grayscale(0);
            transform: scale(1.1);
        }

        .footer {
            background-color: #d81b60;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        .map-container {
            width: 100%;
            max-width: 600px; /* Adjust to control the maximum size */
            height: auto; /* Maintain aspect ratio */
            margin: 0 auto; /* Center the container */
            text-align: center; /* Center content inside */
            border-radius: 6px;
        }

        .map-container img {
            max-width: 80%;
            height: auto;
            border-radius: 6px; /* Match the container's border radius */
        }



        .btn-back {
            background-color: #d81b60;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border: 
            transition: background-color 0.3s, transform 0.3s;
            margin-bottom: 20px; /* Space below the button */
            text-decoration: none; /* Remove underline */
        }

        .btn-back:hover {
            background-color: #c2185b;
            transform: scale(1.05);
        }

        .btn-back i {
            margin-right: 8px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .contact-info .card {
            flex: 1;
            min-width: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .contact-info .card h2 {
            margin-bottom: 0.5rem;
        }

        .contact-info .card p {
            margin: 0;
        }

        .contact-info .btn-pink {
            text-align: center;
            margin-top: 0.5rem;
            text-decoration: none; /* Remove underline */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="{{ url('Kalender') }}" class="btn btn-back">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <!-- Main Section -->
        <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="map-container mb-4">
                        <img src="./qr.jpeg" alt="QR Code" class="img-fluid">
                    </div>                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Description section is now removed from here -->
                        </div>
                    </div>
                </div>


            <!-- Sidebar Column (Contact Information) -->
            <div class="col-lg-12">
                <div class="contact-info mb-4">
                    <div class="card border border-gray-300">
                        <div class="card-body">
                            <h2 class="h5 font-weight-semibold mb-2">Jam Operasional :</h2>
                            <p>17.00 sd 18.00</p>
                        </div>
                    </div>
                    <div class="card border border-gray-300">
                        <div class="card-body">
                            <h2 class="h5 font-weight-semibold mb-2">Nomor :</h2>
                            <p>(233) 0983-7654-365</p>
                        </div>
                    </div>
                    <div class="card border border-gray-300">
                        <div class="card-body">
                            <h2 class="h5 font-weight-semibold mb-2">Email :</h2>
                            <p>keramatjati@gmail.com</p>
                        </div>
                    </div>
                    <div class="card border border-gray-300">
                        <div class="card-body">
                            <h2 class="h5 font-weight-semibold mb-2">Instagram :</h2>
                            <a href="#" class="btn btn-pink">@Kecamatan.keramatjati</a>
                        </div>
                    </div>
                </div>

                <!-- Description section moved to its own row below -->
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card mb-4">
                            {{-- <div class="card-body">
                                <h2 class="h4 mb-2"><b>Kantor Walikota Jakarta Timur</b></h2>
                                <p>Ktr. Walikota Jkt Tim., Komplek Jl. Dr. Sumarno No.1, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13940.</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>

</html>
