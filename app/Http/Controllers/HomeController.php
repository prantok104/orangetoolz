<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Todo;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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
        try {
            $data = [
                'categories_count' => Category::Creator()->count(),
                'tags_count'       => Tag::Creator()->count(),
                'users_count'      => User::count(),
                'todos_count'      => Todo::Creator()->count(),
                'favourites'       => Todo::Favourite()->paginate(2)
            ];

            return view('dashboard', compact('data'));
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }


    /**
     * System restart
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function systemRestart()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Toastr::success('System restart completed', 'Success');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }
}
