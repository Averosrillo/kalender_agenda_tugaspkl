<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        /* General Styles */
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: "Poppins", sans-serif;
        }

        body {
            color: #000000; /* Light text color */
            position: relative; /* Make sure the video is positioned relative to the body */
            overflow: hidden; /* Hide overflow to keep the video in the background */
        }

        /* Video Background */
        #video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Place the video behind other content */
        }

        /* Custom Styles for Events */
        .fc-event {
            background-color: #ff008c;
            border-radius: 4px; /* Rounded corners for events */
            text-align: center;
            border-color: #ff008c;
        }

        .fc-event .fc-title {
            color: #ffffff; /* White text color for event titles */
            text-align: center;
            font-weight: 400;
            font-size: 13px;
        }


        h1 {
            color: #f8f9fa;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            padding-top: 0; /* Adjust top padding if needed */
        }

        .calendar-contact-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: stretch; /* Ensures both items stretch to the same height */
            gap: 20px; /* Space between calendar and contact box */
        }

        #calendar {
            background: rgba(250, 250, 250, 0.8); /* Slightly opaque background for the calendar */
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 800px; /* Increased width for the calendar */
            height: 630px; /* Increased height for the calendar */
            box-sizing: border-box; /* Ensures padding and border are included in width */
        }

        .contact-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        #moreInfoBtn {
            background-color: #17a2b8; /* Bootstrap info color */
            border-color: #17a2b8;
        }

        #moreInfoBtn:hover {
            background-color: #138496; /* Darker blue on hover */
            border-color: #117a8b;
        }

        .more-info {
            display: none; /* Initially hidden */
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            color: #000;
        }

        .more-info p {
            margin-bottom: 10px;
        }



        .contact-box {
            background: rgba(255, 255, 255, 0.8); /* Slightly opaque background for the contact box */
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 350px; /* Smaller width for the contact box */
            height: 240px; /* Smaller width for the contact box */
            box-sizing: border-box; /* Ensures padding and border are included in width */
        }

        .contact-box h2 {
            margin-bottom: 20px;
            color: #ff00ae;
        }

        .contact-box p {
            color: #000000;
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Modal Styles */
        .modal-content {
            background-color: #f8f8f8; /* Dark background for the modal */
            color: #ff00ae; /* Light text color in the modal */
            border-radius: 8px;
        }

        .modal-header {
            border-bottom: px solid #495057;
        }

        .modal-footer {
            border-top: 0px solid #495057;
        }

        .btn-primary {
            background-color: #00c735; /* Green background for the save button */
            border-color: #00c735;
        }

        .btn-primary:hover {
            background-color: #08a331; /* Darker green on hover */
            border-color: #08a331;
        }

        .btn-danger {
            background-color: #dc3545; /* Red background for the delete button */
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
            border-color: #bd2130;
        }

        /* Tooltip Styling */
        .tooltip-event {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            max-width: 200px;
            font-size: 14px;
        }

        /* Calendar Today Highlight */
        .fc-today {
        position: relative;
        background-color: #ff00ae !important; /* White background color for today */
        color: #ffffff !important; /* Blue text color for today */
        font-size: 1.5rem !important; /* Larger font size for today */
        font-weight: bold; /* Bold text for today */
        text-align: center; /* Center the text */
        border: 10px solid #00a2ff; /* Blue border */
        padding: 5px; /* Add some padding around the text */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Shadow for better visibility */
        }

        /* Adjust size and positioning */
        .fc-day-grid-container {
            position: relative;
            height: 100%;
        }

        .fc-day-grid-day-number {
            display: cebter;
            align-items: center;
            justify-content: center;
        }

        /* Ensure calendar events are not overlapping the today highlight */
        .fc-content-skeleton {
            overflow: hidden; /* Prevent content from overflowing */
        }

        /* General Styles for Day Numbers */
        .fc-day-grid-day-number {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem; /* Increase font size for day numbers */
            font-weight: bold; /* Make the font bold */
        }

        /* General Styles for All Days */
        .fc-day-grid-day {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Specific Styles for Today's Date */
        .fc-day-today .fc-day-grid-day-number {
            background-color: #ffffff; /* Background color for today’s date */
            color: #ffffff; /* Text color for today’s date */
            border: 2px solid #00a2ff; /* Blue border for today’s date */
            border-radius: 50%; /* Circular border */
            font-size: 2rem; /* Larger font size for today’s date */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Shadow effect for better visibility */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            #calendar {
                padding: 10px;
                width: 600px; /* Adjusted width for smaller screens */
                height: 600px; /* Adjusted height for smaller screens */
            }

            .contact-box {
                width: 250px; /* Adjusted width for smaller screens */
                height: 600px; /* Match height to calendar */
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.5rem; /* Smaller font size for small screens */
                margin-bottom: 20px;
            }

            #calendar {
                padding: 5px;
                width: 100%;
                height: 400px; /* Reduced height for very small screens */
            }

            .contact-box {
                width: 100%;
                height: auto; /* Adjust height for small screens */
                margin-top: 20px; /* Add some space on top */
            }
            .footer {
            background-color: #343a40; /* Dark background */
            color: #ffffff; /* White text */
            padding: 20px 0; /* Top and bottom padding */
            text-align: center; /* Center-align text */
            position: absolute;
            bottom: 0;
            width: 100%;
            }

            /* General Styles */
            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 0, 0, 0.5); /* Dark semi-transparent background */
                z-index: 0; /* Ensure it is above the video but below other content */
            }
            .fc-day-grid-day-number {
                display: flex; /* Fixed typo from cebter to flex */
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                font-weight: bold;
            }

            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 0, 0, 0.5); /* Ensure it doesn’t cover interactive content */
                z-index: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Background Video -->
    <video id="video-background" autoplay muted loop>
        <source src="/samkura.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container mt-5">
        
        <div class="calendar-contact-wrapper">
            <div id='calendar'></div>
            <div class="contact-box">
                <h2>INFORMASI</h2>
                <p><strong>Nama :</strong> Averroes Rillo H</p>
                <p><strong>Sekolah :</strong> SMKN 64 Jakarta</p>
                <p><strong>Email:</strong> averroerillo@gmail.com</p>
                {{-- <p><strong>Instagram:</strong> @verozsy</p> --}}
                <a href="{{ url('kontak') }}" type="button" class="btn btn-primary">Kontak</a>
                <a href="{{ url('/search') }}" class="btn btn-primary">Cari Agenda</a>
    

    <!-- Event Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Agenda Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="form-group">
                            <label for="eventTitle">Nama Agenda</label>
                            <input type="text" class="form-control" id="eventTitle" placeholder="Masukkan Nama Agenda" required>
                        </div>
                        <div class="form-group">
                            <label for="eventStart">Mulai Agenda</label>
                            <input type="date" class="form-control" id="eventStart" required>
                        </div>
                        <div class="form-group">
                            <label for="eventEnd">Selesai Agenda</label>
                            <input type="date" class="form-control" id="eventEnd" required>
                        </div>
                        <div class="form-group">
                            <label for="eventNamaRuang">Nama Ruang</label>
                            <input type="text" class="form-control" id="eventNamaRuang" placeholder="Masukkan Nama Ruang" required>
                        </div>
                        <div class="form-group">
                            <label for="eventBaju">Baju</label>
                            <input type="text" class="form-control" id="eventBaju" placeholder="Masukkan Nama Baju" required>
                        </div>
                        <input type="hidden" id="eventId">
                        <input type="hidden" id="eventType">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="saveEvent">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Event Modal -->
    <div class="modal fade" id="showEventModal" tabindex="-1" role="dialog" aria-labelledby="showEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showEventModalLabel">Detail Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Agenda :</strong> <span id="showEventTitle"></span></p>
                    <p><strong>Mulai Agenda :</strong> <span id="showEventStart"></span></p>
                    <p><strong>Selesai Agenda :</strong> <span id="showEventEnd"></span></p>
                    <p><strong>Nama Ruang :</strong> <span id="showEventNamaRuang"></span></p>
                    <p><strong>Baju :</strong> <span id="showEventBaju"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="editEvent">Edit</button>
                    <button type="button" class="btn btn-danger" id="deleteEventShow">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var SITEURL = "{{ url('/') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/",
                displayEventTime: false,
                eventRender: function(event, element) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    $('#eventModal').modal('show');
                    $('#eventModalLabel').text('Tambah Agenda Baru');
                    $('#eventForm')[0].reset();
                    $('#eventId').val('');
                    $('#eventType').val('add');
                    $('#eventStart').val($.fullCalendar.formatDate(start, "YYYY-MM-DD"));
                    $('#eventEnd').val($.fullCalendar.formatDate(end, "YYYY-MM-DD"));
                },
                eventClick: function(event) {
                    $('#showEventModal').modal('show');
                    $('#showEventModalLabel').text('Agenda Detail');
                    $('#showEventTitle').text(event.title);
                    $('#showEventStart').text($.fullCalendar.formatDate(event.start, "YYYY-MM-DD"));
                    $('#showEventEnd').text($.fullCalendar.formatDate(event.end, "YYYY-MM-DD"));
                    $('#showEventNamaRuang').text(event.nama_ruang);
                    $('#showEventBaju').text(event.baju);
                    $('#eventId').val(event.id);
                }
            });

            $('#saveEvent').on('click', function() {
            var title = $('#eventTitle').val();
            var start = $('#eventStart').val();
            var end = $('#eventEnd').val();
            var nama_ruang = $('#eventNamaRuang').val();
            var baju = $('#eventBaju').val();
            var id = $('#eventId').val();
            var type = $('#eventType').val();

            $.ajax({
                url: SITEURL + "/manage-event",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    nama_ruang: nama_ruang,
                    baju: baju,
                    id: id,
                    type: type
                },
                type: "POST",
                success: function(data) {
                    $('#eventModal').modal('hide');
                    calendar.fullCalendar('refetchEvents');
                    toastr.success('Event Saved');
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = xhr.responseJSON.error || 'An error occurred.';
                    toastr.error(errorMessage);
                }
            });
        });


            $('#deleteEvent').on('click', function() {
                var id = $('#eventId').val();
                $.ajax({
                    url: SITEURL + "/manage-event",
                    data: {
                        id: id,
                        type: 'delete'
                    },
                    type: "POST",
                    success: function(data) {
                        $('#eventModal').modal('hide');
                        calendar.fullCalendar('refetchEvents');
                        toastr.success('Event Deleted');
                    }
                });
            });   

            $('#editEvent').on('click', function() {
                var id = $('#eventId').val();
                var event = calendar.fullCalendar('clientEvents', id)[0];
                $('#showEventModal').modal('hide');
                $('#eventModal').modal('show');
                $('#eventModalLabel').text('Edit Agenda');
                $('#eventTitle').val(event.title);
                $('#eventStart').val($.fullCalendar.formatDate(event.start, "YYYY-MM-DD"));
                $('#eventEnd').val($.fullCalendar.formatDate(event.end, "YYYY-MM-DD"));
                $('#eventNamaRuang').val(event.nama_ruang);
                $('#eventBaju').val(event.baju);
                $('#eventId').val(event.id);
                $('#eventType').val('update');
            });

            $('#deleteEventShow').on('click', function() {
                var id = $('#eventId').val();
                $.ajax({
                    url: SITEURL + "/manage-event",
                    data: {
                        id: id,
                        type: 'delete'
                    },
                    type: "POST",
                    success: function(data) {
                        $('#showEventModal').modal('hide');
                        calendar.fullCalendar('refetchEvents');
                        toastr.success('Event Deleted');
                    }
                });
            });
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
