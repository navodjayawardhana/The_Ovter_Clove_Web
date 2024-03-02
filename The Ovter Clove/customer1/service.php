<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OvterClove-service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
</head>

<body>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 style="color: #0F172B;" class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4">
 
            <?php
            include("config.php");
            $query = "SELECT service_name, service_description FROM services";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $serviceName = $row['service_name'];
                    $serviceDescription = $row['service_description'];
                    ?>

                    <div class="col-sm-3 wow fadeInUp d-flex flex-column" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3 flex-fill">
                            <div class="p-4">
                                <h5 style="color: #0F172B;"><?php echo $serviceName; ?></h5>
                                <p><?php echo $serviceDescription; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No services available.";
            }

            mysqli_close($conn);
            ?>

        </div>
    </div>
</div>

</body>

</html>
