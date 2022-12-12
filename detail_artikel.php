<?php include "./layouts/header.php" ?>
    <main id="main">

        <!-- ======= Our Services Section ======= -->
        <section id="artikel" class="services sections-bg">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                    <?php
                    $id_artikel = $_GET['id_artikel'];
                    $data = mysqli_query($con, "SELECT * FROM artikel INNER JOIN kategori on artikel.id_kategori = kategori.id_kategori where id_artikel=$id_artikel");
                    foreach ($data as $row) : ?>
                        <div class="col-lg-12 col-md-6">
                            <div class="service-item  position-relative">
                                <h3 class="fs-2"><?= $row['judul'] ?></h3>
                                <p class="fs-5">Kategori: <?= $row['kategori'] ?></p>
                                <p class="text-center mt-5"><img src="<?= APP_URL . "/admin/img_artikel/" . $row['gambar'] ?>" width="600" height="300"></p>
                                <p class="text-center mb-4"><?= $row['tanggal'] ?></p>
                                <p><?= $row['artikel'] ?></p>
                            </div><!-- End Service Item -->
                        <?php endforeach; ?>

                        </div>

                </div>
        </section><!-- End Our Services Section -->

    </main><!-- End #main -->
<?php include "./layouts/footer.php" ?>
