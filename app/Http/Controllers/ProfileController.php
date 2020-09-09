<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view("admin.profile.edit");
    }

    public function updateInformation(Request $request)
    {
        $user = User::findOrFail(\Auth::user()->id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->save();
        toastr()->success('Profile berhasil diupdate');
        return back();
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(\Auth::user()->id);
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->newpassword);
            $user->save();
            toastr()->success('Password berhasil diupdate');
            return back();
        } else {
            toastr()->error('Password gagal diupdate, password lama tidak sesuai');
            return back();
        }
    }

    public function updateImage(Request $request)
    {
        $user = User::findOrFail(\Auth::user()->id);

        $path = public_path("assets/images") . "/" . $request->image_user;
        $fileName = time() . '.' . $request->image_user->extension();
        $request->file('image_user')->move(public_path('assets/images/'), $fileName);


        if ($user->image_user !== null) {

            unlink($path);
        }
        $user->image_user = $fileName;
        $user->save();
        toastr()->success('Foto profil berhasil diupdate');
        return back();
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make($user->email);
        $user->save();
        toastr()->success('Password ' . $user->name . ' berhasil direset');
        return back();
    }
}
