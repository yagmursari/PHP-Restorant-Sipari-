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
			<div class="col-md-offset-3 col-md-6">
			
<?php if(isset($_SESSION["giris"])){ ?>

<p> <?php echo $_SESSION["kadi"]; ?> olarak giriş yapıldı. Yeni kayıt oluşturmak için <a href="cikis.php">çıkış</a> yapınız.</p>
<?php } else { ?>
<?php		
if ($_POST){
	$kadi = htmlentities($_POST["kadi"]);
	$sifre = htmlentities($_POST["sifre"]);
	$eposta = htmlentities($_POST["eposta"]);
	$isim = htmlentities($_POST["isim"]);
	
	$sorgu = mysql_query("select * from uyeler where kadi='".$kadi."'");
	$kayitli = mysql_fetch_array($sorgu);
	
	 if( $kadi && $sifre && $eposta){	  
		 if($kadi != $kayitli['kadi']){
			$ekle = mysql_query("insert into uyeler (kadi,sifre,eposta,adi) values ('$kadi','$sifre','$eposta','$isim')");
			if($ekle){
				echo '<p style="text-align:center;">'.$kadi.' Kullanıcı Başarıyla Kayıt Edildi 5 Saniye Sonra <a href="index.php">Giriş </a>Sayfasına Yönlendiriliyorsunuz</p>';
				header ("refresh:5;url=index.php"); 
			}
		}else{
			echo '<p style="text-align:center;">'.$kadi.' Kullanıcı adı Başka bir kullanıcı tarafından kullanılmaktadır</p>';
		}
	 }
}

?>
				<form name="giris" action="kayit.php" method="post" class="row">
					<h1 style="text-align:center;"> Kayıt olun</h1>
					 <div class="col-md-12 form-group">
						 <label>Kullanıcı Adı</label>
						 <input type="text" class="form-control" name="kadi" required>
					 </div>
					 
					 <div class="col-md-12 form-group">
						 <label>Şifre</label>
						 <td><input type="password" class="form-control"  name="sifre" required>
					 </div>
					 
					 <div class="col-md-12 form-group">
						 <label>E-Posta</label>
						 <input type="email" class="form-control" name="eposta" required>
					 </div>
					 
					 <div class="col-md-12 form-group">
						 <label>İsim</label>
						 <input type="text" class="form-control" name="isim">
					 </div>
					 
					 <div class="col-md-12 form-group text-right">
						  <input type="submit" value="Kayıt Ol" class="btn">
					 </div>
				</form>
<?php } ?>
			</div>	
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>

