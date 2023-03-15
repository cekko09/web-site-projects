<?php 
include "sitemap-generator.php";
$config = include("sitemap-config.php");
$smg = new SitemapGenerator($config);
// Run the generator
$smg->GenerateSitemap();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  
</head>

<body>

  <div id="anasayfa"></div>
  <header id="header" class="container-fluid">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="imgs/logo.png" alt="" /> </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link"   href="#anasayfa">ANASAYFA</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="#bolum2">AVON ÜYELİK FORMU </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#bolum6">SORU CEVAP </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer">İLETİŞİM</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#bolum4">HAKKIMDA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#bolum5">AVON KAZANÇ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <section id="bolum1" class="bolum1 container-fluid">
    <div class="container">
      <div class="info">
        <h1>AVON ÜYELİK SİTESİ</h1>
        <h3>AVON ÜYE OL, TAMAMEN ÜCRETSİZ</h3>
        <p>
          Avon üyesi olmak için avon üyelik formunu doldurmanız yeterli.
          Avon’a üye olmak Tamamen Ücretsizdir! Kendi ihtiyaçlarınızı
          indirimli satın alabilir ve bunun yanında çevrenize satış yaparak
          gelir elde edebilirsiniz.
        </p>
        <button class="uye-ol"><a href="#bolum2">Şimdi Üye Ol</a></button>
        <button class="iletisim-btn"><a href="#footer">İLETİŞİM</a></button>
      </div>
    </div>
  </section>

  <section id="bolum2" class="bolum2 container-fluid">
    <div class="container text-center">
      <h6>18 Yaşını Dolduran Herkes <span>Avon Temsilcisi Olabilir</span></h6>
      <p>Tek Yapmanız Gereken Avon Üyelik Forumunu Doldurmak</p>
      <div class="form-container shadow-lg">
        <form action="send.php" method="POST">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adınız Soyadınız</label>
            <input type="text" required name="adSoyad" placeholder="Adınız Soyadınız" class="form-control" aria-describedby="emailHelp" />
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telefon Numaranız</label>
            <input type="number" name="numara" required placeholder="0 5XX XXX XX XX " class="form-control" id="exampleInputPassword1" />
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Adresiniz</label>
            <input type="text" name="adres" required placeholder="açık adresiniz" class="form-control" />
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Konu</label>
            <textarea class="form-control" name="konu" required id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <button type="submit" class="uyeligi-tamamla">Başvuru Yap</button>
          <?php
          if (@$_GET['gonderme'] == "ok") {
            echo "<p class=' alert alert-success'>Başvurunuz alınmıştır </p>";
          } elseif (@$_GET["gonderme"] == "hata") {
            echo "<p class=' alert alert-danger'>Başvurunuz Alınamadı </p>";
          }
          ?>
        </form>
      </div>
    </div>
  </section>

  <section id="bolum3" class="container-fluid">
    <div class="container">
      <div class="bolum3-heads">
        <h2>Avona Nasıl Üye Olunur? Avon Üyelik Aşamaları</h2>
        <p>
          Avon üyesi/temsilcisi olmak çok kolay! Sadece birkaç adımda avon
          üyelik işlemleriniz tamamlanır ve hızlı bir şekilde avon
          üyesi/temsilcisi olabilirsiniz.
        </p>
      </div>
      <hr />

      <div class="info3">
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem">
              <i class="fa-solid fa-thumbs-up"></i>
              <div class="card-body">
                <h5 class="card-title">Üyelik Formunu Doldurun</h5>
                <p class="card-text">
                  Web sitemizde yer alan avon üyelik formunu doldurup hızlı ve
                  güvenli bir şekilde ön kayıt yapın.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="width: 18rem">
              <i class="fa-sharp fa-solid fa-file-pen"></i>
              <div class="card-body">
                <h5 class="card-title">Sizi Hemen Arayalım</h5>
                <p class="card-text">
                  Formu doldurduğunuzda avon temsilcimiz sizi arayıp
                  bilgilerinizi doğrulayacak ve üyelik işlemlerinizi hemen
                  başlatacak.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="width: 18rem">
              <i class="fa-sharp fa-solid fa-address-card"></i>
              <div class="card-body">
                <h5 class="card-title">Ve Üyeliğiniz Aktif Oldu!</h5>
                <p class="card-text">
                  Bilgileriniz onaylandıktan sonra üyeliğiniz hemen aktif
                  olacak. Artık tüm üyelere özel indirimlerden ve
                  kampanyalardan faydalanabilirsiniz!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="uye-yonlendir">
        <a href="#bolum2" class="">Şimdi Üye Ol</a>
      </button>
    </div>
  </section>

  <section id="bolum4" class="container-fluid text-center">
    <div class="container">
      <div class="hakkimda-head">
        <h3>Biz Kimiz</h3>
      </div>
      <div class="div-hr"></div>
      <div class="hakkimda-aciklama">
        <p>Merhaba ben Dilek Acar</p>
        <p>
          Avon yolculugun 25 yıl önce kendi ihtiyaçlarımı satın almak ile
          başladı ve daha sonra Avon'da temsilci olmaya karar verdim.10 yıl
          boyunca temsilcilik yapıp hem evime ek gelir sağladım hem de satış
          yaparak kendi ekibimi kurdum.Geçen zaman içerisinde bir çok ödüller
          ve yurtdışı seyahatler kazandım
        </p>
        <p>
          Şuanda Direktör seviyesindeyim ve ekibimle birlikte Avon'la kazanç
          yolculuğumuz devam ediyor
        </p>
        <p>
          Sizlere daha fazla kazanmanın yollarnı anlatıp hem dostlukları hem
          de maddi kazanç elde etmenizi sağlamak için burdayım
        </p>
      </div>
      <button class="uye-yonlendir"><a href="#bolum2">HEMEN KAYIT OL</a></button>
    </div>
  </section>

  <section id="bolum5" class="container-fluid text-center">
    <div class="container">
      <div class="kazanc-heads">
        <h2>Avon Temsilcileri Ne Kadar Kazanıyor? Kazanç Hesaplama</h2>
        <p>
          Avon temsilcisi olduğunuzda yapacağınız her ürün satışından %25 ile
          %33 oranında kâr elde edersiniz. Satacağınız ürünler bulunduğu
          kategoriye göre kar oranlarında değişiklik göstermekte ve %25 ile
          %33 oranında kâr kazandırmaktadır.
        </p>
      </div>
      <hr />
      <div class="kazanc">
        <div class="row">
          <div class="col-xl-6">
            <img class="img-fluid" src="imgs/kazanc2.png" alt="" />
          </div>
          <div class="col-xl-6">
            <div class="img-info5">
              <h6>Avon Temsilcileri Nasıl, Ne Kadar Kazanıyor?</h6>
              <p>
                Avon temsilcileri ürün satışı yaparak ve avon’a temsilci
                kazandırarak kazanıyor. Tüm bunların yanı sıra hediye ve
                fırsatlarda elde ediyor.
              </p>
              <h6>%33’e Varan Kazanç</h6>
              <p>
                Avon temsilcileri yaptığı ürün satışlarından %25 ve %33 arası
                oranda gelir elde etmektedir. Bu da ne kadar çok satış o kadar
                çok kâr elde etmek anlamına gelir.
              </p>
              <h6>Satış rakamınız arttıkça kazancınız da artar</h6>
              <p>
                Avon temsilcilik (üyelik) sisteminde temsilcilik ile başlayıp
                satış lideri, uzman lider, bronz lider, gümüş lider, altın
                lider, platin lider, direktör, kıdemli direktör, grup
                direktörü, koordinatör, kıdemli koordinatör ve grup
                koordinatörü pozisyonlarına gelebilir ve ciddi miktarlarda
                yüksek kazançlar elde edebilirsiniz.
              </p>
            </div>
          </div>
          <div class="space5"></div>
          <div class="col-xl-6">
            <img class="img-fluid" src="imgs/kazanc-resim.png" alt="" />
          </div>
          <div class="col-xl-6">
            <div class="img-info5">
              <h6>Ücretsiz Avon Üyelik Yap Sende Kazan</h6>
              <p>
                Günümüz şartlarında tek maaşla yaşamak neredeyse çok zor, hal
                böyle olunca insanlar ek gelir sağlayabileceği işler aramaya
                başladı. Sizde gelirinizi arttırmak istiyor ama ne yapabilirim
                diye düşünüyorsanız bu yazımız size faydalı olacaktır.
              </p>

              <p>
                Avon bir asırdan fazladır katalog ile satış yapma imkanı
                vermekte ve dünya üzerinde milyonlarca temsilcisine kazanç
                sağlatmaktadır.
              </p>

              <p>
                Avon temsilcisi olup ürün satışı yaparak ve ekibinizi
                büyüterek gelir elde edebilirsiniz. Üstelik bunun bir sınırı
                yok ayda binlerce, hatta on binlerce lira gelir elde
                edebilirsiniz. Peki bu nasıl olur, avon temsilcileri nasıl, ne
                kadar kazanır?
              </p>
            </div>
          </div>
        </div>
      </div>
      <button class="uye-yonlendir">
        <a href="#bolum2">HEMEN BAŞVUR</a>
      </button>
    </div>
  </section>

  <section id="bolum6" class="container-fluid text-center">
    <div class="container">
      <div class="soru-heads">
        <h2>Avon Üyelik Sıkça Sorulan Sorular</h2>
        <p>
          Aklınıza takılabilecek bir kaç soruyu cevapladık, daha fazlası için
          bize ulaşmaktan çekinmeyin.
        </p>
      </div>
      <hr />
      <div class="text-start">
        <h4>Avon üyelik ücretli mi?</h4>
        <p>
          Hayır, avon üyesi olmak ücretsizdir. Temsilci olmak için hiçbir
          ücret ödemezsiniz.
        </p>

        <h4>Nasıl avon temsilcisi olurum?</h4>
        <p>
          Avon temsilcisi olmak için web sitemizde avon üyelik formunu
          doldurmanız yeterli.
        </p>

        <h4>Kimler avon temsilcisi olabilir?</h4>
        <p>
          18 yaşını dolduran ve Türkiye'de ikamet eden kadın, erkek, öğrenci,
          çalışan, emekli herkes avon temsilcisi olabilir.
        </p>

        <h4>Avon siparişlerinde kargo bedeli ödeniyor mu?</h4>
        <p>
          Avon satış temsilcisi fiyatları üzerinden 95 TL altındaki
          siparişleriniz için 9,5 TL kargo bedeli ödersiniz. Bunu yanında, 95
          TL - 300 TL arası siparişlerinizde 1,5 TL kargo bedeli ödersiniz.
          300 TL ve üzeri siparişlerinizde kargo ücretsizdir.
        </p>

        <h4>Avon satış temsilcisi olmanın şartları nelerdir?</h4>
        <p>
          Avon satış temsilcisi olma şartları çok basittir; En önemlisi 18 yaş
          ve üzeri olmanız ve Türkiye'de ikamet etmenidir. Bunun dışında
          yaşadığınız şehir, öğrenim durumu, çalışma şekli gibi detaylar hiç
          önemli değildir.
        </p>

        <h4>Avonda nasıl yükselirim?</h4>
        <p>
          Avonda satışlarınızı arttırarak ve ekibinizi büyüterek
          yükselebilirsiniz. Böylece satış gelirlerinizin yanında ekstra
          primler ve süper hediyeler kazanma şansıda yakalarsınız.
        </p>

        <h4>Avon siparişi nasıl verilir?</h4>
        <p>
          Avon siparişlerinizi, avon temsilci numaranız ve şifrenizle avon
          sitesinden giriş yaparak çok kolay bir şekilde verebilirsiniz.
        </p>

        <h4>Sipariş limiti var mı?</h4>
        <p>
          Sipariş limiti bulunmuyor, dilediğiniz tutarda ve adette avon ürün
          siparişi verebilirsiniz.
        </p>
      </div>
      <button class="uye-yonlendir"><a href="#bolum2">HEMEN BAŞVUR</a></button>
    </div>
  </section>

