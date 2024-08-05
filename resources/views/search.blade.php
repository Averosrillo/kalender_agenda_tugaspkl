<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <style>
    <style>
        body {
            background-color: #343a40; /* Darker background color */
            font-family: 'Arial', sans-serif;
            color: #f8f9fa; /* Light text color for better contrast */
        }
    
        .container {
            margin-top: 80px;
            padding: 40px;
            background: #ffffff; /* Slightly lighter background for the container */
            border-radius: 5px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
        }
    
        .btn-primary {
            background-color: #ff00ae;
            border-color: #ff00ae;
        }
    
        .btn-primary:hover {
            background-color: #9f036e;
            border-color: #a0006e;
        }
    
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #4e555b;
        }
    
        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }
    
        .btn-dark:hover {
            background-color: #23272b;
            border-color: #1d2124;
        }
    
        .form-group label {
            font-weight: bold;
        }
    
        .table-container {
            max-height: 400px; /* Adjust the height as needed */
            overflow-y: auto; /* Enable vertical scrolling */
        }
    
        .table {
            border-collapse: collapse;
            color: #f8f9fa; /* Light text color for table */
        }
    
        .table th, .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
    
        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }
    
        .table tbody tr:nth-of-type(even) {
            background-color: #6c757d; /* Darker row color */
        }
    
        .table tbody tr:hover {
            background-color: #5a6268; /* Slightly lighter row color on hover */
        }
    
        .header h2 {
            color: #ff00ae;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        
        /* Video Background */
        #video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            
        }
    
        .no-results {
            color: #ced4da; /* Lighter text color for no results message */
            text-align: center;
            font-size: 1.25rem;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- Background Video -->
    <video id="video-background" autoplay muted loop>
        <source src="/your-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container">
        <div class="header">
            <h2>Cari Agenda</h2>
        </div>

        <form method="GET" action="{{ url('/search') }}">
            <div class="mb-3">
                <label for="title" class="form-label">Nama Agenda</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan nama agenda">
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Mulai Agenda</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Selesai Agenda</label>
                <input type="date" class="form-control" id="end_date" name="end_date">
            </div>
            <button type="submit" class="btn btn-primary">Cari Agenda</button>
            <a href="{{ url('') }}" class="btn btn-dark">Kembali</a>
        </form>

        @if(isset($events) && $events->count())
        <div class="mt-4 table-container">
            <h3>Hasil Agenda</h3>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Agenda</th>
                        <th>Mulai Agenda</th>
                        <th>Selesai Agenda</th>
                        <th>Nama Ruang</th>
                        <th>Baju</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->start }}</td>
                        <td>{{ $event->end }}</td>
                        <td>{{ $event->nama_ruang }}</td>
                        <td>{{ $event->baju }}</td>
                        <td>
                            <!-- Tindakan Show -->
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">Show</a>
                            
                            <!-- Tindakan Update -->
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Update</a>

                            <!-- Tindakan Delete -->
                            <form id="delete-form-{{ $event->id }}" action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-form-id="{{ $event->id }}">Delete</button>
                            </form>
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.querySelectorAll('.delete-btn').forEach(button => {
                                        button.addEventListener('click', function() {
                                            const formId = this.getAttribute('data-form-id');
                                            Swal.fire({
                                                title: 'Apakah kamu serius?',
                                                text: "Setelah dihapus tidak dapat dikembalikan!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yaa, Hapus ini!',
                                                cancelButtonText: 'Tidak, batalkan!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('delete-form-' + formId).submit();
                                                }
                                            });
                                        });
                                    });
                                });
                            </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="no-results">Tidak ada hasil ditemukan.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
