<?php require view('static/header') ?>

<section class="jumbotron text-center"  style="height:400px; background-image: url('https://media.wired.com/photos/5cc244c9af643e2f373ebb28/191:100/w_2400,h_1256,c_limit/Coding-Becomes-Criminal.jpg');">
    <div class="container" >
        <h1 class="jumbotron-heading text-light"><?=setting('welcome_title')?></h1>
        <p class="lead text-light">
            <?=setting('welcome_text')?>
        </p>
        <p>
            <a href="<?=site_url('blog')?>" class="btn btn-danger my-2">Blog'a Gözat</a>
            <a href="<?=site_url('iletisim')?>" class="btn btn-secondary my-2">İletişime Geç</a>
        </p>
    </div>
</section>
<br><br>
<div class="container mt-4 mb-4">
      
      <div class="card-deck">
     <div class="card card-custom bg-white border-white border-0">
          <div class="card-custom-img" style=" background-color:red; background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);"></div>
          <div class="card-custom-avatar text-center">
            <img class="img-fluid" src="https://birparcatuhaftik.com/wp-content/uploads/2020/08/front-end-developer.jpg" width="300px"  alt="Avatar" style="border-radius:80px;" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title text-center">Front-end</h4>
            <p class="card-text">
            Frontend: Frontend'in Türkçe karşılığı “Önyüz”dür. Yapılma aşamasındaki bir web sitesinin ön yüzünü
            (client-side) HTML, CSS ve JavaScript gibi teknolojileri
             kullanarak web sitesinin görsel tarafını oluşturan kişilere ise front-end developer ( Ön yüz geliştirici ) denir.
            </p>
          </div>
          <div class="card-footer text-center" style="background: inherit; border-color: inherit;">
             <a href="#" class="btn btn-outline-dark">İncele</a>
          </div>
        </div>
     <div class="card card-custom bg-white border-white border-0">
          <div class="card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);"></div>
          <div class="card-custom-avatar text-center">
            <img class="img-fluid" src="https://image.tuas.com.tr/BlogImages/back-end-developer/back-end-developer-79189cc6-7718-4c42-9413-879972d98f33.png " width="290px" style="border-radius:80px;" alt="Avatar" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title text-center">Back-end</h4>
            <p class="card-text">
            Back-End Developer kimdir? Back-end developer bu bileşenlerin uyum içinde çalışması için 
            gerekli ortamı hazırlayan teknik kişidir. Server, uygulama ve veri tabanının birbiriyle
            iletişim kurabilmesi için back-end developerlar PHP, Ruby, Python, Java ve . Net ile uygulamayı geliştirir.
            </p>
          </div>
          <div class="card-footer text-center" style="background: inherit; border-color: inherit;">
             <a href="#" class="btn btn-outline-dark">İncele</a>
          </div>
        </div>
      <div class="card card-custom bg-white border-white border-0">
          <div class="card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);"></div>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="https://teks.co.in/site/blog/wp-content/uploads/2016/08/Mobile-App-Developers-Worldwide.png" width="300px;" alt="Avatar" style="border-radius:80px;" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title text-center">Mobile App</h4>
            <p class="card-text">
            Mobil uygulama geliştiricisi, mobil cihazlar için yazılım ve uygulamalar hazırlayan kişilerdir. Mobil 
            geliştiriciler, çeşitli yazılım dillerini kullanarak, geliştirilen işletim sistemlerine uygulamaları entegre eder.
            </p>
          </div>
          <div class="card-footer text-center" style="background: inherit; border-color: inherit;">
            <a href="#" class="btn btn-outline-dark">İncele</a>
          </div>
        </div>
        
</div>



<?php require view('static/footer') ?>

