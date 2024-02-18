<!DOCTYPE html>

<?php
session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) { 
    $_SESSION['cart'] = array(); //start a session if it was not set
}


?>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Products</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
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
    ?>

    <!--navbar-->
    <section class="part1">
        <div class="navbar">
            <img src="img/Picture1.png" class="logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="Products.php" class="active">Products</a></li>
                <li><a href="cart.php">cart </a></li>
                <li><a href="Contact.php">Contact</a></li>
            </ul>
        </div>
    </section>

    <!--3 cards-->
    <section class="" style="background-color: #eee;">
        <div class="container  ">
            <div class="row d-flex p-5">

                <div class=" card card-body rounded-3 col-lg-4 col-md-4 text-center  align-items-center">
                    <img src="img/locost.jpg" class="bd-placeholder-img rounded-circle " width="140" height="140">

                    <h2 class="fw-normal text-danger p-4 ">Skin Care </h2>
                    <p class="type p-3">L'Occitane en Provence is an international French retailer of body, face and
                        home
                        products. The
                        company was
                        founded in 1976 by Olivier Baussan.
                        Baussan exercised his enthusiasm for natureâ€™s most precious treasures and created a cosmetic
                        company
                        based on
                        essential oils and natural ingredients.</p>


                </div>
                <div class=" card card-body rounded-3  col-lg-4 col-md-4  align-items-center">
                    <img src="img/makeuppro.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                    <h2 class="fw-normal text-danger p-4">Make up</h2>
                    <p class="type p-3">An absolute beauty must-have, makeup can be your best friend! An
                        incredible
                        selection of cosmetics
                        for a
                        fresh-looking complexion, vibrant lips or smoky eyes is waiting for you. Let your
                        imagination go
                        wild and try
                        an infinite variety of different looks!
                        Best-sellers or new arrivals, Glossry puts the fun back in makeup
                    </p>

                </div>
                <div class=" card card-body rounded-3  col-lg-4 col-md-4  align-items-center text-center">
                    <img src="img/perfum.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140">
                    <h2 class="fw-normal text-danger p-4">Perfumes</h2>
                    <p class="type p-3">
                        Discover many perfumes which manufactured handcrafted in France using the most luxurious
                        ingredients. Inspired
                        by the rich heritage and simple sophistication of the Middle East. Perfumes that we
                        offer reflects
                        limitless
                        possibilities,
                        personalities and desires to celebrate and enhance oneâ€™s infinite layers.</p>

                </div>
            </div>
        </div>
    </section>

    <!--print the products card from sql-->
    <section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class=" text align-items-center ">
                    <h4 class="text-center text-danger">&nbsp; Products &nbsp;&nbsp;</h4>

                </div><br />

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    $sql = "SELECT * FROM item";

                    $result = $conn->query($sql);//save the data of all items in variable result

                    if ($result->num_rows > 0) {//if there is records 

                    
                        //fetch in data and print it row by row->print the cards as many times as items in database
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col">
                        <div class="card shadow-sm">

                            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;"
                                align="center">
                                <img src="img/<?php echo $row["image"]; ?>" class="bd-placeholder-img card-img-top"
                                    width="100%" height="225" /><br />
                                <div class="card-body">
                                    <p class="card-text">
                                        <?php echo $row["name"]; ?>
                                    </p>
                                    <h4 class="text-danger">$
                                        <?php echo $row["price"]; ?>
                                    </h4>
                                    <a href="add_cart.php?id=<?php echo $row['productID']; ?>"
                                        class="btn btn-danger btn-sm">Add to Cart</a> <!--it will save it in session-> open add_cart.php and send with it the product id-->


                                </div>
                            </div>



                        </div>


                    </div>
                    <?php
                        }
                    }
                    ?>
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