<!-- Hero Section -->
<?php
  include('function/query.php');

  $news = news2();
?>
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-delay="100">
            <h2><span>Welcome to Jurusan</span><span class="underlight">Teknologi Informasi</span><span> Politeknik Negeri Padang</span></h2>
            <p>Informasi tentang mahasiswa jurusan Teknologi Informasi Politeknik Negeri Padang. </p>
            <a href="?p=mhs" class="btn-get-started">Lihat Mahasiswa</a>
          </div>
        </div>
      </div>

    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">

          <?php
            foreach($news as $new){ ?>
              <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                  <img src="assets/img/berita/<?= $new["file_upload"]; ?>" class="img-fluid h-100" alt="">
                  <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="assets/img/berita/<?= $new["file_upload"]; ?>" title=<?= $new["file_upload"]; ?> class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            <?php }
          ?>

        </div>

      </div>

    </section>
    <!-- Gallery Section -->