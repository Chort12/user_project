<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,User $user)
    {
        $date = $request->validated();

        if (isset($date['image']) && ($date['image'] != $user['image'])) {
            $date['image'] = Storage::disk('public')->put('/images', $date['image']);

            $pathImage = $date['image'];

            $user->update([
                'image' => $pathImage,
            ]);
        }

        if ($date['password'] != $user['password']) {
            $user->update([
                'password' => Hash::make($date['password']),
            ]);
        }

        $user->update([
            'f_name' => $request->string('f_name'),
            'l_name' => $request->string('l_name'),
            'm_name' => $request->string('m_name'),
            'birthday' => $request->date('birthday'),
            'email' => $request->string('email'),
        ]);

        return redirect()->route('show', $user->id);
    }
}
