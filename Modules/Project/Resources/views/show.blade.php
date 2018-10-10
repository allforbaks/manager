@extends('project::layouts.master')

@section('title', 'Мои проекты')

@section('content')
    <!-- content -->
    <div class="q-breadcrumbs">
        <div class="q-inner">
            <ul class="q-breadcrumbs__list">
                <li class="q-breadcrumbs__item">
                    <span class="q-breadcrumbs__link">Проект</span>
                </li>
                <li class="q-breadcrumbs__item">{{ $project->title }}</li>


            </ul>

        </div>
    </div>
    <div class="q-about-us _show-720">
        <div class="q-inner">
            <div class="q-filters-with-buttons">
                <a href="{{ URL::to('projects/' . $project->id) . '/task/add' }}" class="q-button _red js-show-q-create-message-popup">Новая задача</a>
                <div class="q-form__input--wrapper q-form__input--wrapper-right">
                    <div class="q-buttons__submit">
                        <a href="{{ URL::to('projects/' . $project->id) . '/edit' }}" class="q-button _white js-show-q-export-to-file-popup">Редактировать проект</a>
                    </div>
                </div>
            </div>
        </div>
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
    <div class="q-inner">
        <div id="app">
            <table-task :group="{{ $group }}"></table-task>
        </div>
    </div>
    <!-- end of content -->
@stop