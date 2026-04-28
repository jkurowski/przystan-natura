@props([
    'page_name' => '',
    'obligation' => null,
    'property' => '',
    'page_text' => '',
    'rules' => []
])

{!! $page_text !!}
@php
    $action = $property
        ? route('front.contact.property', $property)
        : route('front.contact.send');
@endphp
<div id="contactForm">
    <form action="{{ $action }}" class="row mt-3 mt-xxl-5 validateForm" method="POST" id="contact-form">
        {{ csrf_field() }}
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success border-0">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-warning border-0">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-12 col-xxl-4">
            <div class="form-floating mb-3">
                <input type="text" class="validate[required] form-control @error('name') is-invalid @enderror" id="floatingName" placeholder="Imię i nazwisko" name="name" value="{{ old('name') }}">
                <label for="floatingName">Imię i nazwisko</label>
                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xxl-4">
            <div class="form-floating mb-3">
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="floatingPhone" placeholder="Numer telefonu" name="phone" value="{{ old('phone') }}">
                <label for="floatingPhone">Numer telefonu</label>
                @error('phone')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xxl-4">
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder="E-mail" name="email" value="{{ old('email') }}">
                <label for="floatingEmail">E-mail</label>
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12 mt-2">
            <div class="form-floating">
                <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Opisz swoje oczekiwania wobec nowego mieszkania – my zajmiemy się resztą" id="floatingTextarea" name="message">{{ old('message') }}</textarea>
                <label for="floatingTextarea">Treść wiadomości</label>
                @error('message')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        @if($obligation)
            <div class="col-12 obligatory-text mt-5">
                {!! $obligation->obligation !!}
            </div>
        @endif

        @foreach ($rules as $r)
            <div class="col-12 rodo-rules mt-3 @error('rule_'.$r->id) is-invalid @enderror">
                <div class="form-check">
                    <input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" class="form-check-input @if($r->required === 1) validate[required] @endif" data-prompt-position="topLeft:0">
                    <label for="rule_{{$r->id}}" class="form-check-label">
                        {!! $r->text !!}
                        @error('rule_'.$r->id)
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </label>
                </div>
            </div>
        @endforeach

        <div class="col-12 mt-5">
            <input name="page" type="hidden" value="{{ $page_name }}">
            <script type="text/javascript">
                @if(settings()->get("recaptcha_site_key") && settings()->get("recaptcha_secret_key"))
                document.write("<button type=\"submit\" class=\"bttn bttn-icon g-recaptcha\" data-sitekey=\"{{ settings()->get("recaptcha_site_key") }}\" data-callback=\"onRecaptchaSuccess\" data-action=\"submitContact\">Wyślij wiadomość<svg class=\"icon\" viewBox=\"0 0 26 26\"><path d=\"M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z\" fill=\"currentColor\"/></svg></button>");
                @else
                document.write("<button class=\"bttn bttn-icon\" type=\"submit\">Wyślij wiadomość<svg class=\"icon\" viewBox=\"0 0 26 26\"><path d=\"M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z\" fill=\"currentColor\"/></svg></button>");
                @endif
            </script>
            <noscript>Do poprawnego działania, Java musi być włączona.</noscript>
        </div>
    </form>
</div>

@push('scripts')
    <script src="{{ asset('js/validation.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/pl.js') }}" charset="utf-8"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".validateForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition:true,
                promptPosition : "topRight:-137px",
                autoPositionUpdate: false
            });
        });

        function onRecaptchaSuccess(token) {
            $(".validateForm").validationEngine('updatePromptsPosition');
            const isValid = $(".validateForm").validationEngine('validate');
            if (isValid) {
                $("#contact-form").submit();
            } else {
                grecaptcha.reset();
            }
        }

        @if (session('success') || session('warning') || $errors->any())
        $(window).on('load', function() {
            const aboveHeight = $('header').outerHeight();

            $('html, body').stop().animate({
                scrollTop: $('.validateForm').offset().top - aboveHeight
            }, 1500, 'swing');
        });
        @endif
    </script>
@endpush
