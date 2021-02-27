<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q==" crossorigin="anonymous" />
<?php
session_start();
require 'config.php';
if(isset($_POST['mid'])){
	$mid = $_POST['mid'];
	$mname = $_POST['mname'];
	$mprice = $_POST['mprice'];
	$mimage = $_POST['mimage'];
	$mcode = $_POST['mcode'];
	$mqty = 1;

$stmt = $conn->prepare("SELECT medicine_code FROM cart WHERE medicine_code=?");
$stmt->bind_param("s",$mcode);
$stmt->execute();
$res = $stmt->get_result();
$r=$res->fetch_assoc();
$code=$r['medicine_code'];

if(!$code){
	$query=$conn->prepare("INSERT INTO cart(medicine_name,medicine_price,medicine_image,qty,total_price,medicine_code)VALUES (?,?,?,?,?,?)");
	$query->bind_param("sssiss",$mname,$mprice,$mimage,$mqty,$mprice,$mcode);
	$query->execute();

	echo '<div class="alert alert-success alert-dismissible mt-2">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Item added to your cart!</strong>
         </div>';
}
else{
echo '<div class="alert alert-danger alert-dismissible mt-2">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Item already added to your cart!</strong>
         </div>';
}
}
if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart-item'){
	$stmt = $conn->prepare("SELECT * FROM cart");
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;
	echo $rows;
}
if(isset($_GET['remove'])){
	$id=$_GET['remove'];
	$stmt=$conn->prepare("DELETE FROM cart WHERE id=?");
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$_SESSION['showAlert']='block';
	$_SESSION['message']='Item removed form cart!';
	header('location:cart.php');
}
if(isset($_GET['clear'])){
	$stmt=$conn->prepare("DELETE FROM cart");
	$stmt->execute();
	$_SESSION['showAlert']='block';
	$_SESSION['message']='All Items removed form cart!';
	header('location:cart.php');
}
if(isset($_POST['qty'])){
	$qty = $_POST['qty'];
	$mid = $_POST['mid'];
	$mprice = $_POST['mprice'];
	$tprice = $qty*$mprice;
	$stmt=$conn->prepare("UPDATE cart SET qty=?,total_price=?  WHERE id=?");
	$stmt->bind_param("isi",$qty,$tprice,$mid);
	$stmt->execute();
}
if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$medicines = $_POST['medicines'];
	$grand_total = $_POST['grand_total'];
	$address = $_POST['address'];
	$pmode = $_POST['pmode'];
	$data = '';

	$stmt=$conn->prepare("INSERT INTO orders (name,email,phone,address,pmode,medicines,amount_paid)VALUES(?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssss",$name,$email,$phone,$address,$pmode,$medicines,$grand_total);
	$stmt->execute();
	$data .= '<div class="text-center"><h1 class="display-4 mt-2 text-primary"> Thank You for Shopping!</h1>
<h2 class="text-success">Your Order is Placed Successfully<i class="fa fa-check-circle" style="font-size:48px;color:green"></i>
</h2>
<h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$medicines.'</h4>
<table border="1px solid black">
<tr>
<th>Your Name</th>
<th>Your E-mail</th>
<th>Your Phone</th>
<th>Total Amount paid</th>
<th>Payment Mode</th>
</tr>
<tr>
<td>'.$name.'</td>
<td>'.$email.'</td>
<td>'.$phone.'</td>
<td>'.number_format($grand_total,2).'</td>
<td>'.$pmode.'</td>
</tr>
</table>
</div>';
	echo $data;
}

?>


