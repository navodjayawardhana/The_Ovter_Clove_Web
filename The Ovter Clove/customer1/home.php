<?php
session_start();
?>

<?php 
include 'header1.php';
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Enjoy</h1>
                            <h3 class="display-3 text-white animated slideInLeft">Outer Clove Meal</h3>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Outer Clove Meal offers a unique culinary experience with a passion for quality ingredients. From appetizers to main courses and desserts, each dish celebrates flavors and textures, making your dining experience unforgettable.</p>
                            <div class="btn-group" role="group" aria-label="Reservation Buttons">
                                <a href="bokking.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
                                <a href="menu.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Delivar Food</a>
                                <a href="menuview.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Our menu</a>
                            </div>
            </div>
            <div class="col-lg-6">
               
                <div id="imageSlider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../Admin/uploaded_promotions/promotion_1.jpg" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../Admin/uploaded_promotions/promotion_2.jpg" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../Admin/uploaded_promotions/promotion_3.jpg" alt="Image 3">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../Admin/uploaded_promotions/promotion_4.jpg" alt="Image 4">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="service">
    <?php
    include 'service.php' ;
    ?>
</div>

<div id="rate">
    <?php
    include 'rate.php' ;
    ?>
</div>



<?php

include 'footer.php';
?>


