@extends('layouts.app')

@section('content')
<!-- content -->
<div class="q-content">
    <div class="q-inner">
        <div class="q-autorization">
            <div class="q-page__header _border-bottom">
                <div class="q-autorization__links">
                    <span class="q-autorization__links-item _active">Хочу войти на сайт</span>
                    <a href="{{ route('register') }}" class="q-autorization__links-item">Хочу зарегистрироваться</a>
                </div>
            </div>
            <div id="autorization-content" class="q-tabs__content">
                <div id="autorization-tab-1" class="q-tabs__content--item _active">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="q-form">
                        @csrf
                        <div class="q-form__row _not-valid">
                            <label for="email" class="q-form__label">{{ __('Ваш E-Mail') }}</label>
                            <div class="q-form__input--wrapper">
                                <input id="email" type="email" value="{{ old('email') }}" class="q-form__input q-form-white form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autofocus />

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ _('Не правильно указано e-mail или пароль!') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="q-form__row">
                            <label for="password" class="q-form__label _with-link">{{ __('Пароль') }}</label>
                            <span class="q-form__label-link">
                                <span class="q-form__label-link--text" ><a href="{{ route('password.request') }}">Забыли пароль?</a></span>
                            </span>

                            <div class="q-form__input--wrapper">
                                <input id="password" type="password" class="q-form__input q-form-white form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                               
                            </div>
                           
                        </div>
                        <div class="q-form__row _submit">
                            <button class="q-button _red">Войти на сайт</button>
                        </div>
                        @if (session('confirmation'))
                            <div class="alert alert-info" role="alert">
                                {!! session('confirmation') !!}
                            </div>
                        @endif
                        @if ($errors->has('confirmation') > 0 )
                            <div class="alert alert-danger" role="alert">
                                {!! $errors->first('confirmation') !!}
                            </div>
                        @endif
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- end of content -->

</div>
<!-- end of content-wrapper -->
@endsection
