@extends('profile::layouts.master')

@section('content')
<!-- content -->
<div class="q-content">
    <div class="q-inner">
        <div class="q-page__header _single-title">
            <h1 class="q-page__title">Мой профиль</h1>
            <div class="q-page__header--right-part-profile">
                <span class="q-page__link-after-title _like-dashed-link js-show-q-profile-popup">удалить</span>
            </div>
        </div>
        <div class="q-profile">
            <form method="POST" action="{{ route('{user}.update')  }}" >
                @csrf

                <div class="q-profile__form">
                    <div class="q-profile__col _av-col">
                        <div class="q-user__avatar-profile _text-center">
                            <div class="q-user__avatar _large _edit q-user-white-border">
                                <img src="img/avatar.png" alt="" class="q-user__avatar-img">
                                <span class="q-user__avatar--edit-btn"></span>
                                <span class="q-user__avatar--edit-text">Изменить <br/> аватар</span>
                            </div>

                        </div>
                        <div class="q-profile__info--container">
                            <div class="q-profile__info">
                                <div class="q-profile__info--text">
                                    <p>Доступ к Вашим проектам для 1000 участников (10 мест свободно) активен до 12.12.2012</p>

                                </div>
                                <a href="#" class="_like-dashed-link js-show-q-subscriptions-popup">Продлить или добавить участников</a>
                            </div>
                        </div>
                    </div>
                    <div class="q-profile__col _left-col">
                        <div class="q-form__row">
                            <label for="name" class="q-form__label _with-link">Имя на сайте:</label>
                            <div class="q-form__input--wrapper">
                                <input id="name" type="text"
                                 placeholder="" class="q-form__input q-form-white"/>
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="q-form__row">
                            <label for="email" class="q-form__label _with-link">E-mail:</label>
                            <span class="q-form__label-link">
                                            <span class="q-form__label-link--text js-show-q-edit-email"></span>
                                        </span>
                            <div class="q-form__input--wrapper">
                                <input id="email" type="email"  class="q-form__input q-form-white"/>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="q-profile__footer">
                    <div class="q-profile__footer--buttons">
                        <button type="submit" class="q-button _red">{{ __('Сохранить изменения') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of content -->
@stop
