<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('home', compact('user'));
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'current_password' => 'required_with:new_password|current_password',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');

        if ($request->filled('new_password')) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
        }

        $user->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully.');
    }

    public function posts(){
        $posts = Auth::user()
            ->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('profile.posts', compact('posts'));
    }

    public function comments(){
        $comments = Auth::user()->comments()->OrderBy('created_at','desc')->paginate(5);

        return view('profile.comments', compact('comments'));
    }
}
