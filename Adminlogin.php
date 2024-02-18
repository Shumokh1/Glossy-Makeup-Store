<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <title>Admin login</title>
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
            if (!empty($_POST['username']) && !empty($_POST['password'])) {

                $name = $_POST["username"];
                $pass = $_POST["password"];
                $sql = "SELECT `id`, `pass` FROM `admin` WHERE `id` = '" . $name . "' AND`pass` = '" . $pass . "'";


                $query = $conn->query($sql);

                if ($query->num_rows > 0) {

                    header('location: Admin.php');
                } else {
                    echo '<script> swal("Wrong!", "You have entered an invalid username or password! Try again", "error"); </script>';

                }
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
                    <h4 class="text-center">&nbsp;Admin Login &nbsp;&nbsp;</h4>

                </div>

                <div class="col-lg-6 col-md-6">
                    <form method="POST" action="Adminlogin.php" name="form1" class="tm-contact-form "
                        onsubmit=" return validateform()">
                        <div class="form-group">
                            <label class="form-label" for="username">UserName:</label>
                            <input type="text" id="username" class="form-control" name="username" />
                            <div id="m1"></div> <br />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="typeName">Password:</label>
                            <input type="text" id="password" class="form-control" name="password" />
                            <div id="m2"></div><br />

                        </div>


                        <div class="form-group text-center">
                            <button class="btn btn-danger btn-block btn-lg " name="submit">LOGIN</button> <br />
                        </div>


                    </form>
                </div>

            </div>
        </div>


        </div>
    </section>
    <script>
        var name1 = document.getElementById("username");
        name1.onfocus = function () {
            m1.innerHTML = ""
        };
        var pass1 = document.getElementById("password");
        pass1.onfocus = function () {
            m2.innerHTML = ""
        };
        function validateform() {
            var name = document.form1.username.value;
            var password = document.form1.password.value;
            var p = password.length < 5;
            var n = name === null || name === "";
            if (p)
                document.getElementById("m2").innerHTML = "Password must be at least 5 characters long.";

            if (n)
                document.getElementById("m1").innerHTML = "Name can't be blank";

            if (p || n)
                return false;

            else {

                return true;
            }

        }


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