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
                            <table class="table table-dark table-borderless mb-0">
                              <thead>
                                  <tr>
                                    <?php foreach($contents['tableheader']  as $th){ ?>
                                      <th class="text-nowrap" scope="col"><?= strtoupper($th['COLUMN_NAME']); ?></th>
                                    <?php } ?>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  foreach($contents['tablecontent'] as $content){ ?>
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
