<h1>Attendance for {{ $event->title }}</h1>
<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Attendance Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $attendance->user->name }}</td>
                <td>{{ $attendance->attendance_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
