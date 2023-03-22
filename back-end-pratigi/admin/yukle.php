<?php
require_once "baglanti.php";

ob_start();
session_start();


if (isset($_POST["ayarkaydet"])) {


    $baslik = @$_POST["baslik"];
    $aciklama = @$_POST["aciklama"];
    $anahtar = @$_POST["anahtar"];
    $mail = @$_POST["mail"];
    $adres = @$_POST["adres"];
    $tel = @$_POST["tel"];
    $whatsapp = @$_POST["whatsapp"];
    $facebook = @$_POST["facebook"];
    $twitter = @$_POST["twitter"];


    $ayarkaydet = $baglan->prepare("UPDATE ayarlar SET  
    
        baslik=?,
        aciklama=?,
        anahtar=?,
        mail=?,
        adres=?,
        tel=?,
        wp=?,
        face=?,
        twt=?
    
    
    where id=1
    
    
    ");

    $update = $ayarkaydet->execute(array(

        $baslik,
        $aciklama,
        $anahtar,
        $mail,
        $adres,
        $tel,
        $whatsapp,
        $facebook,
        $twitter


    ));
    if ($update) {
        header("Location:ayarlar.php?durum=ok");
    } else {
        header("Location:ayarlar.php?durum=no");
    }
}

if (isset($_POST["hakkimizdakaydet"])) {



    $Hbaslik = @$_POST["baslik"];
    $Haciklama = @$_POST["aciklama"];
    $Hvizyon = @$_POST["vizyon"];
    $Hmisyon = @$_POST["misyon"];


    $hakkimizdakaydet = $baglan->prepare("UPDATE hakkimizda SET
    hakkimizda_baslik=?,
    hakkimizda_aciklama=?,
    hakkimizda_vizyon=?,
    hakkimizda_misyon=?
    where hakkimizda_id=1


    ");
    $update = $hakkimizdakaydet->execute(array(

        $Hbaslik,
        $Haciklama,
        $Hvizyon,
        $Hmisyon


    ));


    if ($update) {
        header("Location:hakkimizda.php?durum=ok");
    } else {
        header("Location:hakkimizda.php?durum=no");
    }
}

// -------------






if (isset($_POST["kategorikaydet"])) {
    $baslik = @$_POST["baslik"];
    $sira = @$_POST["sira"];

    $kategoriekle = $baglan->prepare("INSERT INTO kategori SET 
    
    kategori_baslik=?,
    kategori_sira=?
    ");
    $insert = $kategoriekle->execute(array(
        $baslik,
        $sira


    ));

    if ($insert) {
        header("Location:kategoriler.php?durum=ok");
    } else {
        header("Location:kategoriler.php?durum=no");
    }
}

if (isset($_POST["kategoriduzenle"])) {



    $baslik = @$_POST["baslik"];
    $sira = @$_POST["sira"];
    $id = htmlspecialchars($_POST["katid"]);



    $kategorikaydet = $baglan->prepare("UPDATE kategori SET
    kategori_baslik=?,
    kategori_sira=?
  
    where kategori_id=$id


    ");
    $update = $kategorikaydet->execute(array(

        $baslik,  $sira



    ));


    if ($update) {
        header("Location:kategoriler.php?durum=ok");
    } else {
        header("Location:kategoriler.php?durum=no");
    }
}


if (isset($_GET["kategorisil"])) {
    $id = $_GET["id"];


    $sil = $baglan->prepare("DELETE FROM kategori  WHERE kategori_id=$id");
    $delete = $sil->execute();

    if ($delete) {
        header("Location:kategoriler.php?durum=ok");
    } else {
        header("Location:kategoriler.php?durum=no");
    }
}


// -----------------



if (isset($_POST["altkategorikaydet"])) {
    $baslik = @$_POST["baslik"];
    $sira = @$_POST["sira"];
    $katid = @$_POST["katid"];

    $altkategoriekle = $baglan->prepare("INSERT INTO altkategori SET 
    
    alt_baslik=?,
    alt_sira=?,
    kategori_id=?
    ");
    $insert = $altkategoriekle->execute(array(
        $baslik,
        $sira,
        $katid
    ));

    if ($insert) {
        header("Location:alt-kategori.php?katid=$katid&durum=ok");
    } else {
        header("Location:alt-kategori.php?katid=$katid&durum=no");
    }
}



if (isset($_POST["altkategoriduzenle"])) {



    $baslik = @$_POST["baslik"];
    $sira = @$_POST["sira"];
    $id = htmlspecialchars($_POST["id"]);
    $katid = @$_POST["katid"];




    $kategorikaydet = $baglan->prepare("UPDATE altkategori SET
    alt_baslik=?,
    alt_sira=?
  
    where id=$id


    ");
    $update = $kategorikaydet->execute(array(

        $baslik,  $sira



    ));


    if ($update) {
        header("Location:alt-kategori.php?katid=$katid&durum=ok");
    } else {
        header("Location:alt-kategori.php?katid=$katid&durum=no");
    }
}

if (isset($_GET["altkategorisil"])) {
    $id = $_GET["id"];
    $katid = $_GET["katid"];


    $sil = $baglan->prepare("DELETE FROM altkategori  WHERE id=$id");
    $delete = $sil->execute();

    if ($delete) {
        header("Location:alt-kategori.php?katid=$katid&durum=ok");
    } else {
        header("Location:alt-kategori.php?katid=$katid&durum=no");
    }
}

// *------------------------

if (isset($_POST["galerikaydet"])) {

    $sira = $_POST["sira"];
    $uploads_dir = '../resimler/galeri';
    @$tmp_name = $_FILES['resim']["tmp_name"];
    @$name = $_FILES['resim']['name'];
    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $altkategoriekle = $baglan->prepare("INSERT INTO galeri SET 
    
    sira=?,
    resim=?
   
    ");
    $insert = $altkategoriekle->execute(array(

        $sira,
        $resimadi

    ));

    if ($insert) {
        header("Location:galeri.php?&durum=ok");
    } else {
        header("Location:galeri.php?&durum=no");
    }
}


if (isset($_POST["galeriduzenle"])) {
    if($_FILES["resim"] ["size"] > 0 ) {

   



    $sira = @$_POST["sira"];
    $id = htmlspecialchars($_POST["id"]);
   


    $uploads_dir = '../resimler/galeri';
    @$tmp_name = $_FILES['resim']["tmp_name"];
    @$name = $_FILES['resim']['name'];
    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


   




    $galerikaydet = $baglan->prepare("UPDATE galeri SET
    resim=?,
    sira=?
  
    where id=$id


    ");
    $update = $galerikaydet->execute(array(

        $resimadi,  $sira



    ));
 

    if ($update) {
        $sil=$_POST["eskiresim"];
        unlink("../resimler/galeri/$sil");
        header("Location:galeri.php?durum=ok");
    } else {
        header("Location:galeri.php?durum=no");
    }
}
else {
    
    $sira = @$_POST["sira"];
    $id = htmlspecialchars($_POST["id"]);

    $galerikaydet = $baglan->prepare("UPDATE galeri SET
    
    sira=?
  
    where id=$id


    ");
    $update = $galerikaydet->execute(array(

         $sira



    ));


    if ($update) {
        header("Location:galeri.php?durum=ok");
    } else {
        header("Location:galeri.php?durum=no");
    }
}
}


if (isset($_POST["galerisil"])) {
    $id = $_POST["id"];
   $resim=$_POST["resim"];


    $sil = $baglan->prepare("DELETE FROM galeri  WHERE id=?");
    $delete = $sil->execute(array(
        $id
    ));

    if ($delete) {
       
        unlink("../resimler/galeri/$resim");
        header("Location:galeri.php?durum=ok");
    } else {
        header("Location:galeri.php?durum=no");
    }
}
// ------------------


if (isset($_POST["urunkaydet"])) {

    $sira = $_POST["sira"];
    $baslik = $_POST["baslik"];
    $aciklama = $_POST["aciklama"];
    $fiyat = $_POST["fiyat"];
    $altid = $_POST["altid"];



    $uploads_dir = '../resimler/urunler';
    @$tmp_name = $_FILES['resim']["tmp_name"];
    @$name = $_FILES['resim']['name'];
    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $urunekle = $baglan->prepare("INSERT INTO urunler SET 
    
    sira=?,
    resim=?,
    baslik=?,
    aciklama=?,
    fiyat=?,
    altkat_id=?
   
    ");
    $insert = $urunekle->execute(array(

        $sira,
        $resimadi,
        $baslik,
        $aciklama,
        $fiyat,
        $altid

    ));

    if ($insert) {
        header("Location:urunler.php?altid=$altid&durum=ok");
    } else {
        header("Location:urunler.php?altid=$altid&durum=no");
    }
}


if (isset($_POST["urunduzenle"])) {
    if($_FILES["resim"] ["size"] > 0 ) {

   



    $sira = @$_POST["sira"];
    $baslik = @$_POST["baslik"];
    $fiyat = @$_POST["fiyat"];
    $aciklama = @$_POST["aciklama"];
   
    $altid = @$_POST["altid"];
    $id = htmlspecialchars($_POST["id"]);
   


    $uploads_dir = '../resimler/urunler';
    @$tmp_name = $_FILES['resim']["tmp_name"];
    @$name = $_FILES['resim']['name'];
    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


   




    $urunlerkaydet = $baglan->prepare("UPDATE urunler SET
    resim=?,
    baslik=?,
    aciklama=?,
    fiyat=?,
   
    sira=?
  
    where id=$id


    ");
    $update = $urunlerkaydet->execute(array(

        $resimadi, 
         $baslik,
         $aciklama,
         $fiyat,
        
         $sira



    ));
 

    if ($update) {
        $sil=$_POST["eskiresim"];
        unlink("../resimler/urunler/$sil");
        header("Location:urunler.php?altid=$altid&durum=ok");
    } else {
        header("Location:urunler.php?altid=$altid&durum=no");
    }
}
else {
 
    $sira = @$_POST["sira"];
    $baslik = @$_POST["baslik"];
    $fiyat = @$_POST["fiyat"];
    $aciklama = @$_POST["aciklama"];
   
    $altid = @$_POST["altid"];
    $id = htmlspecialchars($_POST["id"]);

    $urunlerkaydet = $baglan->prepare("UPDATE urunler SET
    
    baslik=?,
    aciklama=?,
    fiyat=?,
    
    sira=?
  
    where id=$id


    ");
    $update = $urunlerkaydet->execute(array(

        $baslik,
        $aciklama,
        $fiyat,
        
        $sira



    ));


    if ($update) {
        header("Location:urunler.php?altid=$altid&durum=ok");
    } else {
        header("Location:urunler.php?altid=$altid&durum=no");
    }
}
}


if(isset($_POST["urunlersil"])) {

    $id=$_POST["id"];
    $resim=$_POST["resim"];
    $altid=$_POST["altid"];

    $urunsil=$baglan->prepare("DELETE FROM urunler where id=?");
    $delete=$urunsil->execute(array($id));


    if($delete) {
        unlink("../resimler/urunler/$resim");
        header("Location:urunler.php?altid=$altid&durum=ok");
    }else {
        header("Location:urunler.php?altid=$altid&durum=no");

    }







}

// --------------------

if (isset($_POST["sliderkaydet"])) {

    $sira = $_POST["sira"];
    $baslik = $_POST["baslik"];
    $aciklama = $_POST["aciklama"];
    
    $uploads_dir = '../resimler/slider';
    @$tmp_name = $_FILES['resim']["tmp_name"];
    @$name = $_FILES['resim']['name'];
    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $altkategoriekle = $baglan->prepare("INSERT INTO slider SET 
    
    sira=?,
    resim=?,
    baslik=?,
    aciklama=?
   
    ");
    $insert = $altkategoriekle->execute(array(

        $sira,
        $resimadi,
        $baslik,
        $aciklama

    ));

    if ($insert) {
        header("Location:slider.php?&durum=ok");
    } else {
        header("Location:slider.php?&durum=no");
    }
}


if (isset($_POST["sliderduzenle"])) {
    if($_FILES["resim"] ["size"] > 0 ) {

   



    $sira = @$_POST["sira"];
    $baslik = @$_POST["baslik"];
    $aciklama = @$_POST["aciklama"];
    $id = htmlspecialchars($_POST["id"]);
   


    $uploads_dir = '../resimler/slider';
    @$tmp_name = $_FILES['resim']["tmp_name"];
    @$name = $_FILES['resim']['name'];
    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


   




    $sliderkaydet = $baglan->prepare("UPDATE slider SET
    resim=?,
    baslik=?,
    aciklama=?,
    sira=?
  
    where id=$id


    ");
    $update = $sliderkaydet->execute(array(

        $resimadi, 
         $baslik,
         $aciklama,    
         $sira



    ));
 

    if ($update) {
        $sil=$_POST["eskiresim"];
        unlink("../resimler/slider/$sil");
        header("Location:slider.php?durum=ok");
    } else {
        header("Location:slider.php?durum=no");
    }
}
else {
 
    $sira = @$_POST["sira"];
    $baslik = @$_POST["baslik"];
    $fiyat = @$_POST["fiyat"];
    $aciklama = @$_POST["aciklama"];
   
    $altid = @$_POST["altid"];
    $id = htmlspecialchars($_POST["id"]);

    $sliderkaydet = $baglan->prepare("UPDATE slider SET
    
    baslik=?,
    aciklama=?,
    sira=?
  
    where id=$id


    ");
    $update = $sliderkaydet->execute(array(

        $baslik,
        $aciklama, 
        $sira



    ));


    if ($update) {
        header("Location:slider.php?durum=ok");
    } else {
        header("Location:slider.php?durum=no");
    }
}
}

if(isset($_POST["slidersil"])) {

    $id=$_POST["id"];
    $resim=$_POST["resim"];
    

    $slidersil=$baglan->prepare("DELETE FROM slider where id=?");
    $delete=$slidersil->execute(array($id));


    if($delete) {
        unlink("../resimler/slider/$resim");
        header("Location:slider.php?durum=ok");
    }else {
        header("Location:slider.php?durum=no");

    }







}


if (isset($_POST["logokaydet"])) {

   

    $sira = $_POST["sira"];
    $uploads_dir = '../resimler/ayar';
    @$tmp_name = $_FILES['resim']["tmp_name"];
    @$name = $_FILES['resim']['name'];
    $sayi1 = rand(1, 1000000);
    $sayi2 = rand(1, 1000000);
    $sayi3 = rand(1, 1000000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $resimadi = $sayilar . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $logo = $baglan->prepare("UPDATE ayarlar SET 
    
    logo=?
   where id=1
    ");
    $insert = $logo->execute(array(

       
        $resimadi

    ));

    if ($insert) {
        $sil=$_POST["eskiresim"];
        unlink("../resimler/ayar/$sil");
        header("Location:ayarlar.php?&durum=ok");
    } else {
        header("Location:ayarlar.php?&durum=no");
    }
}


if(isset($_POST["giris"])) {
   $mail=htmlspecialchars($_POST["email"]);
   $sifre=htmlspecialchars($_POST["sifre"]);

   $md5sifre=md5($sifre);

   if($mail && $md5sifre) {
    $ksor=$baglan->prepare("SELECT * FROM kullanici where mail=? and sifre=?");
    $ksor->execute(array(
        $mail,
        $md5sifre
    ));
$count=$ksor->rowCount();

if($count>0) {
   $_SESSION["kad"] = $mail;
   header("Location:index.php?bilgi=ok");
}else {
    
   header("Location:giris.php?bilgi=hata");
    
}

   }

}