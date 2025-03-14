<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>User Dashboard</h1>

    <h2>Event List</h2>
    <ul>
        @foreach($events as $event)
            <li>{{ $event->name }} - {{ $event->date }}
                <a href="{{ route('events.qrcode', $event->id) }}">Attendance QR Code</a>
                <a href="{{ route('events.attendance', $event->id) }}">Attendance</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
