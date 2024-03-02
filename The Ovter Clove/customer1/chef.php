<?php
include 'header1.php';
?>

<div class="container-xxl pt-5  pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            
            <h1 class="mb-5" style="margin-top: 100px">Our Master Chefs</h1>
        </div>
        <div class="row g-4">

            <?php
            include("config.php");

            $query = "SELECT name, image FROM chef";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $chefName = $row['name'];
                    $chefImage = $row['image'];
                    ?>

                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="../Admin/chef_img/<?php echo $row['image']; ?>" height="100" alt="">
                                
                            </div>
                            <h5 class="mb-0"><?php echo $chefName; ?></h5>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>


                    <?php
                }
            } else {
                echo "No chefs available.";
            }


            mysqli_close($conn);
            ?>

        </div>
    </div>
</div>

<?php
include 'footer.php';
?>