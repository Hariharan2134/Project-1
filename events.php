<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <style>
        body {
            text-align: center;
            padding: 50px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Events</h1>

    <?php
    // Example array of events. Replace this with your actual data.
    $events = [
        ['id' => 1, 'name' => 'Event 1', 'date' => '2024-01-15'],
        ['id' => 2, 'name' => 'Event 2', 'date' => '2024-02-20'],
        // Add more events as needed
    ];

    if (count($events) > 0) {
        echo '<ul>';
        foreach ($events as $event) {
            echo '<li>';
            echo '<strong>' . htmlspecialchars($event['name']) . '</strong> - ' . htmlspecialchars($event['date']);
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No events available.</p>';
    }
    ?>

    <p>
        <a href="index.php">Go back to Home</a>
    </p>
</body>
</html>
