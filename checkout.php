<?php
require 'config.php';
$grand_total =0;
$allItems='';
$items = array();
$sql="SELECT CONCAT(medicine_name,'(',qty,')') AS ItemQty,total_price FROM cart ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
	$grand_total +=$row['total_price'];
	$items[] = $row['ItemQty'];
}
$allItems = implode(", ",$items);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout-Destiny HealthCare</title>

<link rel="icon" href="favicon1.ico">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q==" crossorigin="anonymous" />
</head>
<body>
	<nav class="navbar navbar-expand-md bg-light navbar-light">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><img src="img/doc.svg" height="35" alt="Destiny logo">Destiny HealthCare</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
    <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="index.php" class="nav-item nav-link active">E-Pharmacy</a>
    
      <li class="nav-item">
        <a class="nav-link active" href="checkout.php"><u>Checkout</u></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item"class="badge badge-danger"></span></a>
      </li>
    </ul>
  </div>
</nav>
<div>
  <!--img--><img src="img/chtop.jpg" style="width: 100%">

</div>
<div class="container">

	<div class="row justify-content-center">
		<div class="col-lg-6 px-4 pb-4" id="order">
			<h4 class="text-center text-info p-2">Complete your order!</h4>
			<div class="jumbotron p-3 mb-2 text-center">
				<h6 class="lead"><b>Medicine(s) : </b><?= $allItems; ?></h6>
				<h6 class="lead"><b>Delivery Charge :</b>Free</h6>
				<h5><b>Total Amount Payable : </b><?= number_format($grand_total,2)?>/-</h5>
			</div>
			<form action="" method="post" id="placeOrder">
				<input type="hidden" name="medicines" value="<?= $allItems;?>">
				<input type="hidden" name="grand_total" value="<?= $grand_total;?>">
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Enter E-mail" required>
				</div>
				<div class="form-group">
					<input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
				</div>
				<div class="form-group">
					<textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
				</div>
          <h6 class="text-center lead">Select Payment Mode</h6>
            <div class="form-group">
		<select name="pmode" class="form-control">
			<option value="" selected disabled>-Select Payment Mode-</option>
			<option value="COD">Cash On Delivery</option>
			<option value="netbanking">Net Banking</option>
			<option value="card">Debit/Credit Card</option>
		</select>
				</div>
<div class="form-group">
	<input type="submit" name="submit" value="Place Order" class="btn btn-success btn-block">
</div>


			</form>
		</div>
	</div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#placeOrder").submit(function(e){
             e.preventDefault();
             $.ajax({
url:'action.php',
method:'post',
data:$('form').serialize()+"&action=order",
success:function(response){
	$("#order").html(response);
}
             });
		});
load_cart_item_number();
function load_cart_item_number(){
$.ajax({
url:'action.php',
method:'get',
data:{cartItem:"cart_item"},
success:function(response){
	$("#cart-item").html(response);
}
});
}
	});
</script>
<!-- Footer -->
<footer class="page-footer font-small ">
<div>
  <!--img--><img src="img/chbot.jpg" style="width: 100%">

</div>
  <div style="background-color: #3fb2de;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Get connected with us on social networks!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Destiny healthCare</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 180px;">
        <p>Established in 1990,We are here to make sure you are healthy and safe!Do visit us for any health concerns.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Resources</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 120px;">
        <p>
          <a href="#!">Hospital Billing & Financial Services</a>
        </p>
        <p>
          <a href="#!">For Patients & Families
</a>
        </p>
        <p>
          <a href="#!">For Providers</a>
        </p>
        <p>
          <a href="#!">Patient Portal</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Careers</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 120px;">
        <p>
          <a href="#!">Join Our Team</a>
        </p>
        <p>
          <a href="#!">Existing Associates</a>
        </p>
        <p>
          <a href="#!">Education & Training</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 120px;">
        <p>
          <i class="fas fa-home mr-3"></i> India, Germany , US</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> mail@example.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> DestinyHealthCare.com</a>
  </div>
  <!-- Copyright -->

</footer>
</body>
</html>