<?php
include("baglan.php"); 
	date_default_timezone_set('Europe/Istanbul');
	$tarih = date('d.m.Y H:i:s');
 session_start();
# uye oturum degiskenleri
  $giris_yapilmis = false;
  $uye = false;
# kontrol ederek bilgileri dogrulayalim
  if( !empty($_SESSION["giris"]) && !empty($_SESSION["kadi"]) ){
  
    # kulanici bilgisini alalim
      $sorgu = mysql_query("select * from uyeler where kadi='".$_SESSION["kadi"]."'");
      if( mysql_num_rows($sorgu) == 1 ){
      
        $uye = mysql_fetch_assoc($sorgu);
        # anahtar kontrol
          if( $_SESSION["giris"]  ==  md5( "kullanic_oturum_" . md5( $uye["sifre"] ) . "_ds785667f5e67w423yjgty" ) ){
            $giris_yapilmis = true;
          }else{
            # giris yanlis. $uye'yi silelim
            $uye = false;
          }
      }
  }

 ?>