<?php
$mysqli = new mysqli("localhost", "username", "password", "contact_manager");

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $stmt = $mysqli->prepare("UPDATE contacts SET name = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $phone, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}

$stmt = $mysqli->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$contact = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form method="post">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($contact['name']); ?>" required>
        Phone: <input type="text" name="phone" value="<?php echo htmlspecialchars($contact['phone']); ?>" required>
        <input type="submit" value="Save">
    </form>
    <a href="index.php">Back to Contact List</a>
</body>
</html>

<?php
$mysqli->close();
?>
