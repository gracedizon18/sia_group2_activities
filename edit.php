<?php
require_once "config.php";

$item_code = $product_name = $price = $stocks = "";
$item_code_error = $product_name_error = $price_error = $stocks_error = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $id = $_POST["id"];

        $item_code = trim($_POST["item_code"]);
        if (empty($item_code)) {
            $item_code_error = "Item Code is required.";
        } else {
            $item_code = $item_code;
        }

        $product_name = trim($_POST["product_name"]);

        if (empty($product_name)) {
            $product_name_error = "Product Name is required.";
        } else {
            $product_name = $product_name;
        }

        $price = trim($_POST["price"]);
        if (empty($price)) {
            $price_error = "Price is required.";
        } else {
            $price = $price;
        }

        $stocks = trim($_POST["stocks"]);
        if (empty($stocks)){
            $stocks_error = "Stocks is required.";
        } else {
            $stocks = $stocks;
        }


    if (empty($item_code_error_err) && empty($product_name_error) &&
        empty($price_error) && empty($stocks_error) ) {

          $sql = "UPDATE `products` SET `item_code`= '$item_code', `product_name`= '$product_name', `price`= '$price', `stocks`= '$stocks' WHERE id='$id'";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
              echo "Something went wrong. Please try again later.";
          }

    }

    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM products WHERE ID = '$id'");

        if ($product = mysqli_fetch_assoc($query)) {
            $item_code   = $product["item_code"];
            $product_name    = $product["product_name"];
            $price       = $product["price"];
            $stocks = $product["stocks"];
        } else {
            echo "Something went wrong. Please try again later.";
            header("location: edit.php");
            exit();
        }
        mysqli_close($conn);
    }  else {
        echo "Something went wrong. Please try again later.";
        header("location: edit.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Product</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group <?php echo (!empty($item_code_error)) ? 'has-error' : ''; ?>">
                            <label>Item Code</label>
                            <input type="text" name="item_code" class="form-control" value="<?php echo $item_code; ?>">
                            <span class="help-block"><?php echo $item_code_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($product_name_error)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="<?php echo $product_name; ?>">
                            <span class="help-block"><?php echo $product_name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_error)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($stocks_error)) ? 'has-error' : ''; ?>">
                            <label>Stocks</label>
                            <input type="text" name="stocks" class="form-control" value="<?php echo $stocks; ?>">
                            <span class="help-block"><?php echo $stocks_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>