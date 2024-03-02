<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $insertQuery = "INSERT INTO feedback (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo '<script>alert("Thank you for your feedback!");</script>';
    } else {
        echo '<script>alert("Error submitting feedback. Please try again.");</script>';
    }
}
?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h3 class="mb-5 mt-5">Enter Youre Feedback</h3>
        </div>
        <div class="row g-4">
            <div class="col-md-6 mx-auto">
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
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Feedback Subject" required>
                                    <label for="subject">Feedback Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave your feedback here" id="message" name="message" style="height: 150px" required></textarea>
                                    <label for="message">Feedback Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit Feedback</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


