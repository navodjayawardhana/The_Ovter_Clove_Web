<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    include 'config.php';
    include 'navbar.php';

    
    if (isset($_POST['add_promotion'])) {
        $promotion_name = $_POST['promotion_name'];
        $promotion_image = $_FILES['promotion_image']['name'];
        $promotion_image_tmp_name = $_FILES['promotion_image']['tmp_name'];
        $promotion_image_folder = 'uploaded_promotions/' . $promotion_image;

        if (empty($promotion_name) || empty($promotion_image)) {
            $message[] = 'Please fill out all fields for the promotion.';
        } else {
            $insert_promotion = "INSERT INTO promotion(name, image) VALUES('$promotion_name', '$promotion_image')";
            $upload_promotion = mysqli_query($conn, $insert_promotion);

            if ($upload_promotion) {
                move_uploaded_file($promotion_image_tmp_name, $promotion_image_folder);
                $message[] = 'New promotion added successfully.';
            } else {
                $message[] = 'Could not add the promotion. Error: ' . mysqli_error($conn);
            }
        }
    }

    $select_promotion = mysqli_query($conn, "SELECT * FROM promotion LIMIT 4");
    ?>

    <div class="container">

        <div class="product-display">
            <h1>Promotion List</h1>
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>Promotion Image</th>
                        <th>Promotion Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <?php while ($row_promotion = mysqli_fetch_assoc($select_promotion)) { ?>
                    <tr>
                        <td><img src="uploaded_promotions/<?php echo $row_promotion['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row_promotion['name']; ?></td>
                        <td>
                            <a href="promotionupdate.php?edit=<?php echo $row_promotion['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>


    </div>

</body>

</html>
