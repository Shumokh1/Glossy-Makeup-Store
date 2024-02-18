<?php
session_start(); //session is already opened in products.php
?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Cart</title>
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
            //php-user input validation
            if (empty($_POST['typeName']) && empty($_POST['address'])) {
                echo 'swal("Wrong!", "Empty inputs", "error");</script>';




            } else if (empty($_SESSION['cart'])) {
                echo 'swal("Wrong!", "You can not complete the order! your cart is empty!", "error");</script>';


            } else {
                $name = $_POST['typeName'];
                $address = $_POST['address'];

                $sql = "INSERT INTO `order`(`Custmername`, `Address`) VALUES ('" . $name . "' ,'" . $address . "')";
                echo $sql;
                $conn->query($sql);
                $sql1 = "SELECT `orderID` FROM `order` WHERE `Custmername` = '" . $name . "' ORDER BY `orderID` DESC LIMIT 1";//for arranging
                $result1 = $conn->query($sql1);
                $id;
                while ($row = $result1->fetch_assoc()) {
                    $id = $row['orderID'];
                } //we got the orderid and saved it in id variable
                $index1 = 0;
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {//for loop 
                    $itemid = $_SESSION['cart'][$i];

                    $additem = "INSERT INTO `orderitem`(`orderID`, `productID`) VALUES ('" . $id . "','" . $itemid . "')";//relation tables; insert into orderitem table the orderid and product id as much product there is
                    $conn->query($additem);
                    $index1++;
                }
                unset($_SESSION['cart']); //unset the session after you send data to sql
                header('location: confirmation_order.php');
            }
        }
        ?>
    <section class="part1">
        <div class="navbar">
            <img src="img/Picture1.png" class="logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="Products.php">Products</a></li>
                <li><a href="cart.php" class="active">cart</a></li>
                <li><a href="Contact.php">Contact</a></li>
            </ul>
        </div>
    </section>

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body ">

                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 class="mb-3"><a href="#!" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Cart</a></h5>
                                    <hr>



                                    <?php
                                        //initialize total
                                        $total = 0;
                                        if (!empty($_SESSION['cart'])) {

                                            //connection
                                            include_once "DBconnection.php";//to get all info of products 

                                            $sql = "SELECT * FROM item WHERE productID IN (" . implode(',', $_SESSION['cart']) . ")";//get the rest of the info of the product in session
                                            $query = $conn->query($sql);
                                        ?>
                                    <p> you have
                                        <?php echo count($_SESSION['cart']); ?> item in your cart
                                    </p>
                                    <?php
                                            while ($row = $query->fetch_assoc()) {
                                            ?>

                                    <div class="card mb-3 ">

                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img src="img/<?php echo $row["image"]; ?>"
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5>
                                                            <?php echo $row['name']; ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">

                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">
                                                            <?php echo number_format($row['price'], 2); ?>

                                                        </h5>
                                                    </div>
                                                    <?php $total += $row['price']; ?>

                                                    <a href="delete_cart.php?id=<?php echo $row['productID']; ?>"
                                                        class="btn btn-danger btn-sm"><span
                                                            class="glyphicon glyphicon-trash"></span> delete </a>
                                                    <a href="#!" style="color: #cecece;"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                            }
                                        } else {
                                                ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No Item in Cart</td>
                                    </tr>
                                    <?php
                                        }
                                            ?>


                                </div>
                                <div class="col-lg-4">

                                    <div class="card bg-light  rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Shipping Address</h5>

                                            </div>



                                            <form class="mt-4" method="post" name="form1" action="cart.php"
                                                onsubmit=" return validateform()">
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeName">Name</label>
                                                    <input type="text" id="typeName" name="typeName"
                                                        class="form-control form-control-lg" siez="17" />
                                                    <div id="m1"></div> <br />

                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label" for="typeText">Address</label>
                                                    <input type="text" id="address" name="address"
                                                        class="form-control form-control-lg" siez="17" />
                                                    <div id="m2"></div> <br />

                                                </div>


                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Subtotal</p>
                                                    <p class="mb-2">$
                                                        <?php echo number_format($total, 2); ?>
                                                    </p>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Shipping</p>
                                                    <p class="mb-2">$20.00</p>
                                                </div>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <p class="mb-2">Total</p>
                                                    <p class="mb-2">$
                                                        <?php echo number_format($total + 20, 2); ?>
                                                    </p>
                                                </div>

                                                <div class="form-group text-center">
                                                    <button class="btn btn-danger btn-block btn-lg "
                                                        name="submit">Order</button> <br />
                                                </div>


                                            </form>
                                            <script>
                                                //js user input validation
                                                var name1 = document.getElementById("typeName");
                                                name1.onfocus = function () {
                                                    m1.innerHTML = ""
                                                };
                                                var address1 = document.getElementById("address");
                                                address1.onfocus = function () {
                                                    m2.innerHTML = ""
                                                };
                                                function validateform() {
                                                    var name = document.form1.typeName.value;
                                                    var address = document.form1.address.value;
                                                    var p = address.length < 19;
                                                    var n = name === null || name === "";
                                                    if (p)
                                                        document.getElementById("m2").innerHTML = "Address must be at least 19 characters long.";

                                                    if (n)
                                                        document.getElementById("m1").innerHTML = "Name can't be blank";


                                                    if (p || n)
                                                        return false;

                                                    else return true;

                                                }


                                            </script>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

                            <p class="margin-top-15">A place to discover amazing products, thought-provoking ideas, and
                                our point of view on the world of
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


</body>



</html>