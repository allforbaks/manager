@extends('profile::layouts.master')

@section('title', 'Добавление проекта')

@section('content')
    <!-- content -->
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header">
                <h1 class="q-page__title">Пополнение баланса</h1>
            </div>
            {!! Form::open(['route' => ['payment.pay', $user->id]], ['class' => 'q-form g-no-projects']) !!}
            <div class="q-form__row">
                {{ Form::label('value', 'Сумма пополнения:', ['class' => 'q-form__label']) }}
                <div class="q-form__input--wrapper">
                    {{ Form::number('value', null,  ['class' => 'q-form__input q-form-white'])  }}
                </div>
            </div>
            <div class="q-form__row _submit">
                {{ Form::submit('Пополнить', ['class' => 'q-button _red'])  }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- end of content -->
@stop
