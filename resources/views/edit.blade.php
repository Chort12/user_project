@extends('layouts.main')
@section('content')
    <form action=" {{ route('update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label" > Имя </label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="f_name" required value="{{ $user->f_name }}">

            @error('f_name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="surname" name="l_name" value="{{ $user->l_name }}">

            @error('l_name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="patronymic" class="form-label">Отчество</label>
            <input type="text" class="form-control" id="patronymic" name="m_name" value="{{ $user->m_name }}">

            @error('m_name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date_birth" class="form-label">Дата рождения</label>
            <input type="date" class="form-control" id="date_birth" name="birthday" value="{{ $user->birthday }}">

            @error('birthday')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="text" class="form-control" id="password" name="password" value="{{ $user->password }}">

            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

            <div class="mb-3">
                <label for="email" class="form-label">Мыло</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">

                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        <div><img src="{{ url('storage/'.$user->image) }}" alt="Аватарка пользователя"> </div>


        <div class="input-group">
            <label for="inputGroupFile04">Сменить аватарку</label>
            <input type="file" class="form-control" id="inputGroupFile04" aria-label="Загрузка" name="image">

            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

            <button type="submit" class="btn btn-success">Отредактировать пользователя</button>
            <a href="{{ route('index') }}" class="btn btn-dark">Вернуться назад</a>
        </form>
@endsection
