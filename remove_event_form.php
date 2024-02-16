<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Event</title>
</head>
<body>
    <h1>Remove Event</h1>

    <!-- Form for removing an existing event -->
    <form action="process_remove_event.php" method="post">
        <!-- Additional field for removing an existing event -->
        <label for="event_id">Event ID:</label>
        <input type="text" name="event_id" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
