@extends('admin::layouts.master')

@section('content')
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header _single-title">
                <h1 class="q-page__title">Пользователи:</h1>
                <div class="q-buttons__submit _hide-992">
                    <a href="projects" class="q-button _red js-show-q-create-project-popup">Список проектов</a>
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
                        <th>Пользователь</th>
                        <th>E-mail</th>
                        <th>Баланс</th>
                        <th>Роль</th>
                        <th>Действие</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td class="table-projects-1 _title-col">
                                <a class="#">{{ $user->name }}</a>
                            </td>
                            <td class="table-projects-2">
                                <p class="_gray-text">
                                    {{ $user->email }}
                                </p>
                            </td>
                            <td class="table-projects-2">
                                <p class="_gray-text">
                                    {{ $user->balance }}
                                </p>
                            </td>
                            <td>{{$user->role}}</td>
                            <td>
                                <div class="q-buttons__list">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.user.delete', $user]]) !!}
                                    {!! Form::submit('Удалить', ['class' => 'q-button _xs _light-gray _uppercase']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </thead>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
    <!-- end of content -->
@stop
