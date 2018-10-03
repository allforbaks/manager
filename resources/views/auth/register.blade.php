@extends('layouts.app')

@section('content')
<!-- content -->
<div class="q-content">
    <div class="q-inner">
        <div class="q-page__header _border-bottom">
            <div class="q-autorization__links">
                <a href="{{ route('login') }}" class="q-autorization__links-item">Хочу войти на сайт</a>
                <span class="q-autorization__links-item _active">Хочу зарегистрироваться                                    
                </span>
            </div>
        </div>
        <div class="q-registration">
            <div id="registration-content" class="q-tabs__content">
                <div id="registration-tab-1" class="q-tabs__content--item _active">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="q-registration__form">
                            <div class="q-registration__col">
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="q-form__row">
                                    <label for="name" class="q-form__label">{{ __('ФИО') }}</label>
                                    <div class="q-form__input--wrapper">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} q-form__input q-form-white" name="name" value="{{ old('name') }}" required autofocus/> 
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="q-form__input--notice">Это имя будут видеть коллеги</div>
                                </div>
                                <div class="q-form__row">
                                    <label for="email" class="q-form__label">{{ __('E-Mail адресса') }}</label>
                                    <div class="q-form__input--wrapper">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} q-form__input q-form-white" name="email" value="{{ old('email') }}" required/>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="q-form__input--notice">Ваша электронная почта.</div>
                                </div>
                                 
                            </div>

                            <div class="q-registration__col">
                                <div class="q-form__row">
                                    <label for="password" class="q-form__label">{{ __('Пароль') }}</label>
                                    <div class="q-form__input--wrapper">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} q-form__input q-form-white" name="password" required/>
                                       @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        <i class="q-icon q-icon-success"></i>
                                    </div>
                                    <div class="q-form__input--notice">Ваш пароль.</div>
                                </div>
                                <div class="q-form__row">
                                    <label for="password-confirm" class="q-form__label">{{ __('Подтверждение пароля') }}</label>
                                    <div class="q-form__input--wrapper">
                                        <input id="password-confirm" type="password" class=" form-control q-form__input q-form-white"name="password_confirmation" required />
                                       
                                        <i class="q-icon q-icon-success"></i>
                                    </div>
                                    <div class="q-form__input--notice">Ваш пароль еще раз.</div>
                                </div>   
                            </div>
                        </div>
           
                        <div class="q-registration__footer">
                            <div class="q-registration__footer--buttons">
                                <button type="submit" class="q-button _red">{{ __('Регистрация') }}</button>
                                <div class="q-checkbox__container">
                                    <div class="q-checkbox">
                                        <input type="checkbox" id="registrationRules" class="q-checkbox__input">
                                        <label for="registrationRules" class="q-checkbox__label">Я согласен (согласна) с <a href="#">Пользовательским Соглашением</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of content -->
@endsection
