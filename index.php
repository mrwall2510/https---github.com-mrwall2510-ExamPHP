<?php
$mysqli = new mysqli("localhost", "username", "password", "contact_manager");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM contacts";
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager</title>
</head>
<body>
    <h1>Contact List</h1>
    <a href="add_contact.php">Add New Contact</a>
    <ul>
        <?php while($row = $result->fetch_assoc()) { ?>
            <li>
                <?php echo htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['phone']); ?>
                <a href="edit_contact.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_contact.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>

<?php
$mysqli->close();
?>
