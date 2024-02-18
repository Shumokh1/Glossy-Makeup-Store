<?php
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Admin Page</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css"/>
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

                                    <div class="col">
                                        <div class="card bg-light  rounded-3 text-center ">
                                            <h4 class="py-3">
                                                Products</h4>

                                            <div class="card-body table-responsive ">
                                                <table class=" table table-hover  ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"> Product</th>
                                                            <th scope="col"> Product Name</th>
                                                            <th scope="col">price</th>
                                                            <th scope="col"> Change price?</th>
                                                            <th scope="col">Delete?</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `item`";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            // output data of content menu
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>

                                                                <tr>
                                                                    <td> <img src="img/<?php echo $row["image"]; ?>" class="bd-placeholder-img card-img-top" width="50px" height="50px" /></td>
                                                                    <th > <?php echo $row["name"]; ?></th>

                                                                    <td> <?php echo $row["price"]; ?></td>
                                                                    <td>   <button class="btn btn-danger btn-sm" onclick="changeprice(<?php echo $row['productID']; ?>);">Change price</button>
                                                                    </td>
                                                                    <td> <button class="btn btn-danger btn-sm" onclick="deleteitem(<?php echo $row['productID']; ?>);">Delete</button></td>

                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card bg-light  rounded-3 text-center ">
                                            <h4 class="py-3">
                                                orders</h4>

                                            <div class="card-body table-responsive ">
                                                <table class=" table table-hover  ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"> Order ID</th>
                                                            <th scope="col"> Customer Name</th>
                                                            <th scope="col">Address</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `order`";
                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                            // output data of content menu
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>

                                                                <tr>
                                                                    <th > <?php echo $row["orderID"]; ?></th>
                                                                    <td> <?php echo $row["Custmername"]; ?></td>
                                                                    <td> <?php echo $row["Address"]; ?></td>
                                                                 </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6" >
                                        <div class="card bg-light  rounded-3 text-center">
                                            <h4 class="py-3 ">Contact form</h4>

                                            <div class="card-body">
                                                <table class="table table-hover card-body">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col"> Subject </th>
                                                            <th scope="col">Message</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `contact`";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of content menu
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <th scope="row"> <?php echo $row["name"]; ?></th>
                                                                    <td> <?php echo $row["subject"]; ?></td>
                                                                    <td> <?php echo $row["message"]; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>
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
    <script>

        function changeprice(id) {
            var price;
            swal("Write new price:", {
                content: "input",
            })
                    .then((value) => {
                        if(value>0){
                               price = value;
                        swal("Done!", "the price has been changed successfully", "success")
                                .then((value) => {
                                    location.replace('change_price.php?id=' + id + '&price=' + price);
                  }
                                )
                        }else{
                            swal("wrong!", "the price can not be 0 or less than 0", "error");
                        }




                    });

        }


        function deleteitem(id) {
            var answer = window.confirm("Are you sure to delete the product?!?");
            if (answer) {
                location.replace('delete_product.php?id='+ id);
            }

        }
    </script>

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

                            <p class="margin-top-15">a place to discover amazing products, thought-provoking ideas, and our point of view on the world of
                                beauty.</p>

                        </div>
                        <div class="col-lg-3 col-md-3 tm-footer-div ">
                            <h5 ><a href="index.php" class="text-white">Admin logout</a></h5>


                        </div>


                    </div>


                </div>


            </div>
        </div>


    </footer>


</body>


</html>
