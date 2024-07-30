<?php
include('../config/database.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../public/login.php");
    exit();
}

// Handle form submission to add/edit/delete artworks here

// Fetch artworks
$stmt = $conn->prepare("SELECT * FROM artworks");
$stmt->execute();
$artworks = $stmt->fetchAll();
?>

<h2>Manage Artworks</h2>

<table>
    <tr>
        <th>Title</th>
        <th>Artist</th>
        <th>Description</th>
        <th>Year</th>
        <th>Image</th>
        <th>Gallery</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($artworks as $artwork): ?>
    <tr>
        <td><?php echo htmlspecialchars($artwork['title']); ?></td>
        <td><?php echo htmlspecialchars($artwork['artist']); ?></td>
        <td><?php echo htmlspecialchars($artwork['description']); ?></td>
        <td><?php echo htmlspecialchars($artwork['year']); ?></td>
        <td><img src="../assets/images/<?php echo htmlspecialchars($artwork['image']); ?>" alt="<?php echo htmlspecialchars($artwork['title']); ?>" width="100"></td>
        <td><?php echo htmlspecialchars($artwork['gallery_id']); ?></td>
        <td>
            <a href="edit_artwork.php?id=<?php echo $artwork['id']; ?>">Edit</a>
            <a href="delete_artwork.php?id=<?php echo $artwork['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="add_artwork.php">Add New Artwork</a>
