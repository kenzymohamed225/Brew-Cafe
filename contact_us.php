<?php
$messageSent = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"] ?? "");
    $email = htmlspecialchars($_POST["email"] ?? "");
    $subject = htmlspecialchars($_POST["subject"] ?? "");
    $message = htmlspecialchars($_POST["message"] ?? "");

    if (!empty($name) && !empty($email) && !empty($message)) {
        $messageSent = true;
    }
}

include_once "navbar.php";
?>

<main class="container my-5 flex-grow-1">
    <div class="text-center mb-5">
        <h1 class="display-6 fw-bold" style="color: var(--espresso-dark);">Contact Us</h1>
        <p class="text-muted">Have a question or feedback? We'd love to hear from you!</p>
    </div>

    <?php if ($messageSent): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm text-center mb-4" role="alert">
            <strong>Thank you, <?php echo $name; ?>!</strong> Your message has been sent successfully. We'll get back to you shortly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        <!-- Contact Information Cards -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h4 class="fw-bold mb-4" style="color: var(--espresso-dark);">Get In Touch</h4>

                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="p-2 rounded-3 text-white fs-5" style="background-color: var(--espresso-dark); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                        📍
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Our Location</h6>
                        <p class="text-muted small mb-0">123 Coffee Avenue, Downtown, Cairo, Egypt</p>
                    </div>
                </div>

                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="p-2 rounded-3 text-white fs-5" style="background-color: var(--espresso-dark); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                        📞
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Phone Number</h6>
                        <p class="text-muted small mb-0">+20 100 123 4567 / +20 122 987 6543</p>
                    </div>
                </div>

                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="p-2 rounded-3 text-white fs-5" style="background-color: var(--espresso-dark); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                        ✉️
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Email Address</h6>
                        <p class="text-muted small mb-0">hello@brewcafe.com</p>
                    </div>
                </div>

                <div class="d-flex align-items-start gap-3">
                    <div class="p-2 rounded-3 text-white fs-5" style="background-color: var(--espresso-dark); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                        ⏰
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Working Hours</h6>
                        <p class="text-muted small mb-0">Sat - Thu: 7:00 AM - 11:00 PM</p>
                        <p class="text-muted small mb-0">Fri: 10:00 AM - 2:00 AM</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm p-4 p-md-5 h-100">
                <h4 class="fw-bold mb-4" style="color: var(--espresso-dark);">Send Us a Message</h4>
                <form action="contact_us.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label small fw-semibold">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Mohamed Ahmed" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label small fw-semibold">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="mohamed@example.com" required>
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label small fw-semibold">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="General Inquiry / Feedback">
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label small fw-semibold">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-brown w-100 py-2">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include_once "footer.php";
?>