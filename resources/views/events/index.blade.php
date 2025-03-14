<h1>Events</h1>
<a href="{{ route('events.create') }}">Create Event</a>
<ul>
    @foreach ($events as $event)
        <li>
            {{ $event->title }} - {{ $event->location }}
            <a href="{{ route('events.attendance', $event) }}">Attendance</a>
            <a href="{{ route('events.qrcode', $event) }}">QR Code</a>
        </li>
    @endforeach
</ul>
