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
        <div class="q-tasks-list">
            <div class="g-column">
                <span class="text-column">Новая:</span>
                @isset($group[1])
                    @foreach($group[1] as $tasks)
                        <div class="g-task">
                            <a class="open-g-task js-show-q-view-task-admin-popup" href="#">
                                <div class="g-task-header"><div class="g-task-header-name">Я себе поручил:</div>
                                    {{ $tasks->title }}<div class="g-task-footer-urgency"></div></div>
                            </a>
                            <div class="g-task-footer">
                                <div class="g-task-footer-date">
                                    {{ $tasks->start_at . '  -  ' . $tasks->finish_at  }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="g-column">
                <span class="text-column">В работе:</span>
                @isset($group[2])
                    @foreach($group[2] as $tasks)
                        <div class="g-task">
                            <a class="open-g-task" href="#">
                                <div class="g-task-header"><div class="g-task-header-name">Я поручил(а):</div>
                                    {{ $tasks->title }}</div>
                            </a>
                            <div class="g-task-footer">
                                <div class="g-task-footer-date">
                                    {{ $tasks->start_at . '  -  ' . $tasks->finish_at  }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="g-column">
                <span class="text-column">Выполнено:</span>
                @isset($group[3])
                    @foreach($group[3] as $tasks)
                        <div class="g-task g-task-ok">
                            <a class="open-g-task" href="#">
                                <div class="g-task-header"><div class="g-task-header-name">Мне поручил Антон Иванович Иванов:</div>
                                    {{ $tasks->title }}<div class="g-task-footer-urgency"></div></div>
                            </a>
                            <div class="g-task-footer">
                                <div class="g-task-footer-date">
                                    {{ $tasks->start_at . '  -  ' . $tasks->finish_at  }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
    <!-- end of content -->
@stop
