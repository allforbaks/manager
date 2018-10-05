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
    </div>
    <div class="q-inner">
        <div class="q-tasks-list">
            <div class="g-column">
                <span class="text-column">Новая:</span>
                @foreach($project->task as $tasks)
                    <div class="g-task">
                        <a class="open-g-task js-show-q-view-task-admin-popup" href="#">
                            <div class="g-task-header"><div class="g-task-header-name">Я себе поручил:</div>
                                {{ $tasks->title }}<div class="g-task-footer-urgency"></div></div>
                        </a>
                        <div class="g-task-footer">
                            <div class="g-task-footer-date">
                                {{ \Carbon\Carbon::parse($project->created_at)->format('d.m.Y') }}
                            </div>
                            <a class="g-arrow-right-icon" href="#" title="Изменить статус"></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="g-column">
                <span class="text-column">В работе:</span>
                <div class="g-task">

                    <a class="open-g-task" href="#">
                        <div class="g-task-header"><div class="g-task-header-name">Я поручил(а):</div>
                            Подготовить презентацию для встречи с руководством</div>
                    </a>
                    <div class="g-task-footer">
                        <div class="g-task-footer-date">
                            12.11 - <span class="g-task-footer-date-normal">15.11</span>
                        </div>
                        <i class="g-newmail-icon Blink"></i>
                        <a class="g-delete-icon js-show-compare-popup" href="#" title="Удалить задачу"></a>
                        <a class="g-arrow-right-icon" href="#"  title="Изменить статус"></a>

                    </div>

                </div>

                <div class="g-task">

                    <a class="open-g-task" href="#">
                        <div class="g-task-header"><div class="g-task-header-name">Я в копии:</div>
                            Разработать механизм описания неописуемых явлений мира квантовой физики</div>
                    </a>
                    <div class="g-task-footer">
                        <div class="g-task-footer-date">
                            12.11 - <span class="g-task-footer-date-normal">15.11</span>
                        </div>
                        <i class="g-newmail-icon Blink"></i>


                    </div>

                </div>

            </div>
            <div class="g-column">
                <span class="text-column">Выполнено:</span>
                <div class="g-task g-task-ok">

                    <a class="open-g-task" href="#">
                        <div class="g-task-header"><div class="g-task-header-name">Мне поручил Антон Иванович Иванов:</div>
                            Заказать печать визиток<div class="g-task-footer-urgency"></div></div>
                    </a>
                    <div class="g-task-footer">
                        <div class="g-task-footer-date">
                            12.11 - <span class="g-task-footer-date-normal">15.11</span>
                        </div>

                        <a class="g-arrow-left-icon" href="#" title="Изменить статус"></a>
                    </div>

                </div>
                <div class="g-task g-task-ok">
                    <a class="open-g-task" href="#">
                        <div class="g-task-header"><div class="g-task-header-name">Мне поручил Антон Иванович Иванов:</div>
                            Разработать математическую модель движения вселенной<div class="g-task-footer-urgency g-medium-urgency"></div></div>
                    </a>
                    <div class="g-task-footer">
                        <div class="g-task-footer-date">
                            12.08 - <span class="g-task-footer-date-overdue">12.10</span>
                        </div>

                        <a class="g-arrow-left-icon" href="#" title="Изменить статус"></a>
                    </div>
                </div>
                <div class="g-task g-task-ok">

                    <a class="open-g-task" href="#">
                        <div class="g-task-header"><div class="g-task-header-name">Мне поручил Антон Иванович Иванов:</div>
                            Заказать новую воду в кулер и кофемашину<div class="g-task-footer-urgency"></div></div>
                    </a>
                    <div class="g-task-footer">
                        <div class="g-task-footer-date">
                            12.10 - <span class="g-task-footer-date-normal">15.11</span>
                        </div>

                        <a class="g-arrow-left-icon" href="#" title="Изменить статус"></a>
                    </div>

                </div>



            </div>
        </div>
    </div>
    <!-- end of content -->
@stop
