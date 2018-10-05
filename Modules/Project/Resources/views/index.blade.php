@extends('project::layouts.master')

@section('content')
    <!-- content -->
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header _single-title">
                <h1 class="q-page__title">Мои проекты</h1>
                <div class="q-buttons__submit _hide-992">
                    <a href="projects/create" class="q-button _red js-show-q-create-project-popup">Создать проект</a>
                </div>

            </div>
            <div class="q-my-actions">
                <table class="q-simple-table _tm q-actions-table">
                    <thead>
                    <tr>
                        <th>Проект</th>
                        <th>Моя роль</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $p)
                            <tr>
                                <td class="table-projects-1 _title-col">
                                    <a class="q-news__info--title" href="{{ URL::to('projects/' . $p->id) }}">{{ $p->title }}</a>
                                </td>
                                <td class="table-projects-2">
                                    <p class="_gray-text">
                                        Администратор
                                    </p>
                                </td>
                                <td>
                                    <div class="q-buttons__list">
                                        <a href="{{ URL::to('projects/' . $p->id) . '/edit' }}" class="q-button _xs _light-gray _uppercase js-show-q-edit-user-project-popup">Изменить
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['project.destroy', $p]]) !!}
                                        {!! Form::submit('Удалить', ['class' => 'q-button _xs _light-gray _uppercase']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
    <!-- end of content -->
@stop
