    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
<style>
    td .btn {
       margin-right: 5px; 
    }

    .pid {
        display: none;
    }
</style>
<body>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form id='myForm' method="POST" action="editProduct.php">
            <input type='hidden' name='pid' id='product-pid'>
            <div class='form-group'>
                <label for="product-name">Product Name</label>
                <input type="text" class="form-control" name='name' id="product-name">
            </div>
            
            <div class='form-group'>
                <label for="product-brand">Product Brand</label>
                <input type="text" class="form-control" name='brand' id="product-brand">
            </div>
            
            <div class='form-group'>
                <label for="product-price">Product Price</label>
                <input type="text" class="form-control" name='price' id="product-price">
            </div>
            
            <div class='form-group'>
                <label for="product-qty">Product Quantity</label>
                <input type="text" class="form-control" name='qty' id="product-qty">
            </div>
            
            <button class='btn btn-success' type='submit'>Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class='container'>
    <div class='col-xs-12'>
        <table class='table table-bordered table-hover'>
            <?php
                require('conn.php');
                
                $query = "SELECT * FROM product";
                
                $result = mysqli_query($conn, $query);
                                
                if($result) {
                
                    if (mysqli_num_rows($result) > 0) {
                        // print table headers
                        echo "<thead><th>Product Name</th><th>Generic Name</th><th>Brand</th><th>Dosage</th><th>Price</th><th>Quantity</th><th>Expiry Date</th><th>Options</th></thead>";
                    }
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td class='pid'>{$row['product_id']}</td><td>{$row['name']}</td><td>{$row['brand']}</td><td>{$row['price']}</td><td>{$row['quantity']}</td>" .
                            "<td><button class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>"
                        . "</tr>";
                    }
                }
            ?>
        </table>
    </div>
</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".btn-danger").on("click", function() {
        if (confirm('Are you sure you want to delete this product?')) {
            var pid = $(this).parent().siblings(".pid").text();
            var par = $(this).parent().parent();
            $.ajax({
                url: "deleteProduct.php",
                data: { id: pid },
                success: function(res) {
                    if(res == 1) {
                        $(par).fadeOut();
                    } else {
                        alert("Product deletion failed!");
                    }
                },
                type: "POST"
            });
        }
    });
    
    $('.btn-warning').on("click", function() {
        pidEditing = $(this).parent().siblings(".pid").text();
        
        var qty = $(this).parent().prev().text();
        var price = $(this).parent().prev().prev().text();
        var brand = $(this).parent().prev().prev().prev().text();
        var name = $(this).parent().prev().prev().prev().prev().text();
        var pid = $(this).parent().prev().prev().prev().prev().prev().text();
        
        $("#myModal #product-pid").val(pid);
        $("#myModal #product-name").val(name);
        $("#myModal #product-brand").val(brand);
        $("#myModal #product-price").val(price);
        $("#myModal #product-qty").val(qty);
        $("#myModal").modal("show");
    });
});
</script>