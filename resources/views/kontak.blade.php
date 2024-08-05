<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link rel="icon" href="images/logoss.png" type="image/png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Custom Styles -->
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            padding: 20px;
            margin-top: 50px;
        }

        .btn-back {
            background-color: #d81b60;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            margin-bottom: 20px; /* Space below the button */
        }

        .btn-back:hover {
            background-color: #c2185b;
            transform: scale(1.05);
        }

        .map-container {
            width: 100%;
            max-width: 400px; /* Adjust to control the maximum size */
            height: auto; /* Maintain aspect ratio */
            margin: 0 auto 30px auto; /* Center the container and add bottom margin */
            text-align: center; /* Center content inside */
            border-radius: 6px;
        }

        .map-container img {
            max-width: 100%;
            height: auto;
            border-radius: 6px; /* Match the container's border radius */
        }

        .card-body {
            background-color: #ffffff;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 20px; /* Space above the contact info */
        }

        .contact-info .card {
            flex: 1;
            min-width: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
        }

        .contact-info .card h2 {
            margin-bottom: 0.5rem;
        }

        .contact-info .card p {
            margin: 0;
        }

        .contact-info .card i {
            font-size: 1.5rem; /* Adjust icon size */
            margin-right: 10px; /* Space between icon and text */
        }

        .btn-pink {
            background-color: #ffffff;
            color: #000000;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-pink:hover {
            background-color: #d81b60;
            transform: scale(1.05);
        }

        .footer {
            background-color: #d81b60;
            color: white;
            padding: 1rem;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ url('/') }}" class="btn-back">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <!-- Main Section -->
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="map-container mb-4">
                    <img src="./QR CODE.png" alt="QR Code" class="img-fluid">
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
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-clock"></i>
                            <div>
                                <h2 class="h5 font-weight-semibold mb-2">Jam Operasional :</h2>
                                <a href="#" class="btn-pink">17.00 sd 18.00</a>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-gray-300">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-telephone"></i>
                            <div>
                                <h2 class="h5 font-weight-semibold mb-2">Nomor :</h2>
                                <a href="#" class="btn-pink">(233) 0983-7654-365</a>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-gray-300">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-envelope"></i>
                            <div>
                                <h2 class="h5 font-weight-semibold mb-2">Email :</h2>
                                <a href="#" class="btn-pink">keramatjati@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-gray-300">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-instagram"></i>
                            <div>
                                <h2 class="h5 font-weight-semibold mb-2">Instagram :</h2>
                                <a href="#" class="btn-pink">@Kecamatan.keramatjati</a>
                            </div>
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
</body>

</html>
