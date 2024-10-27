@extends('layouts.main')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Отчество</th>
            <th scope="col">Пароль</th>
            <th scope="col">Дата рождения</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>

        <a href=" {{ route('create') }} " class="btn btn-success m-2" >Создать пользователя</a>

        @foreach ($users as $user)
            <tr>
                <th scope="row"><a href="{{ route('show', $user->id) }}">{{ $user->id }}</a></th>
                <td>{{ $user->f_name}}</td>
                <td>{{ $user->l_name}}</td>
                <td>{{ $user->m_name }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->birthday }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
