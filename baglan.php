<?php

$bag=mysql_connect("localhost","root","") or die (mysql_error());
$sql="CREATE DATABASE yagmur DEFAULT CHARACTER SET utf8";
$sorgula=mysql_query($sql,$bag);
if($sorgula){
echo "yagmur adında yeni bir veritabanı olusturuldu";
}
/*msq baglanti*/
$baglan = mysql_connect("localhost","root","");
$vt_Sec = mysql_select_db("yagmur", $baglan);
mysql_query("SET CHARACTER SET utf8");

//Tabloları Oluştur
mysql_select_db("yagmur");
$sorgu2 = "CREATE TABLE `uyeler` (
  `no` int(10) NOT NULL auto_increment,
  `kadi` varchar(50) NOT NULL default '',
  `sifre` varchar(100) NOT NULL default '',
  `izin` varchar(20) NOT NULL default '',
  `adi` varchar(100) default NULL,
  `eposta` varchar(255) default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;
";
$sorgu1 = "CREATE TABLE `siparisler` (
  `no` int(10) NOT NULL auto_increment,
  `kadi` varchar(50) NOT NULL default '',
  `corba` varchar(100) NOT NULL default '',
  `su` varchar(20) NOT NULL default '',
  `kola` varchar(100) default NULL,
  `soda` varchar(255) default NULL,
  `tarih` varchar(255) default NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;
";
if(mysql_query($sorgu2))
{
    echo "Üye Tablosu oluşturuldu";
}
if(mysql_query($sorgu1))
{
    echo "Ürün Tablosu oluşturuldu";
}


?>
