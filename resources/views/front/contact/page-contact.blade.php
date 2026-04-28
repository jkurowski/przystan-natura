<section id="mainContact" class="bg-logo-2 pb-0">
    <div class="container pt-0">
        <div class="row">
            <div class="col-7">
                <div class="section-text">
                    <span>KONTAKT</span>
                    <h2>Masz pytania? <br><i>Skontaktuj się z nami!</i></h2>
                </div>

                <div class="contact-text mt-5">
                    <h3>Konrad Działak</h3>
                    <h4 class="mb-4">Opiekun inwestora</h4>
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
                </div>
            </div>
            <div class="col-5">
                @include('front.contact.form', ['page_name' => 'Strona główna', 'page_text' => '<p>Zakup domu to inwestycja przy której należy zwrócić uwagę na wiele szczegółów. Skontaktuj się z naszym opiekunem, który odpowie na Twoje pytania i zaprosi Cię na prezentację.</p>'])
            </div>
        </div>
    </div>
    <div class="container pt-0" style="background:none">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('images/contact-photo.jpg') }}" alt="" class="w-100 big-borders" width="1620" height="765">
            </div>
        </div>
    </div>
</section>
