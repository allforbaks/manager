@extends('profile::layouts.master')

@section('content')
    <!-- content -->
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header _single-title">
                <h1 class="q-page__title">Мой профиль</h1>
                <div class="q-page__header--right-part-profile">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['profile.destroy', $user]]) !!}
                    {!! Form::submit('Удалить', ['class' => 'q-page__link-after-title _like-dashed-link js-show-q-profile-popup']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="q-profile">
                {!! Form::model($user, ['route' => ['profile.update', $user], 'method' => 'PUT', 'files' => true]) !!}
                {{ csrf_field() }}
                    <div class="q-profile__form">
                        <div class="q-profile__col _av-col">
                            <div class="q-user__avatar-profile _text-center">
                                <div class="q-user__avatar _large _edit q-user-white-border">
                                    <img src="/storage/{{ $user->image }}" class="q-user__avatar-img">
                                    {!! Form::file('image') !!}
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
                                {{ Form::label('name', 'Имя на сайте:', ['class' => 'q-form__label _with-link']) }}
                                <div class="q-form__input--wrapper">
                                    {{ Form::text('name', null,  ['class' => 'q-form__input q-form-white'])  }}
                                </div>
                            </div>
                            <div class="q-form__row">
                                {{ Form::label('email', 'E-mail:', ['class' => 'q-form__label _with-link']) }}
                                <span class="q-form__label-link">
                                            <span class="q-form__label-link--text js-show-q-edit-email"></span>
                                        </span>
                                <div class="q-form__input--wrapper">
                                    {{ Form::email('email', null,  ['class' => 'q-form__input q-form-white'])  }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="q-profile__footer">
                        <div class="q-profile__footer--buttons">
                            {{ Form::submit('Сохранить изменения', ['class' => 'q-button _red'])  }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- end of content -->
@stop
