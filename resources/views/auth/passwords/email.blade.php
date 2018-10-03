@extends('layouts.app')

@section('content')
<!-- content -->
<div class="q-content">
    <div class="q-inner">
         <div class="q-page__header">
            <h1 class="q-page__title">{{ __('Ввостаноление пароля') }}</h1>
        </div>
        <div class="q-autorization">
            <div id="autorization-content" class="q-tabs__content">
                <div id="autorization-tab-1" class="q-tabs__content--item _active">
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" class="q-form">
                        @csrf

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
                           <div class="q-form__input--notice">На этот адрес будет выслано письмо с инструкцией по восстановлению доступа к сайту.</div>
                        </div>
                       
                        <div class="q-form__row _submit">
                            <button type="submit" class="q-button _red">{{ __('Ввостановить') }}</button>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Письмо успешно отправлено!') }}
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
@endsection
