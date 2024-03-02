
<?php
include 'header1.php';
include 'config.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $datetime = $_POST['datetime'];
    $people = $_POST['people'];
    $specialRequest = $_POST['special_request'];

    $conn = mysqli_connect($server, $user, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO bookings (name, email, datetime, people, special_request) 
            VALUES ('$name', '$email', '$datetime', '$people', '$specialRequest')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Booking successful!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row g-0">
        <div class="col-md-6">
            <div>
                <img src="img/reserve.png" alt="">
            </div>
        </div>
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h1 class="text-white mb-4">Book A Table Online</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control" id="datetime" name="datetime" placeholder="Date & Time">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="select1" name="people">
                                    <option value="1">People 1</option>
                                    <option value="2">People 2</option>
                                    <option value="3">People 3</option>
                                    <option value="4">People more 3</option>
                                </select>
                                <label for="select1">No Of People</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Special Request" id="message" name="special_request" style="height: 100px"></textarea>
                                <label for="message">Special Request</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-dd-mm'
        });
    });
</script>

</body>
</html>
