@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-polityka-prywatnosci'])

@section('meta_title', $page->title ?? 'Polityka prywatności')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('content')
    <!-- MAIN SECTION -->
    <div id="page" class="privacy-policy">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section>
                        <h2>&sect;1 Informacje og&oacute;lne</h2>
                        <p>1. Niniejsza Polityka prywatności określa zasady przetwarzania i ochrony danych osobowych użytkownik&oacute;w korzystających ze strony internetowej www.oriondevelopment.pl.</p>
                        <p>2. Administratorem danych osobowych jest <strong>Orion Development Group Sp. z o.o.</strong> z siedzibą: 90-419 Ł&oacute;dź, al. Kościuszki 32 lok. 2, NIP: 7252174938, e-mail: <a href="mailto:oriondevelopment@o2.pl">oriondevelopment@o2.pl</a>.</p>
                        <p>3. Administrator dokłada szczeg&oacute;lnej staranności w celu ochrony interes&oacute;w os&oacute;b, kt&oacute;rych dane dotyczą.</p>
                        <p>&nbsp;</p>
                    </section>
                    <section>
                        <h2>&sect;2 Podstawa prawna przetwarzania danych</h2>
                        <p>Dane osobowe są przetwarzane zgodnie z:</p>
                        <ul>
                            <li>Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679 (RODO),</li>
                            <li>ustawą o ochronie danych osobowych,</li>
                            <li>przepisami dotyczącymi świadczenia usług drogą elektroniczną.</li>
                        </ul>
                        <p>&nbsp;</p>
                    </section>
                    <section>
                        <h2>&sect;3 Zakres zbieranych danych</h2>
                        <p>Administrator może przetwarzać następujące dane użytkownik&oacute;w:</p>
                        <ul>
                            <li>imię i nazwisko</li>
                            <li>adres e-mail</li>
                            <li>numer telefonu</li>
                            <li>adres IP</li>
                            <li>inne dane przekazane dobrowolnie w formularzu kontaktowym</li>
                        </ul>
                        <p>Podanie danych jest dobrowolne, ale może być niezbędne do korzystania z niekt&oacute;rych funkcji strony.</p>
                        <p>&nbsp;</p>
                    </section>
                    <section>
                        <h2>&sect;4 Cele przetwarzania danych</h2>
                        <p>Dane osobowe są przetwarzane w celu:</p>
                        <ul>
                            <li>obsługi zapytań przesyłanych przez formularz kontaktowy,</li>
                            <li>realizacji usług oferowanych na stronie,</li>
                            <li>prowadzenia korespondencji z użytkownikiem,</li>
                            <li>cel&oacute;w marketingowych (jeżeli użytkownik wyraził zgodę),</li>
                            <li>analizy statystycznej ruchu na stronie.</li>
                        </ul>
                        <p>&nbsp;</p>
                    </section>
                    <section>
                        <h2>&sect;5 Prawa użytkownika</h2>
                        <p>Każdej osobie, kt&oacute;rej dane dotyczą, przysługuje prawo do:</p>
                        <ul>
                            <li>dostępu do danych,</li>
                            <li>sprostowania danych,</li>
                            <li>usunięcia danych (&bdquo;prawo do bycia zapomnianym&rdquo;),</li>
                            <li>ograniczenia przetwarzania,</li>
                            <li>przenoszenia danych,</li>
                            <li>wniesienia sprzeciwu wobec przetwarzania danych.</li>
                        </ul>
                        <p>W celu realizacji swoich praw można skontaktować się z administratorem poprzez e-mail: <a href="mailto:oriondevelopment@o2.pl">oriondevelopment@o2.pl</a>.</p>
                        <p>&nbsp;</p>
                    </section>
                    <section>
                        <h2>&sect;6 Udostępnianie danych</h2>
                        <p>Dane mogą być przekazywane podmiotom wsp&oacute;łpracującym z administratorem, takim jak:</p>
                        <ul>
                            <li>firmy hostingowe,</li>
                            <li>dostawcy usług IT,</li>
                            <li>dostawcy narzędzi analitycznych (np. Google Analytics).</li>
                        </ul>
                        <p>Podmioty te przetwarzają dane wyłącznie na podstawie umowy z administratorem.</p>
                        <p>&nbsp;</p>
                    </section>
                    <section>
                        <h2>&sect;7 Pliki cookies</h2>
                        <p>Strona korzysta z plik&oacute;w cookies w celu:</p>
                        <ul>
                            <li>prawidłowego działania strony,</li>
                            <li>tworzenia statystyk odwiedzin,</li>
                            <li>prowadzenia działań marketingowych.</li>
                        </ul>
                        <p>Użytkownik może w każdej chwili zmienić ustawienia dotyczące plik&oacute;w cookies w swojej przeglądarce.</p>
                        <p>&nbsp;</p>
                    </section>
                    <section>
                        <h2>&sect;8 Okres przechowywania danych</h2>
                        <p>Dane osobowe będą przechowywane przez okres:</p>
                        <ul>
                            <li>niezbędny do realizacji celu przetwarzania,</li>
                            <li>wynikający z obowiązk&oacute;w prawnych,</li>
                            <li>do czasu wycofania zgody przez użytkownika (jeśli była podstawą przetwarzania).</li>
                        </ul>
                        <p>&nbsp;</p>
                    </section>
                    <section>
                        <h2>&sect;9 Zmiany polityki prywatności</h2>
                        <p>Administrator zastrzega sobie prawo do wprowadzania zmian w niniejszej Polityce prywatności. Aktualna wersja dokumentu jest zawsze dostępna na stronie internetowej.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5 pt-xxl-6 pb-5 pb-xxl-0">
        @include('front.contact.form', ['page_name' => 'Polityka prywatności'])
    </div>
    <!-- END -> MAIN SECTION -->
@endsection

@push('scripts')

@endpush
