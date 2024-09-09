<?php
$mysqli = new mysqli("localhost", "username", "password", "contact_manager");

$id = $_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM contacts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: index.php");
exit();
?>

<?php
$mysqli->close();
?>
