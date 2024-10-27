@extends('layouts.main')
@section('content')
    <form action=" {{ route('delete', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
    <div>
    <a href="{{ route('edit', $user->id) }}" class="btn btn-warning ">Редактировать</a>
    </div>

    <div>ID | {{ $user->getId() }}</div>
    <div>Имя | {{ $user->getFName() }}</div>
    <div>Фамилия | {{ $user->getLName() }}</div>
    <div>Отчёство | {{ $user->getMName() }}</div>
    <div>Дата рождения | {{ $user->getBirthday() }}</div>
    <div>Пароль | {{ $user->getPassword() }}</div>
    <div>Email | {{ $user->getEmail() }}</div>
    <div><img src="{{ url('storage/'.$user->getImage()) }}" alt="Аватарка пользователя"> </div>
{{--    <img src="../../storage/images/vXWF8ZoJ5IGsv3lBOTIazXubWdvCMlG5y8PK7yNL.gif" alt="">--}}


    <a href="{{ route('index') }}" class="btn btn-dark">Вернуться назад</a>
@endsection
