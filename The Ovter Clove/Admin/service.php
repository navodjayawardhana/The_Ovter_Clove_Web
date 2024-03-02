<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("config.php");
include_once 'navbar.php';

$message = '';

if (isset($_POST['add_service'])) {
    $selected_service_id = mysqli_real_escape_string($conn, $_POST['selected_service']);
    $service_description = mysqli_real_escape_string($conn, $_POST['service_description']);

    if (empty($service_description)) {
        $message = 'Please fill out the service description field.';
    } else {

        $update = "UPDATE services SET service_description='$service_description' WHERE id='$selected_service_id'";
        $update_query = mysqli_query($conn, $update);

        if ($update_query) {
            $message = 'Service updated successfully.';
        } else {
            $message = 'Could not update the service. Error: ' . mysqli_error($conn);
        }
    }
}

$query_services = "SELECT * FROM services";
$result_services = mysqli_query($conn, $query_services);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins and Services Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <div class="admin-product-form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>Edit Service</h3>
                <?php if (!empty($message)) : ?>
                    <p class="message"><?php echo $message; ?></p>
                <?php endif; ?>
                <label for="selected_service">Select Service:</label>
                <select name="selected_service" id="selected_service" class="box" required>
                    <option value="" disabled selected>Select Service</option>
                    <?php while ($row_service = mysqli_fetch_assoc($result_services)) : ?>
                        <option value="<?php echo $row_service['id']; ?>"><?php echo $row_service['service_name']; ?></option>
                    <?php endwhile; ?>
                </select>
                <textarea placeholder="Enter Service Description" name="service_description" class="box"></textarea>
                <input type="submit" class="btn" name="add_service" value="Edit Service">
            </form>
        </div>

        <div class="product-display">
            <h1>Registered Services</h1>
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service Name</th>
                        <th>Service Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php mysqli_data_seek($result_services, 0);  ?>
                    <?php while ($row_service = mysqli_fetch_assoc($result_services)) : ?>
                        <tr>
                            <td><?php echo $row_service['id']; ?></td>
                            <td><?php echo $row_service['service_name']; ?></td>
                            <td><?php echo $row_service['service_description']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
