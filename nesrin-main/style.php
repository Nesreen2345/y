<!DOCTYPE html>
<html>
<head>
<title>LOGIN</title>
<!--<link rel="stylesheet" type="text/css"href="style.css">-->
<style madia="screen">
*;
*:defore,
*:after{
padding:0;
margin:=0;
box-sizing:border-box;
}
body{
background-color:#f28093;
}
.background{
	width:430px;
	height:520px;
	position:absolute;
	transform:translate(-50%,-50%);
	left:50%;
	top:50%
}
.bakground .shape{
height:200px;
width:200px;
position:absolute;
border-radius:50;
}
.shape:first-child{
	bakground:linear-gradient(
#191A1E;
#191A1E
	);
	left:-80px;
	top:-80px;
}
.shape:last-child{
	bakground:linear-gradient(
		to right,
		#CAD4B9,
		#d9e2efF
	);
	right:-30px;
	bottom:-80px;
}
from{
	height:540px;
	bottom:-500px;
	background-color: white (255,255,255,0.13);
position:absolute;
transform: translate (-50%,-50%);
top: 50%;
left:50%;
border-radius: 10px;
backdrop-filter:blur(10px);
border:2px solid rgba(255,255,255,0.1);
box-shadow: 0 0 40px rgba(8,7,16,0.6);
padding: 50px 35px;
}
form *{
font-family: ‘Poppins’,sans-serif;
color:#CBCEDB;
letter-spacing:0.5px;
outline: none;
border: none;
}
form h3{
font-size:32px;
font-weight: 500;
line-height:42px;
text-align: centre;
}

label{
display:block;
margin-top:30px;
margin-top: 16px;
font-weight: 500;
}
input{
display:block;
height : 50px;
width: 100%;
background-color:rgba(255,255,255,0,07);
border-radius: 3px;
padding:0 10px;
margin-top:14px;
font -weight:300;
}
::placeholder{

	color: #E6CCD0;
	
	}
	
	button{
	
	margin-top: 50px;
	
	width: 100%;
	
	background-color: #ffffff;
	
	color: #CBCEDB; padding: 15px 0;
	
	font-size: 18px;
	
	font-weight: 600;
	
	border-radius: 5px;
	
	cursor: pointer;
	
	}
	
	.social{
	
	margin-top: 30px;
	
	display: flex;
	
	}
	
	.social diví
	
	background: red;
	
	
	width: 150px;
	
	border-radius: 3px; padding: 5px 10px 10px 5px;
	
	background-color: rgba(255,255,255,0.27); color: #E6CCD0
	width: 150px;

border-radius: 3px; 
padding: 5px

10px 10px 5px;

background-color: rgba(255,255,255,0.27);

color: #E6CCD0;

text-align: center;

}
.social div:hover{ background-color: rgba(255,255,255,0.47);

} .social fb{

margin-left:

25px;
.social if

margin-right: 4px;

</style>

</head> <body>

<form action="login.php" method="post">

<h2/> تسجيل دخول <h2> <?php if (isset($_GET['error])) { ?>

<p class="error"><?php echo $

GET['error];

?></p>

<?php } ?>