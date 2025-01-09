<?php
  include('function/setContents.php');
  $contents = setContent();
?>

<!-- Page Title -->
    <div class="page-title" id="" data-aos="fade">
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current"><?= $contents['title']; ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Table Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <section class="intro">
              <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12">
                      <div class="card bg-dark shadow-2-strong">
                        <div class="card-body">
                          <div class="table-responsive">
                            
                            <?php
                              // Tentukan jumlah item per halaman
                              $items_per_page = 7;

                              // Dapatkan halaman saat ini dari parameter GET
                              $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                              // Hitung offset
                              $offset = ($current_page - 1) * $items_per_page;

                              // Ambil total jumlah item
                              $total_items = count($contents['tablecontent']);

                              // Hitung jumlah halaman
                              $total_pages = ceil($total_items / $items_per_page);

                              // Ambil data untuk halaman saat ini
                              $page_contents = array_slice($contents['tablecontent'], $offset, $items_per_page);
                              ?>
                              <table class="table table-dark table-borderless mb-0">
                                <thead>
                                    <tr>
                                      <?php foreach($contents['tableheader'] as $th){ ?>
                                        <th class="text-nowrap" scope="col"><?= strtoupper($th['COLUMN_NAME']); ?></th>
                                      <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach($page_contents as $content){ ?>
                                        <tr>
                                          <?php
                                            foreach($content as $cont){ ?>
                                              <td><?= $cont; ?></td>
                                            <?php }
                                          ?>
                                        </tr>
                                    <?php }
                                  ?>
                                </tbody>
                              </table>

                              <!-- Pagination -->
                              <nav aria-label="Page navigation">
                                <ul class="pagination">
                                  <?php if($current_page > 1){ ?>
                                    <li class="page-item">
                                      <a class="page-link" href="?page=<?= $current_page - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                      </a>
                                    </li>
                                  <?php } ?>
                                  <?php for($i = 1; $i <= $total_pages; $i++){ ?>
                                    <li class="page-item <?= $i == $current_page ? 'active' : ''; ?>">
                                      <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                  <?php } ?>
                                  <?php if($current_page < $total_pages){ ?>
                                    <li class="page-item">
                                      <a class="page-link" href="?page=<?= $current_page + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                      </a>
                                    </li>
                                  <?php } ?>
                                </ul>
                              </nav>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </section>
        </div>

      </div>

    </section>
