<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

?>

<?php
include 'navbar.php';
include 'config.php';

$selectfeedback = mysqli_query($conn, "SELECT * FROM feedback");

if (isset($_GET['delete_feedback'])) {
    $deletefeedbackId = $_GET['delete_feedback'];

    $deletefeedback = mysqli_query($conn, "DELETE FROM feedback WHERE id = $deletefeedbackId");

    if ($deletefeedback) {
        header("Location: feedback.php");
        exit();
    } else {
        echo "Error deleting feedback: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="product-display">

    <table class="product-display-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php while ($message = mysqli_fetch_assoc($selectfeedback)) { ?>
            <tr>
                <td><?php echo $message['id']; ?></td>
                <td><?php echo $message['name']; ?></td>
                <td><?php echo $message['email']; ?></td>
                <td><?php echo $message['subject']; ?></td>
                <td><?php echo $message['message']; ?></td>
                <td>
                    <a href="?delete_feedback=<?php echo $message['id']; ?>" class="btn">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
