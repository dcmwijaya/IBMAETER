    <!-- Footer -->
    <footer class="page-footer font-small bg-dark text-light pt-4 mt-4">
        <!-- Footer Links -->
        <div class="container text-center text-md-left">
            <!-- Grid row -->
            <div class="row row-footer">
                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">
                    <!-- Content -->
                    <h5 class="text-uppercase">CONTACT</h5>

                    <div class="card-body sosmed-home">
                        <?php
                        $mail = "https://mail.google.com/mail/";
                        $emailtujuan = "invenbar@invweb.ac.id";
                        $subject = "HUBUNGI ADMIN INVENBAR";
                        $enter = "%0A%0A%0A";
                        $pg1 = "[Tuliskan pesan anda disini]";
                        $pg2 = "Dengan ini, saya menyatakan bahwa saya menghubungi admin tanpa paksaan siapapun serta dalam keadaan sadar.";
                        $pg3 = "Atas perhatian Bapak/Ibu, besar harapan saya agar permintaan saya dapat diproses sebagaimana mestinya. Sekian dari saya, terima kasih.";
                        $namaAnda = "[Nama Anda]";
                        $body = "Isi Pesan:%0A" . $pg1 . "" . $enter . "" . $pg2 . "%0A" . $pg3 . "%0A%0AHormat Saya," . $enter . "" . $namaAnda;

                        $pesan = "" . $mail . "?view=cm&fs=1&tf=1&to=" . $emailtujuan . "&subject?&su=" . $subject . "&body=" . $body;
                        ?>

                        <a href="<?= $pesan; ?>"><i class="fas fa-envelope fa-fw me-1"></i>Email</a>
                        <a href="#" onclick="return false;"><i class="fab fa-facebook-square fa-fw me-1"></i>Facebook</a>
                        <a href="#" onclick="return false;"><i class="fab fa-twitter-square fa-fw me-1"></i>Twitter</a>
                        <a href="#" onclick="return false;"><i class="fab fa-instagram-square fa-fw me-1"></i>Instagram</a>
                    </div>
                </div>

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3 network">
                    <!-- Links -->
                    <h5 class="text-uppercase">NETWORK</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#" onclick="return false;"><i class="fas fa-caret-right fa-fw me-1"></i>Invenbar Info</a>
                        </li>
                        <li>
                            <a href="#" onclick="return false;"><i class="fas fa-caret-right fa-fw me-1"></i>Partnership</a>
                        </li>
                    </ul>
                </div>

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3 our-website">
                    <!-- Links -->
                    <h5 class="text-uppercase">OUR WEBSITE</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#" onclick="return false;"><i class="fas fa-caret-right fa-fw me-1"></i>Kebijakan Privasi</a>
                        </li>
                        <li>
                            <a href="#" onclick="return false;"><i class="fas fa-caret-right fa-fw me-1"></i>Waspada Penipuan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3 small">@ 2021 :
            <a href="<?= base_url('/'); ?>"> Kelompok 5 Framework C</a>
        </div>
    </footer>
