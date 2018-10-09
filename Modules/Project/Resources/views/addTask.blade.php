@extends('project::layouts.master')

@section('title', 'Добавление задачи')

@section('content')
    <!-- content -->
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header">
                <h1 class="q-page__title">Создайте новую задачу</h1>
            </div>
            {!! Form::open(['method' => 'post', 'files' => true, 'route' => ['task.store', $project]], ['class' => 'q-form g-no-projects']) !!}
            {{ Form::hidden('project_id', $project->id) }}
                <div class="q-form__row g-white-select">
                    {{ Form::label('urgency', 'Срочность:', ['class' => 'q-form__label _with-link']) }}
                    <div class="q-form__input--wrapper">
                        {{ Form::select('urgency', ['Вчера' => 'Надо было вчера', 'Быстрее' => 'Нужно ускориться', 'Не спеши' => 'Не горит'], 'Вчера', ['class' => 'jq-selectbox__select-text q-form__input--wrapper jq-selectbox jqselect q-form__select js-q-select']) }}
                    </div>
                </div>
                <div class="q-form__row">
                    {{ Form::label('period', 'Период выполнения:', ['class' => 'q-form__label']) }}
                    <div class="q-form__input--wrapper">
                        <div class="q-datepicker__double">
                            <div class="q-datepicker">
                                {{ Form::date('start_at', now(), ['class' => 'q-form__input js-q-datepicker q-form-white'])  }}
                            </div>
                            <div class="q-datepicker__divider">-</div>
                            <div class="q-datepicker">
                                {{ Form::date('finish_at', now(), ['class' => 'q-form__input js-q-datepicker q-form-white'])  }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="q-form__row">
                    {{ Form::label('title', 'Заголовок задачи:', ['class' => 'q-form__label']) }}
                    <div class="q-form__input--wrapper">
                        {{ Form::text('title', null, ['class' => 'q-form__input q-form-white']) }}
                    </div>
                </div>
                <div class="q-form__row">
                    {{ Form::label('description', 'Описание задачи:', ['class' => 'q-form__label']) }}
                    {{ Form::textarea('description', null, ['class' => 'q-form__textarea q-form-white']) }}
                </div>
                <div class="q-form__row _submit">
                    {{ Form::submit('Добавить', ['class' => 'q-button _red'])  }}
                    <span class="_dashed">максимум 10 Мб</span>&nbsp{!! Form::file('file') !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- end of content -->
@stop
