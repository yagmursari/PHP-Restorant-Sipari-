<?php include("kontrol.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yagmur'un Sitesi</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

  </head>
  <body>
  <div class="container">
	<div class="row">
		<div class="col-md-4">
			<a href="index.php" class="logo"><img src="assets\img\koz.png" /></a>
		</div>
	</div>
  </div>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Anasayfa</a></li>
              <li><a href="siparis.php">Siparişler</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
			<?php if(isset($_SESSION["giris"])){ ?>
			  <li><a>Hoşgeldiniz <?php echo $_SESSION["kadi"]; ?> </a></li>
              <li><a href="cikis.php">Çıkış</a></li>
			<?php } else { ?>
              <li><a href="giris-kontrol.php">Giriş</a></li>
              <li><a href="kayit.php">Kayıt</a></li>
			<?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    </div> <!-- /container -->
  
	<div class="container">
		<div class="row">

				<?php if(isset($_SESSION["giris"])){ ?>
					<?php if ($_POST){
						$corba = htmlentities($_POST["corba"]);
						$su = htmlentities($_POST["su"]);
						$kola = htmlentities($_POST["kola"]);
						$soda = htmlentities($_POST["soda"]);
					}

					?>
					<style>
						input{
							width:50px;
						}
						input.siparisver{
							width:100%;
						}

					</style>
					<form name="giris" action="urunler.php" method="post">
					<h1 style="text-align:center;">Sipariş Formu</h1>
					 <table cellpadding="8" cellspacing="0" align="center">
					   <tr>
						 <td width="100"><strong>Ürün</strong></td>
						 <td width="100"><strong>Adet</strong></td>
					   </tr>
					   <tr>
						 <td width="100">Çorba</td>
						 <td><input type="number" min="0" name="corba"></td>
					   </tr>
					   <tr>
						 <td width="100">Su</td>
						 <td><input type="number" min="0" name="su"></td>
					   </tr>
					   <tr>
						 <td width="100">Kola-Fanta</td>
						 <td><input type="number" min="0" name="kola"></td>
					   </tr>
					   <tr>
					   <tr>
						 <td width="100">Soda</td>
						 <td><input type="number" min="0" name="soda"></td>
					   </tr>
					   <tr>
						 <td colspan="2" align="right">
						   <input class="siparisver" type="submit" value="Sipariş Ver">
						 </td>
					   </tr>
					 </table>
					</form>
					<?php

					if ($_POST){
						$adet = $corba + $su + $kola + $soda;
						$kadi = $_SESSION["kadi"];
						echo '<p style="text-align:center;">Sayın '.$_SESSION["kadi"].' Toplam '.$adet.' Adet Siparişiniz Alındı</p>';
						$ekle = mysql_query("insert into siparisler (kadi,corba,su,kola,soda,tarih) values ('$kadi','$corba','$su','$kola','$soda','$tarih')");
					}	
					?>
				<?php } else { ?>
					<div class="col-md-offset-3 col-md-6">
						<form name="giris" action="giris-kontrol.php" method="post" class="row">
							 <div class="col-md-12">
								 <label>Kullanıcı Adı</label>
								 <input type="text" class="form-control" name="kadi">
							 </div>
							 
							 <div class="col-md-12 form-group">
								 <label>Şifre</label>
								 <input type="password" class="form-control" name="sifre">
							 </div>
							 
							 <div class="col-md-6 form-group">
								<a href="kayit.php" class="btn">Kayıt Ol </a>
							 </div>
							 <div class="col-md-6 form-group text-right">
									<input type="submit" value="Giriş" class="btn">
							 </div>
						</form>
					</div>
				<?php } ?>		

		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
