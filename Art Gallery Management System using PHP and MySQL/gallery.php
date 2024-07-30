<?php
include('../config/database.php');

$stmt = $conn->prepare("SELECT * FROM galleries");
$stmt->execute();
$galleries = $stmt->fetchAll();
?>

<h2>Galleries</h2>

<?php foreach ($galleries as $gallery): ?>
    <div>
        <h3><?php echo htmlspecialchars($gallery['name']); ?></h3>
        <p><?php echo htmlspecialchars($gallery['description']); ?></p>
        <a href="gallery_details.php?id=<?php echo $gallery['id']; ?>">View Details</a>
    </div>
<?php endforeach; ?>
