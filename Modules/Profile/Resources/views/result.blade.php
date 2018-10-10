@extends('profile::layouts.master')

@section('title', 'Реквизиты карты')

@section('content')
    <!-- content -->
    <div class="q-content">
        <div class="q-inner">
            <div class="q-page__header">
                @if(Session::has('success'))
                    <h1 class="alert alert-success">
                        {{ Session::get('success') }}
                    </h1>
                @elseif(Session::has('error'))
                    <h1 class="alert alert-success">
                        {{ Session::get('error') }}
                    </h1>
                @endif
            </div>
        </div>
    </div>
    <!-- end of content -->
@stop