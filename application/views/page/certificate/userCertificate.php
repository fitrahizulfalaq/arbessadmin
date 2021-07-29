<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CERTIFICATE OF COURSE</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet"> -->
	<style>
		@font-face {
		  font-family: 'Montserrat-Regular';
		  /*font-style: normal;*/
		  /*font-weight: normal;*/
		  src: url("assets/dist/fonts/Montserrat-Regular.ttf");
		}

		@font-face {
		  font-family: 'Montserrat-Medium';
		  /*font-style: normal;*/
		  /*font-weight: normal;*/
		  src: url("assets/dist/fonts/Montserrat-Medium.ttf");
		}

		@font-face {
		  font-family: 'Montserrat-Bold';
		  /*font-style: normal;*/
		  /*font-weight: normal;*/
		  src: url("assets/dist/fonts/Montserrat-Bold.ttf");
		}

		@font-face {
		  font-family: 'Montserrat-SemiBold';
		  /*font-style: normal;*/
		  /*font-weight: normal;*/
		  src: url("assets/dist/fonts/Montserrat-SemiBold.ttf");
		}

		@page { margin: 0px;}
		body { margin: 0px; text-align: center}
		.imgres {
			position: absolute;
			width: 795px;
		}
		.keikutsertaan {
			font-size: 22px;
			font-family:'Montserrat-Bold';
		  	position: absolute;
		  	left: 35%;
		  	top: 200px;
		  	color: black;
		}

		.nomor {
			font-family:'Montserrat-SemiBold';
		  	position: absolute;
		  	left: 45%;
		  	top: 290px;
		  	color: black;
		}

		.denganbangga {
			font-size: 22px;
			font-family:'Montserrat-Medium';
		  	position: absolute;
		  	left: 33%;
		  	top: 380px;
		  	color: black;
		}

		.name {
			font-size: 26px;
			font-family:'Montserrat-Bold';
		  	position: absolute;
		  	left: 20%;
		  	top: 450px;
		  	color: black;
		  	width: 600px;
		  	/*background-color: red;*/
		}
		
		.melaksanakan {
			font-size: 18px;
		  	line-height: 80%;
			font-family:'Montserrat-Medium';
		  	position: absolute;
		  	left: 28.5%;
		  	top: 510px;
		  	width: 470px;
		  	color: black;
		}

		.kotattd {
			font-size: 17px;
			font-family:'Montserrat-Medium';
		  	position: absolute;
		  	left: 53%;
		  	top: 720px;
		  	color: black;
		  	text-align: right;
		  	/*background-color: red;*/
		  	width: 260px;
		}

		.kepalattd {
			font-size: 17px;
		  	line-height: 80%;
			font-family:'Montserrat-Medium';
		  	position: absolute;
		  	left: 58%;
		  	top: 760px;
		  	color: black;
		  	text-align: center;
		  	/*background-color: red;*/
		}

		.namattd {
			font-size: 17px;
		  	line-height: 80%;
			font-family:'Montserrat-SemiBold';
		  	position: absolute;
		  	left: 54%;
		  	top: 900px;
		  	color: black;
		  	text-align: center;
		  	width: 350px;
		  	/*background-color: red;*/
		  	text-decoration: underline;
		}

		.nipttd {
			font-size: 16px;
		  	line-height: 80%;
			font-family:'Montserrat-Medium';
		  	position: absolute;
		  	left: 54%;
		  	top: 922px;
		  	color: black;
		  	text-align: center;
		  	width: 350px;
		  	/*background-color: red;*/
		}

	</style>
</head>
<body>
	<img src="assets/dist/img/certificate/userCertificate.png" class="imgres">
	<div class="keikutsertaan">Keanggotaan Aliansi Petani Indonesia</div>
	<div class="nomor">No Anggota : <?= $no_anggota ?></div>
	<div class="denganbangga">Dengan bangga diberikan kepada :</div>
	<div class="name"><?= $nama ?></div>
	<div class="melaksanakan">sebagai Anggota Aliansi Petani Indonesia</div>
	<div class="kotattd">Malang, 20 Oktober 2020</div>
	<div class="kepalattd">Ketua Aliansi Petani Indonesia</div>
	<div class="namattd"><?= $ketua?></div>
	<div class="nipttd"></div>	
</body>
</html>