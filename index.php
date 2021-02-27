<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy-Destiny HealthCare</title>
<link rel="icon" href="favicon1.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q==" crossorigin="anonymous" />
</head>
<body>
	<style>
		.img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  height: 500px;
}
body{
	background-color:#f0f4f7;
}
footer{
  background-color: #e9ecef;
}
</style>
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
                <a href="index.php" class="nav-item nav-link active"><u>E-Pharmacy</u></a>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item"class="badge badge-danger"></span></a>
      </li>
    </ul>
  </div>
</nav>
<img src="https://purchasemedicineonline.in/wp-content/uploads/2019/09/Buy-Medicine-Online-in-Delhi.jpg" alt="placeholder 960" class="img" />

<div class="container">
	<h1 class="text-center mt-3">Health & SkinCare</h1><hr>
	<div id="message"></div>
	<div class="row mt-5 pb-3">
		<?php 
include 'config.php';
$stmt = $conn->prepare("SELECT * FROM medicines");
$stmt->execute();
$result=$stmt->get_result();
while ($row =$result->fetch_assoc()): 
		?>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
			<div class="card-deck">
				<div class="card p-2 border-secondary mb-2">
					<img src="<?= $row['medicine_image'] ?>" class="card-img-top" height="250">
<div class="card-body p-1">
	<h4 class="card-title text-center text-info"><?=$row['medicine_name'] ?></h4>
	<h5 class="card-title text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['medicine_price'],2) ?>/-</h5>
</div>
<div class="card-footer p-1">
	<form action="" class="form-submit">
		<input type="hidden" class="mid" value="<?= $row['id']?>">
		<input type="hidden" class="mname" value="<?= $row['medicine_name']?>">
		<input type="hidden" class="mprice" value="<?= $row['medicine_price']?>">
		<input type="hidden" class="mimage" value="<?= $row['medicine_image']?>">
		<input type="hidden" class="mcode" value="<?= $row['medicine_code']?>">
		<button class="btn btn-info btn-block addItemBtn" style="background-color: green">
			<i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart
		</button>
	</form>
	
</div>					
</div>
</div>
</div>
<?php endwhile; ?>
	</div>
</div>
<footer class="page-footer font-small ">
<div>
  <!--img--><img src="img/wave.jpg" style="width: 100%">

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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
$(".addItemBtn").click(function(e){
e.preventDefault();
var $form = $(this).closest(".form-submit");
var mid=$form.find(".mid").val();
var mname=$form.find(".mname").val();
var mprice=$form.find(".mprice").val();
var mimage=$form.find(".mimage").val();
var mcode=$form.find(".mcode").val();

$.ajax({
url:'action.php',
method:'post',
data:{mid:mid,mname:mname,mprice:mprice,mimage:mimage,mcode:mcode},
success:function(response){
$("#message").html(response);
window.scrollTo(0,0);
load_cart_item_number();

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
</body>
</html>