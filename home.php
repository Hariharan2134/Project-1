<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_GET['username']); ?>!</h1>
    <ul>
        <li><a href="update_event.php">Events</a></li>
        <li><a href="contact.html">Contacts</a></li>
        <li><a href="Bank.html">Bank</a></li>
        <li><a href="cheque_form.html">Cheque</a></li> 
    </ul>
    
</body>
</html>
