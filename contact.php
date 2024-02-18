<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--to start with bootstrap you should include these 2 lines-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</head>

<body>

    <?php
        include_once "DBconnection.php";
        if (isset($_POST['submit'])) {
            //php user input validation
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $subject = $_POST["subject"];
                $content = $_POST["message"];
                $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES ( '" . $name . "', '" . $email . "', '" . $subject . "' , '" . $content . "')";
                $conn->query($sql);
                echo '<script> swal("Thank you!", "Your message has been sent successfully", "success"); </script>';
            } else {
                echo 'swal("Wrong!", "Empty inputs", "error");</script>';

            }
        }
        ?>



        <section class="part1">
            <div class="navbar">
                <img src="img/Picture1.png" class="logo">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Products.php">Products</a></li>
                    <li><a href="cart.php">cart</a></li>
                    <li><a href="Contact.php" class="active">Contact</a></li>
                </ul>
            </div>
        </section>

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center card card-body row rounded-3">

                <div class=" text align-items-center ">
                    <h4 class="text-center">&nbsp;Contact Us&nbsp;&nbsp;</h4>

                </div>




                <div class="col-lg-6 col-md-6">
                    <form action="contact.php" method="POST" name="form1" class="tm-contact-form"
                        onsubmit=" return validateform()">
                        <div class="form-group">
                            <label class="form-label" for="typeName"> Name</label>
                            <input type="text" id="contact_name" class="form-control" id="name" name="name" />


                            <div id="m1"></div> <br />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="typeName">Email</label>
                            <input type="email" id="contact_email" class="form-control" name="email" required />
                            <div id="m2"></div><br />

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="typeName">Subject</label>
                            <input type="text" id="contact_subject" class="form-control" id="subject" name="subject"
                                required />
                            <div id="m3"></div><br />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="typeName">Message</label>
                            <textarea id="contact_message" class="form-control" rows="6" name="message"></textarea>
                            <div id="m4"></div> <br />
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-danger btn-block btn-lg " name="submit"
                                onclick="ValidateEmail(document.form1.email)">Send message</button> <br />
                        </div>


                    </form>
                </div>

            </div>
        </div>


        </div>
    </section>
    <script>


        //js user input validation
        function ValidateEmail(inputText) {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (inputText.value.match(mailformat)) {


                document.form1.sumbit();


                return true;
            } else {
                swal("Wrong!", "You have entered an invalid email address!", "error");



                return false;
            }
        }


        function validateform() {
            var name = document.form1.name.value;
            var subject = document.form1.subject.value;
            var message = document.form1.message.value;
            var p = subject.length < 5;
            var n = name === null || name === "";
            var m = message === null || message === "";

            if (p)
                document.getElementById("m3").innerHTML = "subject must be at least 5 characters long.";

            if (n)
                document.getElementById("m1").innerHTML = "Name can't be blank";

            if (m)
                document.getElementById("m4").innerHTML = "Message can't be blank";

            if (p || n || m)
                return false;

            else return true;

        }



        //js-event handler for clarification
        var name1 = document.getElementById("contact_name");
        name1.onfocus = function () {
            m1.innerHTML = "Enter your full name in this input box."
        };
        name1.onblur = function () {
            m1.innerHTML = ""
        };
        var email1 = document.getElementById("contact_email");
        email1.onfocus = function () {
            m2.innerHTML = "Enter your e-mail address in this input box, in the format user@domain."
        };
        email1.onblur = function () {
            m2.innerHTML = ""
        };

        var subject1 = document.getElementById("contact_subject");
        subject1.onfocus = function () {
            m3.innerHTML = "Enter your Subject in this input box"
        };
        subject1.onblur = function () {
            m3.innerHTML = ""
        };
        var Massage1 = document.getElementById("contact_message");
        Massage1.onfocus = function () {
            m4.innerHTML = "Enter your  Message in this text area box"
        };
        Massage1.onblur = function () {
            m4.innerHTML = ""
        };









    </script>



</body>

<!--footer-->
<footer class="bg-dark text-center text-white">

    <div class="container ">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-dark ">
            <div class=" d-flex align-items-center">
                <div class="row margin-bottom-60">
                    <div class="col-lg-3 col-md-3 tm-footer-div">
                        <img src="img/Picture1.png" class="fotter">
                    </div>

                    <div class="col-lg-6 col-md-6 tm-footer-div">

                        <p class="margin-top-15">A place to discover amazing products, thought-provoking ideas, and our
                            point of view on the world of
                            beauty.</p>

                    </div>
                    <div class="col-lg-3 col-md-3 tm-footer-div ">
                        <h5><a href="Adminlogin.php" class="text-white">Admin login</a></h5>


                    </div>


                </div>


            </div>


        </div>
    </div>


</footer>

</html>
