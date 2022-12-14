<?php include 'admin/config/_config.php';
include "layouts/header.php";
?>

    <main id="main">

        <!-- ======= Our Services Section ======= -->
        <section id="services" class="services sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Berita Tentang Bela Negara Untuk Bangkitkan Semangat Indonesia</h2>
                </div>

                <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                    <?php
                    $id_kategori = $_GET['id_kategori'];
                    $data = mysqli_query($con, "SELECT * FROM artikel where id_kategori=$id_kategori");
                    foreach ($data as $row) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-item  position-relative">
                                <p class="overflow-hidden"><img src="<?= "admin/img_artikel/" . $row['gambar'] ?>" width="350"
                                         height="200"></p>
                                <h3 class="mt-4"><?= $row['judul'] ?></h3>
                                <p><?= $row['tanggal'] ?></p>
                                <p><?= substr($row['artikel'], 0, 50) . '...' ?></p>
                                <a href="detail_artikel.php?id_artikel=<?= $row['id_artikel'] ?>" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div><!-- End Service Item -->
                    <?php endforeach; ?>
                </div>
            </div>
        </section><!-- End Our Services Section -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>BSI</span>
                    </a>
                    <p>Bangkitkan Semangat Indonesia</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li><a href="#">Jakarta, Indonesia</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Telepon</h4>
                    <ul>
                        <li><a href="#">081234567891</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Email</h4>
                    <strong>Email:</strong>bsi@gmail.com<br>

                </div>

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Bangkitkan Semangat Indonesia</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

<?php include "layouts/footer.php"; ?>