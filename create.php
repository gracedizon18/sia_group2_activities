<?php
require_once "config.php";

$item_code = $product_name = $price = $stocks = "";
$item_code_error = $product_name_error = $price_error = $stocks_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_code = trim($_POST["item_code"]);
    if (empty($fitem_code)) {
        $item_code_error = "Item Code is required.";
    } 
    else {
        $item_code = $item_code;
    }

    $product_name = trim($_POST["product_name"]);

    if (empty($product_name)) {
        $product_name_error = "Product Name is required.";
    }
    else {
        $product_name = $product_name;
    }

    $price = trim($_POST["price"]);
    if (empty($price)) {
        $price_error = "Price is required.";
    } 
    else {
        $price = $price;
    }

    $stocks = trim($_POST["stocks"]);
    if(empty($stocks)){
        $stocks_error = "Stocks is required.";
    } else {
        $stocks = $stocks;
    }


    if (empty($item_code_error_err) && empty($product_name_error) && empty($price_error) && empty($stocks_error) ) {
          $sql = "INSERT INTO `products` (`item_code`, `product_name`, `price`, `stocks`) VALUES ('$item_code', '$product_name', '$price', '$stocks')";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
               echo "Something went wrong. Please try again later.";
          }
      }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
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
                        <h2>Create Product</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($first_name_error)) ? 'has-error' : ''; ?>">
                            <label>Item Code</label>
                            <input type="text" name="item_code" class="form-control" value="">
                            <span class="help-block"><?php echo $item_code_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($product_name_error)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="">
                            <span class="help-block"><?php echo $product_name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_error)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="price" name="price" class="form-control" value="">
                            <span class="help-block"><?php echo $price_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($phone_number_error)) ? 'has-error' : ''; ?>">
                            <label>Stocks</label>
                            <input type="text" name="stocks" class="form-control" value="">
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