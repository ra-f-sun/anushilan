<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function form()
    {
        return view('frontend.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $updateData = $request->except('image');

        $user->update($updateData);

        if ($request->hasFile('image')) {
            $user->clearMediaCollection();
            $user->addMediaFromRequest('image')->toMediaCollection();
        }
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);



        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors(['old_password' => "Old Password doesn't match!"]);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}
