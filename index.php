<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <style type="text/css">
          .wrapper {
              width: 1200px;
              margin: 0 auto;
          }
      </style>
  </head>
  <body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
              <h2 class="text-center">PHP CRUD Tutorial Example with <a href="https://codingdriver.com/">Coding Driver</a></h2>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">List of Products</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Product</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all users
                    $data = "SELECT * FROM products";
                    if($products = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($products) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Item Code</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Stocks</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($product = mysqli_fetch_array($products)) {
                                    echo "<tr>
                                            <td>" . $product['id'] . "</td>
                                            <td>" . $product['item_code'] . "</td>
                                            <td>" . $product['product_name'] . "</td>
                                            <td>" . $product['price'] . "</td>
                                            <td>" . $product['stocks'] . "</td>
                                            <td>
                                              <a href='read.php?id=". $product['id'] ."' title='View Products' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=". $product['id'] ."' title='Edit Products' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=". $product['id'] ."' title='Delete Products' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($products);
                        } else{
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>