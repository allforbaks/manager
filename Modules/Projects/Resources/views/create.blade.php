@extends('profile::layouts.master')

@section('title', 'Добавление проекта')

@section('content')
    <!-- content -->
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header">
                <h1 class="q-page__title">Создайте новый проект</h1>
            </div>
            {!! Form::open(['route' => 'project.store'], ['class' => 'q-form g-no-projects']) !!}
                <div class="q-form__row">
                    {{ Form::label('title', 'Название проекта', ['class' => 'q-form__label']) }}
                    <div class="q-form__input--wrapper">
                        {{ Form::text('title', null,  ['class' => 'q-form__input q-form-white'])  }}
                    </div>
                </div>
                <div class="q-form__row _submit">
                    {{ Form::submit('Добавить', ['class' => 'q-button _red'])  }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- end of content -->
@stop
