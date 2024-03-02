<?php
include 'header1.php';
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);


    $insertQuery = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($conn, $insertQuery);


    if ($result) {
      echo '<script>alert("Message sent successfully. We will get back to you soon!");</script>';
  } else {
      echo '<script>alert("Error sending message. Please try again.");</script>';
  }
}

?>

<div class="container-xxl  py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

            <h1 class="mb-5 mt-5">Contact For Any Query</h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <h2>Booking</h2>
                        <p><i class="fa fa-envelope-open  me-2"></i>bookoveteclove@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <h2>General</h2>
                        <p><i class="fa fa-envelope-open  me-2"></i>infooveterclove@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <h2>Technical</h2>
                        <p><i class="fa fa-envelope-open me-2"></i>techovetreclove@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1696.2581893954564!2d80.63570200569208!3d7.30105003896604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3662b3fb5f219%3A0x9ae25c4bda408b7b!2sNew%20Flower%20Song%20Restaurant!5e0!3m2!1sen!2slk!4v1702707683817!5m2!1sen!2slk" 
              width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
                <form method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 150px" required></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
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