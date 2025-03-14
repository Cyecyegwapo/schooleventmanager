<h1>Create Event</h1>
<form method="POST" action="{{ route('events.store') }}">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required>
    <label for="description">Description</label>
    <textarea name="description" id="description" required></textarea>
    <label for="start_time">Start Time</label>
    <input type="datetime-local" name="start_time" id="start_time" required>
    <label for="end_time">End Time</label>
    <input type="datetime-local" name="end_time" id="end_time" required>
    <label for="location">Location</label>
    <input type="text" name="location" id="location" required>
    <button type="submit">Create</button>
</form>
