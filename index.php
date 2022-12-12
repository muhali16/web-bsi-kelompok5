<?php include "./layouts/header.php" ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>Bangkitkan Semangat <span>Indonesia</span></h2>
                <p>Kita tidak boleh berhenti berkreasi, berinovasi, dan berprestasi. Kita harus buktikan ketangguhan kita. Kita harus menangkan masa depan kita dan kita wujudkan cita-cita para Pendiri Bangsa dengan semangat bela negara,</p>

            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="assets/img/bela-negara.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
            </div>
        </div>
    </div>

    <div id="kategori" class="icon-boxes position-relative bg-black-50" style="padding: 90px 0 40px 0;">
        <h4 class="fs-3 text-white text-center fw-bold" data-aos="fade-up" data-aos-delay="100">Kategori Berita Bela Negara</h4>
        <hr class="container border border-3 w-25" data-aos="zoom-out" data-aos-delay="500">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">
                <?php
                $data = mysqli_query($con, "SELECT * FROM kategori");
                foreach ($data as $row) : ?>
                    <div class="col-xl-4 col-md-6 " data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <h4 class="title"><a href="detail_kategori.php?id_kategori=<?= $row['id_kategori'] ?>" class="stretched-link">
                                    <td><?= $row['kategori'] ?></td>
                                </a></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--End Icon Box -->
            </div>
        </div>
    </div>
</section>
<!-- End Hero Section -->

<!-- Gallery Section -->
<section id="galeri" class="bg-secondary" data-aos="fade-up" style="padding-top: 100px 0 100px 0;">
    <div class="section-header" data-aos="fade-up" data-aos-delay="100">
        <h2 class="text-white" style="margin-top: 60px;">Galeri Untuk Bangkitkan Semangat Indonesia</h2>
        <p></p>
    </div>
    <div class="position-relative" style="height: fit-content; padding-bottom: 50px;" data-aos="fade-up" data-aos-delay="100">
        <div class="slides-1 portfolio-details-slider swiper" style="height: 500px;">
            <div class="swiper-wrapper align-items-center">
                <?php
                $galeri = mysqli_query($con, "SELECT * FROM gallery");
                foreach($galeri as $g):
                ?>
                <div class="swiper-slide">
                    <img src="<?= APP_URL . "/admin/img_galeri/" . $g['gambar'] ?>" alt="<?= $g['gambar'] ?>"
                         class="img-fluid w-100" style="object-fit: cover;" title="<?= $g['keterangan'] ?>">
                </div>
                <?php endforeach ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>
<!-- Gallery Section -->


<!-- Main -->
<main id="main">
    <!-- ======= Our Services Section ======= -->
    <section id="artikel" class="services sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header" style="margin-top: 60px;">
                <h2>Berita Tentang Bela Negara Untuk Bangkitkan Semangat Indonesia</h2>
                <p></p>
            </div>

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                <?php
                $data = mysqli_query($con, "SELECT * FROM artikel");
                foreach ($data as $row) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item  position-relative">
                            <p><img src="<?= APP_URL . "/admin/img_artikel/" . $row['gambar'] ?>" width="290" height="200"></p>
                            <h3 class="mt-4"><?= $row['judul'] ?></h3>
                            <p><?= $row['tanggal'] ?></p>
                            <p><?= substr($row['artikel'], 0, 200) . '...' ?></p>
                            <a href="detail_artikel.php?id_artikel=<?= $row['id_artikel'] ?>" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->
                <?php endforeach; ?>
            </div>
        </div>
    </section><!-- End Our Services Section -->
</main>
<!-- End Main -->

<?php include "./layouts/footer.php" ?>