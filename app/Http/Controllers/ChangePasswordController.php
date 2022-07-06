<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change_password($id)
    {
        $user = User::find($id);
        return view('changepassword');
    }

    public function update_password(Request $request, User $profile)
    {
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Current Password Does not Match');
        }
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return redirect()->back()->with('error', 'Current Password and New Password cannot be same');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return back()->with('success', 'Password Changed Successfully');
        // dd('done');
        // return redirect(route('profile.index'));
    }
}
