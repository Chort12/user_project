<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('index', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'string',
            'surname' => 'string',
            'patronymic' => 'string',
            'date_birth' => 'date',
            'password' => 'string',
            'email' => 'string',
            'image' => 'string',
        ]);
//        Hash::make($data->password);

        User::create($data);
        return redirect('/');

    }

    public function show(User $user)
    {
        return view('show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    public function update(User $user)
    {
        $date = request()->validate([
            'name' => 'string',
            'surname' => 'string',
            'patronymic' => 'string',
            'date_birth' => 'date',
            'password' => 'string',
            'email' => 'string',
            'image' => 'string',
        ]);

        $path = $date;
        $path['image'] = Storage::disk('public')->put('/images', $path['image']);

        $pathImage = $path['image'];

        $user->update($date);
        return redirect()->route('show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/');
    }
}