<span id="scroll" class="scrollUp">
<i class="fa-solid fa-up-long"></i>
</span>

  <footer id="footer" class="container-fluid text-center">
    <div class="container footer">
      <div class="row">
        <div class="col-lg-4 ">
          <div class="justify-content-center">
            <img src="imgs/footer-logo.png" alt="" />

            <button class="uye-yonlendir "><a href="#bolum2">HEMEN BAŞVUR</a></button>

          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-destek d-flex justify-content-center flex-column">
            <p>Telefon Destek : +90 507 4909790</p>
            <p>Whatsapp Destek : +90 507 4909790</p>
            <p>
              Sosyal Medya : @cekko09 <i class="fa-brands fa-instagram"></i>
            </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-yonlendirme  text-start">
            <ul>
              <li><a href="#bolum2">AVON ÜYELİK FORMU</a></li>


              <li><a href="#bolum5">AVON KAZANÇ</a></li>


              <li><a href="#bolum6">SORU CEVAP</a></li>


              <li> <a href="#bolum4">HAKKIMDA</a></li>
            </ul>




          </div>
        </div>
      </div>
    </div>
  </footer>





<script>
 const scrollUp = document.querySelector(".scrollUp")

          scrollUp.addEventListener("click",scrollToUp)
          function scrollToUp() {
            window.scrollTo(0,0)
          }

        
         
         const visibility =    document.getElementById("scroll")
        
   const windowPosition =   window.pageYOffset

  
 
  
     
   visibility.style.visibility = "hidden";
  


function checkPosition() {
  let windowY = window.scrollY;
  
  if (windowY > 500) {
    visibility.style.visibility = "visible";
  
  }
  else {
   visibility.style.visibility = "hidden";

  }

}

window.addEventListener('scroll', checkPosition);




    (function () {
        var options = {
            whatsapp: "905525030347",
            call_to_action: "Merhaba, nasıl yardımcı olabilirim?",
            position: "left",
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();



</script>






  <!-- #56911C -->
</body>

</html>