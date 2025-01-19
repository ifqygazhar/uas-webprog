<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index', []);
    }

    public function allPostView()
    {
        return view('dashboard.allposts.index', []);
    }

    public function destroyPost(): RedirectResponse
    {
        // if ($post->image) {
        //     Storage::delete($post->image);
        // }

        // Post::destroy($post->id);

        return redirect('/dashboard/allposts')->with('success', 'Post has been deleted');
    }

    public function allUserView()
    {
        return view('dashboard.allusers.index', [
            'users' => User::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function createUser()
    {
        return view('dashboard.allusers.create');
    }

    public function storeUser(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed|min:8|max:255',
            'is_admin' => 'required',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        return redirect('/dashboard/allusers')->with('success', 'Success create user');
    }

    public function editUser(User $user)
    {
        return view('dashboard.allusers.edit', [
            'user' => $user,
        ]);
    }

    public function updateUser(Request $request, User $user): RedirectResponse
    {
        $rules = [
            'password' => 'required|confirmed|min:8|max:255',
            'is_admin' => 'required',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        $validate = $request->validate($rules);

        $validate['password'] = Hash::make($validate['password']);

        User::where('id', '=', $user->id)->update($validate);

        return redirect('/dashboard/allusers')->with('success', 'Success update user');
    }

    public function destroyUser(User $user): RedirectResponse
    {
        User::destroy($user->id);

        return redirect('/dashboard/allusers')->with('success', 'Success delete user');
    }
}
