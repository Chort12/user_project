<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
       $date = $request->validated();

       $user = User::create([
           'f_name' => request('f_name'),
           'l_name' => request('l_name'),
           'm_name' => request('m_name'),
           'birthday' => request('birthday'),
           'password' => Hash::make(request('password')),
           'email' => request('email'),
       ]);

       if (isset($date['image'])) {
           $date['image'] = Storage::disk('public')->put('/images', $date['image']);

           $pathImage = $date['image'];

           $user->update([
               'image' => $pathImage,
           ]);
       }

       return redirect('/');
   }
}
