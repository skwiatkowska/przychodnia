@extends('layout')

@section('title', 'Przychodnia')

@section('content')

    @if ($errors)
        <div class="alert alert-success">
            Wystąpiły następujące błędy:<br/>
            <ul>
                @foreach($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection