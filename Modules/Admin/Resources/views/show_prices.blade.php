@extends('admin::layouts.master')

@section('content')
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header _single-title">
                <h1 class="q-page__title">Проекты:</h1>
                <div class="q-buttons__submit _hide-992">
                    <a href="users" class="q-button _red js-show-q-create-project-popup">Список пользователей</a>
                    <a href="projects" class="q-button _red js-show-q-create-project-popup">Список проектов</a>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-success">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
            </div>
            {!! Form::open(['route' => ['update.prices'], 'method' => 'POST']) !!}
            <div class="q-profile__form">
                <div class="q-profile__col _left-col">
                    <div class="q-form__row">
                        {{ Form::label('project', 'Цена за проект:', ['class' => 'q-form__label _with-link']) }}
                        <div class="q-form__input--wrapper">
                            {{ Form::number('project', $prices->project,  ['class' => 'q-form__input q-form-white'])  }}
                        </div>
                    </div>
                    <div class="q-form__row">
                        {{ Form::label('task', 'Цена за задачу:', ['class' => 'q-form__label _with-link']) }}
                        <span class="q-form__label-link">
                                            <span class="q-form__label-link--text js-show-q-edit-email"></span>
                                        </span>
                        <div class="q-form__input--wrapper">
                            {{ Form::number('task', $prices->task,  ['class' => 'q-form__input q-form-white'])  }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="q-profile__footer">
                <div class="q-profile__footer--buttons">
                    {{ Form::submit('Сохранить', ['class' => 'q-button _red'])  }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- end of content -->
@stop
