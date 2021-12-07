<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 logo">Brotherhoods</h2>
                    <p>Far far away, behind the word mountains, far from the countries
                        Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft
            mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Information</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">FAQs</a></li>
                        <li><a href="#" class="py-2 d-block">Privacy</a></li>
                        <li><a href="#" class="py-2 d-block">Terms Condition</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Trang Chủ</a></li>
                        <li><a href="#" class="py-2 d-block">Giới Thiệu</a></li>
                        <li><a href="#" class="py-2 d-block">Dịch Vụ</a></li>
                        <li><a href="#" class="py-2 d-block">Tin Tức</a></li>
                        <li><a href="#" class="py-2 d-block">Liên Hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <?php
                $salon = DB::table('salons')
                    ->where('status', 0)
                    ->get();
                ?>
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Contact</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            @foreach ($salon as $item)
                                <li><span class="icon icon-map-marker"></span><span
                                        class="text">{{ $item->name_salon }} : {{ $item->address }}</span>
                                </li>
                            @endforeach
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392
                                        3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">info@yourdomain.com</span></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | <i class="icon-heart
            color-danger" aria-hidden="true"></i>
                    Brotherhoods
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
