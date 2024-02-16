<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
</head>
<body>
    <h1>Update Event</h1>

    <!-- Form for updating an existing event -->
    <form action="process_update_event.php" method="post">
        <!-- Additional field for modifying an existing event -->
        <label for="event_id">Event ID:</label>
        <input type="text" name="event_id" required><br><br>

        <!-- Fields for event details -->
        <label for="name">Event Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="date">Event Date:</label>
        <input type="date" name="date" required><br><br>

        <label for="place">Event Place:</label>
        <input type="text" name="place" required><br><br>

        <label for="description">Event Description:</label>
        <textarea name="description" rows="4" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
