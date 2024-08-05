<!DOCTYPE html>
<html>
<head>
    <title>Edit Agenda - Pencarian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Agenda - Pencarian</h2>
        <form action="{{ url('events/'.$event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Nama Agenda</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
            </div>
            {{-- <div class="form-group">
                <label for="start_date">Mulai Agenda</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $event->start }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">Selesai Agenda</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $event->end }}" required>
            </div> --}}
            <div class="form-group">
                <label for="nama_ruang">Nama Ruang</label>
                <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="{{ $event->nama_ruang }}" required>
            </div>
            <div class="form-group">
                <label for="baju">Baju</label>
                <input type="text" class="form-control" id="baju" name="baju" value="{{ $event->baju }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ url('search') }}" class="btn btn-secondary">Kembali Ke Pencarian</a>
        </form>
    </div>
</body>
</html>
