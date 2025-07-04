<!-- Footer -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="footer-info">
                        <h3>Sistem Informasi Desa</h3>
                        <p>
                            Jl. Raya Desa No.123 <br>
                            Kecamatan Example, 12345<br><br>
                            <strong>Telepon:</strong> +62 1234 5678 90<br>
                            <strong>Email:</strong> info@desaku.id<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Tautan Cepat</h4>
                    <ul>
                        <li><i class="fas fa-chevron-right"></i> <a href="#">Beranda</a></li>
                        <li><i class="fas fa-chevron-right"></i> <a href="{{ url('/login') }}">Login</a></li>
                        <li><i class="fas fa-chevron-right"></i> <a href="{{ url('/register') }}">Register</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Tentang Kami</h4>
                    <p>Sistem Informasi Desa adalah platform digital yang dirancang untuk memudahkan warga desa dalam mengakses berbagai layanan administrasi dan informasi penting terkait desa.</p>
                    <p>Kami berkomitmen untuk meningkatkan transparansi dan efisiensi pelayanan publik di tingkat desa.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; {{ date('Y') }} <strong><span>Sistem Informasi Desa</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Dibuat dengan <i class="fas fa-heart"></i> untuk kemajuan desa
        </div>
    </div>
</footer> 