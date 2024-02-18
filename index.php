<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Makeup</title>
    <link href="style.css" rel="stylesheet" type="text/css" />

    <!--to start with bootstrap you should include these 2 lines-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

</head>

<body>
    <section>
        <!--navbar-->
        <div class="banner">
            <div class="navbar">
                <img src="img/Picture1.png" class="logo">
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="Products.php">Products</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                </ul>
            </div>

            <!--body-->
            <div class="content">
                <h1>Welcome to Glossy store</h1>
                <p>A place to discover amazing products, thought-provoking ideas, and our point of view on the world of
                    beauty.
                </p>

                <div>
                    <a href="#Aboutus" class="abutton"><span></span>Learn more</a>
                </div>
            </div>

        </div>
    </section>

    <!------About us----------->
    <section class="info">
        
        <div class="container">
        <div class="row">
        <h1 id="Aboutus">About us</h1>
            <div class="col-md-6 col-10 mb-3 justify p-4">
                <p>
                    Discover the latest beauty at Glossy!
                    We offer a full spectrum of colors from classical to the latest trends.
                    We create a world of colors and we want to share it with you.
                    From our unique color cosmetics to our innovative skincare products we bring makeup and skincare to
                    a new
                    level.
                </p>
                <p>
                    It's our mission to redefine luxury beauty by creating amazing products at prices that don't break
                    the bank. We imagine, develop,
                    test and manufacture all under one roof for next level colour + formulas. We pride ourselves on
                    being 100% cruelty-free,
                    wallet-friendly and keeping our community at the center of our world.
                </p>
            </div>
            <div class="col-md-6 col-10 mb-3 justify">
                <img src="img/makeup1.png" class="rounded float-end" alt="makeup" width="400px">
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