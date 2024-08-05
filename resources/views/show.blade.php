<!DOCTYPE html>
<html>
<head>
    <title>Detail Agenda - Pencarian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Detail Agenda - Pencarian</h2>
        <table class="table table-bordered mt-3">
            <tr>
                <th>ID</th>
                <td>{{ $event->id }}</td>
            </tr>
            <tr>    
                <th>Nama Agenda</th>
                <td>{{ $event->title }}</td>
            </tr>
            <tr>
                <th>Mulai Agenda</th>
                <td>{{ $event->start }}</td>
            </tr>
            <tr>
                <th>Selesai Agenda</th>
                <td>{{ $event->end }}</td>
            </tr>
            <tr>
                <th>Nama Ruang</th>
                <td>{{ $event->nama_ruang }}</td>
            </tr>
            <tr>
                <th>Baju</th>
                <td>{{ $event->baju }}</td>
            </tr>
        </table>
        <a href="{{ url('events/'.$event->id.'/edit') }}" class="btn btn-warning">Edit</a>
        <a href="{{ url('search') }}" class="btn btn-secondary">Kembali Ke Pencarian</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
