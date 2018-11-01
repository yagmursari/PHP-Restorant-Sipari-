<?php
include("kontrol.php"); ?>

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
              <li><a href="giris.php">Giriş</a></li>
              <li><a href="kayit.php">Kayıt</a></li>
			<?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    </div> <!-- /container -->
  
	<div class="container">
		<div class="row">
		   <div class="col-md-12">
		   
<?php
if( !$giris_yapilmis ){
  print 'Bu sayfa üyelere özeldir! Lütfen giriş yapın!<a href="index.php">Giriş</a>';
  exit;
}
	$kadi = $_SESSION["kadi"];
	$bul = mysql_query("select * from siparisler WHERE kadi='$kadi' ORDER BY no DESC LIMIT 5");
   while($satisgrafik = mysql_fetch_array($bul)){ 
	$corba = '';
	$su = '';
	$kola = '';
	$soda = '';
	if($satisgrafik['corba']){
		$corba = '<td>'.$satisgrafik['corba'].' adet Çorba</td>';
	}
	if($satisgrafik['su']){
		$su = '<td>'.$satisgrafik['su'].' adet Su</td> ';
	}
	if($satisgrafik['kola']){
		$kola = '<td>'.$satisgrafik['kola'].' adet Kola</td>  ';
	}
	if($satisgrafik['soda']){
		$soda = '<td>'.$satisgrafik['soda'].' adet Soda</td>  ';
	}
       
        	echo '<table cellpadding="5" cellspacing="5" border="2"><tr><td><h3>Siparis Veren : </td><td><h1>'.$satisgrafik['kadi'].'</h1></td></tr>
			<tr><td><h3>Siparisler : </h3></td>'.$corba.$su.$kola.$soda.'<tr><td><h3>Siparis Tarihi</h3></td><td>'.$satisgrafik['tarih'].'</td></tr></table>';
		 }
?>

			</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>