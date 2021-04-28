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

<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="f1-content col-lg-3 col-md-6 footer-contact">
                    <h3>INVENBAR</h3>
                    <p>
                        Website Inventaris Barang Gudang<br><br>
                        <strong>Phone:</strong> (+62)838-3747-1292<br>
                        <strong>Email:</strong> invenbar@invweb.ac.id<br>
                    </p>
                </div>
                <hr class="line">
                <div class="f2-content f-kolom col-lg-3 col-md-6 footer-links">
                    <h4>NETWORK</h4>
                    <ul>
                        <li><a href="<?= base_url("home/InfoHome"); ?>"><i class="fas fa-caret-right fa-fw me-1" style="color: #001158;"></i>Invenbar Info</a></li>
                        <li><a href="<?= base_url("home/Partnership"); ?>"><i class="fas fa-caret-right fa-fw me-1" style="color: #001158;"></i>Partnership</a></li>
                    </ul>
                </div>

                <div class="f3-content f-kolom col-lg-3 col-md-6 footer-links">
                    <h4>OUR WEBSITE</h4>
                    <ul>
                        <li><a href="<?= base_url("home/KebijakanPrivasi"); ?>"><i class="fas fa-caret-right fa-fw me-1" style="color: #001158;"></i>Kebijakan Privasi</a></li>
                        <li><a href="<?= base_url("home/WaspadaPenipuan"); ?>"><i class="fas fa-caret-right fa-fw me-1" style="color: #001158;"></i>Waspada Penipuan</a></li>
                    </ul>
                </div>
                <hr class="line">
                <div class="f4-content col-lg-3 col-md-6 footer-links">
                    <h4>CONTACT</h4>
                    <p>Hubungi sosial media kami dibawah ini</p>
                    <div class="social-links mt-3">
                        <a href="<?= $pesan; ?>" class="google-mail"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="twitter" onclick="return false;"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="facebook" onclick="return false;"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="instagram" onclick="return false;"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="linkedin" onclick="return false;"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; 2021 <strong><span>Invenbar</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <strong>kelompok-5</strong>
        </div>
    </div>

</footer>
