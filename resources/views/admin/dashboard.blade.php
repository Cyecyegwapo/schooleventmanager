<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <h2>Create Event</h2>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <label for="name">Event Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="date">Event Date:</label>
        <input type="date" name="date" id="date" required><br><br>

        <button type="submit">Create Event</button>
    </form>

    <h2>Event List</h2>
    <ul>
        @foreach($events as $event)
            <li>{{ $event->name }} - {{ $event->date }}
                <a href="{{ route('events.edit', $event->id) }}">Edit</a>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</body>
</html>
