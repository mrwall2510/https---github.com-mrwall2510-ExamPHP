<?php
$mysqli = new mysqli("localhost", "username", "password", "contact_manager");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $stmt = $mysqli->prepare("INSERT INTO contacts (name, phone) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $phone);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
</head>
<body>
    <h1>Add New Contact</h1>
    <form method="post">
        Name: <input type="text" name="name" required>
        Phone: <input type="text" name="phone" required>
        <input type="submit" value="Add">
    </form>
    <a href="index.php">Back to Contact List</a>
</body>
</html>

<?php
$mysqli->close();
?>
