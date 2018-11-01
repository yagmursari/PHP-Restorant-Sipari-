<?php
include("kontrol.php"); 
# mysql baglantisi, sesion_start yapilmis varsayiyoruz
# bilgiler
  $kadi  = $_POST["kadi"];
  $sifre = $_POST["sifre"];
# kullanici bilgisi alalim
  $sorgu = mysql_query("select sifre from uyeler where kadi = '".$kadi."'");
  if( mysql_num_rows($sorgu) != 1 ){
    print '<script>alert("Kullanıcı bulunamadı!");history.back(-1);</script>';
    exit;
  }else{
    # veriyi alıyoruz
      $bilgi = mysql_fetch_assoc($sorgu);
  }
# sifre eslestirmesi
  if( trim($sifre) != $bilgi["sifre"] ){
    print '<script>alert("Yanlış şifre girdiniz!");history.back(-1);</script>';
    exit;
  }
# başarılı giriş yapıldı
# oturuma kaydedip anasayfaya gidelim
  $_SESSION["giris"] = md5( "kullanic_oturum_" . md5( $bilgi["sifre"] ) . "_ds785667f5e67w423yjgty" );
  $_SESSION["kadi"]  = $kadi;
  
  ?>
  
  <script>
  alert("Başarıyla giriş yaptınız! Şimdi anasayfaya yönlendiriliyorsunuz.");
  window.top.location = './urunler.php';
</script>