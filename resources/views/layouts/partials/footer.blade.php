<!-- FOOTER -->
<footer class="">
    <div class="footer-top"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-text">
                    <span>DOMKI W STYLU SKANDYNAWSKIM</span>
                    <h2 class="mb-0">W rytmie <i>natury</i></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="footer-content">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-8 col-xl-3 p-0">
                            <div class="footer-box ps-0 border-0">
                                <img src="{{ asset('images/logo-color.svg') }}" alt="logo" class="mb-5">
                                <p>Gotowe wolnostojące domki w stylu skandynawskim z własnymi działkami</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xl p-0">
                            <div class="footer-box">
                                <div class="row">
                                    <div class="col-12 col-xxl-6">
                                        <h4>MENU</h4>
                                        <ul class="mb-4 mb-xxl-0 list-unstyled">
                                            <li><a href="/">Strona główna</a></li>
                                            <li><a href="{{ route('front.developro.plan') }}">Oferta domów</a></li>
                                            <li><a href="{{ route('front.menu.show', ['uri' => 'lokalizacja']) }}">Lokalizacja</a></li>
                                            <li><a href="{{ route('front.menu.show', ['uri' => 'galeria']) }}">Galeria</a></li>
                                            <li><a href="{{ route('front.menu.show', ['uri' => 'o-inwestorze']) }}">O inwestorze</a></li>
                                            <li><a href="{{ route('front.menu.show', ['uri' => 'kontakt']) }}">Kontakt</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-xxl-6">
                                        <h4>INFORMACJE</h4>
                                        <ul class="mb-0 list-unstyled">
                                            <li><a href="{{ route('front.menu.show', ['uri' => 'polityka-prywatnosci']) }}">Polityka prywatności</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6 col-xxl p-0">
                            <div class="footer-box pe-0">
                                <a href="tel:+48888367956" class="href-phone">
                            <span class="href-icon-phone">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon">
                                <path d="M5.92051 8.46856L11.2838 13.7956C11.8585 13.1301 15.4976 9.22886 17.3167 14.5575C17.3167 14.5575 17.1253 17.3167 13.1985 17.3167C10.4221 17.3167 7.54912 13.9869 5.53789 12.0837C3.81445 10.4658 2.47363 8.37291 2.47363 6.4697C2.47363 2.56929 5.15527 2.47363 5.15527 2.47363C11.2838 4.5665 5.92134 8.46856 5.92134 8.46856" fill="currentColor"/>
                                </svg>
                            </span>888 367 956</a>
                                <a href="mailto:konrad.dzialak@janton-invest.pl" class="href-email mt-3">
                            <span class="href-icon-email">
                                <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg" class="icon">
                                    <path d="M8.64732 10.2402C8.4929 10.3367 8.31918 10.3753 8.16477 10.3753C8.01035 10.3753 7.83663 10.3367 7.68222 10.2402L0 5.5498V11.7844C0 13.1162 1.08091 14.1971 2.41276 14.1971H13.9361C15.2679 14.1971 16.3488 13.1162 16.3488 11.7844V5.5498L8.64732 10.2402Z" fill="currentColor"/>
                                    <path d="M13.936 2.15234H2.4127C1.27388 2.15234 0.308773 2.96303 0.0771484 4.04394L8.18401 8.98527L16.2716 4.04394C16.0399 2.96303 15.0748 2.15234 13.936 2.15234Z" fill="currentColor"/>
                                </svg>
                            </span>konrad.dzialak@janton-invest.pl
                                </a>

                                <ul class="social mb-0 list-unstyled d-none">
                                    <li><a href="https://www.facebook.com/przystannaturadomy" target="_blank">Facebook</a></li>
                                    <li><a href="https://www.instagram.com/przystan.natura?igsh=ZTI5anFnankweGIz">Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="copyrights">
                                <p>JF DEVELOPMENT SP. Z O.O. Wszelkie prawa zastrzeżone.<span>|</span>Projekt: <a href="https://www.4dl.pl/" target="_blank">4DL.pl</a><span>/</span><a href="https://www.developro.pl/" target="_blank">DeveloPro</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end of FOOTER -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}?v=18032026"></script>
<script>
    let lastState = false;

    function handleHeaderScroll() {
        const scrolled = window.scrollY > 0;

        if (scrolled !== lastState) {
            document.querySelector('header').classList.toggle('scrolled', scrolled);
            lastState = scrolled;
        }
    }

    window.addEventListener('load', handleHeaderScroll);
    window.addEventListener('scroll', handleHeaderScroll);
</script>
