@extends('admin::layouts.master')

@section('content')
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header _single-title">
                <h1 class="q-page__title">Проекты:</h1>
                <div class="q-buttons__submit _hide-992">
                    <a href="users" class="q-button _red js-show-q-create-project-popup">Список пользователей</a>
                    <a href="prices" class="q-button _red js-show-q-create-project-popup">Настройка цен</a>
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
            <div class="q-my-actions">
                <table class="q-simple-table _tm q-actions-table">
                    <thead>
                    <tr>
                        <th>Проект</th>
                        <th>Действие</th>
                    </tr>
                    @foreach($projects as $project)
                        <tr>
                            <td class="table-projects-1 _title-col">
                                <a class="#">{{ $project->title }}</a>
                            </td>
                            <td>
                                <div class="q-buttons__list">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.project.delete', $project]]) !!}
                                    {!! Form::submit('Удалить', ['class' => 'q-button _xs _light-gray _uppercase']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </thead>
                </table>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
    <!-- end of content -->
@stop
