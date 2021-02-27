function val() {
	var n=document.getElementById("name").value;
	var e=document.getElementById("email").value;
	var pwd=document.getElementById("password").value;
	var name=/^[a-zA-Z\s]+$/;
    var email=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if( n==""){
	document.getElementById("name").style.borderColor= "red";
  document.getElementById("small").innerHTML = "Enter valid name";
}
  if(e==""){
	document.getElementById("email").style.borderColor = "red";
	  document.getElementById("sma").innerHTML = "Enter valid email";

   }
    if(n.match(name) && (e.match(email))) 
      window.location.assign("index.html");
    
}
