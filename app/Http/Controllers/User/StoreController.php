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
           'f_name' => $request->string('f_name'),
           'l_name' => $request->string('l_name'),
           'm_name' => $request->string('m_name'),
           'birthday' => $request->date('birthday'),
           'password' => Hash::make($request->string('password')),
           'email' => $request->string('email'),
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
