<?php include_once('header.php'); ?>

<main class="main">
    <!--contact us-->
    <section class="m-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="contact">
                        <!-- <div class="google-map contact__google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3104.5761533072873!2d-78.19644468515456!3d38.91080675375955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b5c5dc680d0b2b%3A0x1e9ff0b6bb7a2f87!2s1000%20Proctor%20Ln%2C%20Front%20Royal%2C%20VA%2022630%2C%20%C3%89tats-Unis!5e0!3m2!1sfr!2sma!4v1578068093888!5m2!1sfr!2sma" allowfullscreen="" class="contact__google-map-iframe">
                            </iframe>
                        </div> -->
                        <form id="contact" class="widget__form" action="controller.php" method="post">
                            <h5 class="widget__form-title">Feel free to contact any time.</h5>
                            <p class="widget__form-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, repudiandae.</p>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control widget__form-input" placeholder="Your Name*">
                            </div>

                            <div class="form-group">
                                <input type="number" name="contact" class="form-control widget__form-input" placeholder="Mobile Number*">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control widget__form-input" placeholder="Your Email*">
                            </div>

                            <div class="form-group">
                                <input type="text" name="subject" class="form-control widget__form-input" placeholder="Your Subject*">
                            </div>

                            <div class="form-group">
                                <textarea name="message" cols="30" rows="5" class="form-control widget__form-input" placeholder="Your Message*"></textarea>
                            </div>

                            <button type="submit" name="send_msg_btn" class="btn-custom">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once('footer.php'); ?>

<?php
if (isset($_SESSION['msg_send'])) {
?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-pink"
        };
        toastr.success("Message Send!");
    </script>

<?php
    unset($_SESSION['msg_send']);
}
?>
<?php
if (isset($_SESSION['msg_error'])) {
?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-red"
        };
        toastr.success("Message not send!");
    </script>

<?php
    unset($_SESSION['msg_error']);
}
?>
<?php
if (isset($_SESSION['contact_error'])) {
?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-red"
        };
        toastr.success("Invalid mobile number. Please enter 10 digits only.");
    </script>

<?php
    unset($_SESSION['contact_error']);
}
?>

<script>
    $(document).ready(function() {

        var $contact = $("#contact");
        if ($contact.length) {
            $contact.validate({
                errorClass: 'error-message',
                errorElement: 'div',
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    contact: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    subject: {
                        required: true,
                        minlength: 1
                    },
                    message: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Username is mandatory!"
                    },
                    email: {
                        required: "Email is mandatory!",
                        email: "Please enter a valid email address!"
                    },
                    contact: {
                        required: "Contact number is mandatory!",
                        digits: "Please enter a valid contact number!",
                        minlength: "Contact number should be 10 digits!",
                        maxlength: "Contact number should be 10 digits!"
                    },
                    subject: {
                        required: "Subject is mandatory!"
                    },
                    message: {
                        required: "Message is mandatory!"
                    }
                }
            });
        }
    });
</script>