@extends('layouts.app')

@section('content')
<!-- content -->
<div class="q-content">
    <div class="q-inner">
         <div class="q-page__header">
            <h1 class="q-page__title">{{ __('Ввостановление пароля') }}</h1>
        </div>

        <div class="q-autorization">
            
            <div id="autorization-content" class="q-tabs__content">
                <div id="autorization-tab-1" class="q-tabs__content--item _active">
                    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="q-form">
                            <div class="q-form__row">
                                <label for="email" class="q-form__label">{{ __('E-Mail адресса') }}</label>
                                <div class="q-form__input--wrapper">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} q-form__input q-form-white" name="email" value="{{ $email ?? old('email') }}" required autofocus/>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="q-form__row">
                                <label for="password" class="q-form__label">{{ __('Новый пароль:') }}</label>
                                <div class="q-form__input--wrapper">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} q-form__input q-form-white" name="password" required/>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif  
                                    <i class="q-icon q-icon-success"></i>
                                </div>
                            </div>
                            <div class="q-form__row">
                                <label for="password-confirm" class="q-form__label">{{ __('Повторите новый пароль:') }}</label>
                                <div class="q-form__input--wrapper">
                                    <input id="password-confirm" type="password" class="form-control q-form__input q-form-white" name="password_confirmation" required/>
                                    <i class="q-icon q-icon-success"></i>
                                </div>
                            </div>   
                            <div type="submit" class="q-form__row _submit">
                                <button class="q-button _red">{{ __('Сохранить пароль') }}</button>
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
