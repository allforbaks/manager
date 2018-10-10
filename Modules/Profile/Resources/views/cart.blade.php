@extends('profile::layouts.master')

@section('title', 'Реквизиты карты')

@section('content')
    <!-- content -->
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header">
                <h1 class="q-page__title">Введите реквизиты карты</h1>
            </div>
            {!! Form::open(['route' => ['payment.pay', $user->id], 'method' => 'POST'], ['class' => 'q-form g-no-projects']) !!}
            <div class="q-form__row">
                {{ Form::label('url', 'Сайт:', ['class' => 'q-form__label']) }} <p>http://demo.local</p>
            </div>
            <div class="q-form__row">
                {{ Form::label('service', 'Услуга:', ['class' => 'q-form__label']) }} <span>Пополнение баланса</span>
            </div>
            <div class="q-form__row">
                {{ Form::label('value', 'Сумма пополнения:', ['class' => 'q-form__label']) }} {{ $value . ' RUB' }}
                {{ Form::hidden('value', $value) }}
            </div>
            <div class="q-form__row">
                {{ Form::label('number', 'Номер карты:', ['class' => 'q-form__label']) }}
                <div class="q-form__input--wrapper">
                {{ Form::text('number', '1111 2222 3333 4444',  ['class' => 'q-form__input q-form-white'])  }}
                </div>
            </div>
            <div class="q-form__row">
                {{ Form::label('date', 'Строк действия:', ['class' => 'q-form__label']) }}
                <div class="q-form__input--wrapper">
                {{ Form::date('date', now(),  ['class' => 'q-form__input q-form-white'])  }}
                </div>
            </div>
            <div class="q-form__row">
                {{ Form::label('name', 'Владелец карты:', ['class' => 'q-form__label']) }}
                <div class="q-form__input--wrapper">
                    {{ Form::text('name', $user->name,  ['class' => 'q-form__input q-form-white'])  }}
                </div>
            </div>
            <div class="q-form__row">
                {{ Form::label('email', 'E-mail:', ['class' => 'q-form__label']) }}
                <div class="q-form__input--wrapper">
                    {{ Form::email('email', $user->email,  ['class' => 'q-form__input q-form-white'])  }}
                </div>
            </div>
            <div class="q-form__row">
                {{ Form::label('cvv', 'Код CVV2:', ['class' => 'q-form__label']) }}
                <div class="q-form__input--wrapper">
                    {{ Form::number('cvv', 888,  ['class' => 'q-form__input q-form-white'])  }}
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