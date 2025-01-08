<?php
  include('function/query.php');

  $news = news();
?>
<!-- Page Title -->
<div class="page-title" data-aos="fade">
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Berita</li>
          </ol>
        </div>
      </nav>
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Berita</h1>
              <h2 class="fst-italic">"The Stepping Stone to International Journey"</h2>
              <p class="mb-0">Jurusan Teknologi Informasi Politeknik Negeri Padang menampilkan inovasi mahasiswa, karya kreatif, teknologi terbaru, serta koleksi prestasi, piagam, dan penghargaan atas pencapaian di kompetisi nasional dan internasional.</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->

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
                    <a href="berita-single.php?id=<?= $new['id']; ?>" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            <?php }
          ?>

        </div>

      </div>

    </section><!-- /Gallery Section -->