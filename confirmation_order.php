<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>confirmation order</title>
    <link href="style.css" rel="stylesheet" type="text/css" />

    <!--to start with bootstrap you should include these 2 lines-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>


</head>

<body>




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

                <div class=" text align-items-center text-center">
                    <h4 class="p-4 ">&nbsp;Thank you for your order&nbsp;&nbsp;</h4>


                    <p>
                        Having trouble? <a href="contact.php">Contact us</a>
                    </p>
                    <p class="lead">
                        <a class="btn btn-danger btn-sm" href="index.php" role="button">Continue to homepage</a>
                    </p>

                </div>

                <div class="col-lg-6 col-md-6">

                </div>

            </div>
        </div>


        </div>
    </section>




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