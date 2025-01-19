<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;
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
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'sizes' => 'required|array', // Validasi sizes sebagai array
            'sizes.*' => 'in:XXL,XL,L,M,S', // Validasi setiap elemen sizes
            'harga' => 'required',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('post-images'), $imageName);
            $validate['image'] = 'post-images/' . $imageName;
        }

        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 300);
        $validate['sizes'] = json_encode($request->sizes); // Simpan sizes sebagai JSON

        Post::create($validate);

        return redirect('/dashboard/allposts')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'sizes' => 'required|array', // Validasi sizes sebagai array
            'sizes.*' => 'in:XXL,XL,L,M,S', // Validasi setiap elemen sizes
            'harga' => 'required',
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validate = $request->validate($rules);

        if ($request->file('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                $oldImagePath = public_path($post->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan gambar baru ke public/post-images
            $newImage = $request->file('image');
            $imageName = time() . '-' . $newImage->getClientOriginalName();
            $newImage->move(public_path('post-images'), $imageName);

            $validate['image'] = 'post-images/' . $imageName; // Simpan path relatif gambar
        } else {
            // Gunakan gambar lama jika tidak ada gambar baru
            $validate['image'] = $request->oldImage;
        }


        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 300);
        $validate['sizes'] = json_encode(json_encode($request->sizes));

        Post::where('id', $post->id)->update($validate);

        return redirect('/dashboard/allposts')->with('success', 'Post has been updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            $imagePath = public_path($post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        Post::destroy($post->id);

        return redirect('/dashboard/allposts')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request): JsonResponse
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json([
            'slug' => $slug
        ]);
    }
}
