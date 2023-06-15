<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Laravel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.21/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/contact-us.css') }}" />
    </head>
    <body>
        <div class="container mt-5">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            <form method="post" action="{{ route('contact.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label">{{ trans('frontend.contact_us.content.name') }}</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                        <!-- Error -->
                        @if ($errors->has('name'))
                            <div class="error">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">{{ trans('frontend.contact_us.content.email') }}</label>
                        <input type="text" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                        <!-- Error -->
                        @if ($errors->has('email'))
                            <div class="error">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">{{ trans('frontend.contact_us.content.phone') }}</label>
                        <input type="tel" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
                        <!-- Error -->
                        @if ($errors->has('phone'))
                            <div class="error">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="subject" class="form-label">{{ trans('frontend.contact_us.content.subject') }}</label>
                        <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject" id="subject">
                        <!-- Error -->
                        @if ($errors->has('subject'))
                            <div class="error">
                                {{ $errors->first('subject') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="note" class="form-label">{{ trans('frontend.contact_us.content.note') }}</label>
                        <textarea class="form-control {{ $errors->has('note') ? 'error' : '' }}" name="note" id="note" rows="4"></textarea>
                        <!-- Error -->
                        @if ($errors->has('note'))
                            <div class="error">
                                {{ $errors->first('note') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <div class="h-captcha" data-sitekey="{{ config('services.hcaptcha.site_key') }}" theme="light" name="hcaptcha" id="hcaptcha"></div>
                        <!-- Error -->
                        @if ($errors->has('h-captcha-response'))
                            <div class="error">
                                {{ $errors->first('h-captcha-response') }}
                            </div>
                        @endif
                    </div>
                </div>
                <input type="submit" name="send" value="{{ trans('frontend.contact_us.content.submit') }}" class="btn btn-dark btn-block mt-3" />
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.21/js/intlTelInput.min.js" integrity="sha512-x1RjK1QHIg0CA4lP7CFG98UXDy04pYBPuepiMd4bkJ7sqEfAPHNmVbkBxVDG3zpnolqMX2cd1mX13HlvwZfA8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://js.hcaptcha.com/1/api.js?hl={{ trans('frontend.hcaptcha.language_code') }}" async defer></script>
        <script>          
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                allowDropdown: true,
                geoIpLookup: function(success, failure) {
                    $.get("https://ipinfo.io?token={{ config('services.ipinfo.token') }}", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        success(countryCode);
                    });
                },
                initialCountry: "auto",
                separateDialCode: true
            });
        </script>
    </body>
</html>