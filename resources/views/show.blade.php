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

    <div>ID | {{ $user->id }}</div>
    <div>Имя | {{ $user->f_name }}</div>
    <div>Фамилия | {{ $user->l_name }}</div>
    <div>Отчёство | {{ $user->m_name }}</div>
    <div>Дата рождения | {{ $user->birthday }}</div>
    <div>Пароль | {{ $user->password }}</div>
    <div>Email | {{ $user->email }}</div>
    <div><img src="{{ url('storage/'.$user->image) }}" alt="Аватарка пользователя"> </div>
{{--    <img src="../../storage/images/vXWF8ZoJ5IGsv3lBOTIazXubWdvCMlG5y8PK7yNL.gif" alt="">--}}


    <a href="{{ route('index') }}" class="btn btn-dark">Вернуться назад</a>
@endsection
