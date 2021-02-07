<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPremission;
use App\Models\Article;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->premission != 1)
        {
            return Redirect::to('/admin');
        }
        $page = 'user';
        $users = User::where('id', '!=', Auth::user()->id)->orderby('updated_at', 'desc')->paginate(10);
        $countArticle = Article::count();
        $countUsers = User::where('id', '!=', Auth::user()->id)->count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.users.index')->with([
            'page' => $page,
            'page_values' => $page,
            'users' => $users,
            'countArticle' => $countArticle,
            'countUsers' => $countUsers,
            'last5articles' => $last5articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->premission != 1)
        {
            return Redirect::to('/admin');
        }
        $page = 'user';
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        $userPremission = UserPremission::orderby('premission', 'asc')->get();
        return view('admin.users.create')->with([
            'page' => $page,
            'page_values' => $page,
            'countArticle' => $countArticle,
            'userPremission' => $userPremission,
            'last5articles' => $last5articles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::where('email', $request->email)->count() == 1)
        {
            return back()->with([
                'error' => $request->email.' и-мэйл хаяг системд давхардаж байна.',
                'backlname' => $request->lname,
                'backfname' => $request->fname,
                'backphone' => $request->phone,
                'backemail' => $request->email,
                'backpremission' => $request->premission,
            ]);
        }
        if(User::where('phone', $request->phone)->count() == 1)
        {
            return back()->with([
                'error' => $request->phone.' утасны дугаар системд давхардаж байна.',
                'backlname' => $request->lname,
                'backfname' => $request->fname,
                'backphone' => $request->phone,
                'backemail' => $request->email,
                'backpremission' => $request->premission,
            ]);
        }

        User::create([
            'premission' => $request->premission,
            'lname' => $request->lname,
            'fname' => $request->fname,
            'nickname' => 'null',
            'phone' => $request->phone,
            'birthday' => now(),
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->phone),
        ])->save();

        return Redirect::to('/admin/users')->with('success', Auth::user()->email.' и-мэйл хаягтай хэрэглэгч та системд '.$request->email.' и-мэйл хаягтай хэрэглэгчийн мэдээллийг амжилттай нэмлээ.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->premission != 1)
        {
            return Redirect::to('/admin');
        }
        if(User::where('id', $id)->count() != 1)
        {
            return Redirect::to('/admin/users');
        }
        $user = User::where('id', $id)->get();
        $page = 'user';
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        return view('admin.users.show')->with([
            'page' => $page,
            'page_values' => $page,
            'countArticle' => $countArticle,
            'last5articles' => $last5articles,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->premission != 1)
        {
            return Redirect::to('/admin');
        }
        if(User::where('id', $id)->count() != 1)
        {
            return Redirect::to('/admin/users');
        }
        $user = User::where('id', $id)->get();
        $page = 'user';
        $countArticle = Article::count();
        $last5articles = Article::orderby('updated_at', 'desc')->take(5)->get();
        $userPremission = UserPremission::orderby('premission', 'asc')->get();
        return view('admin.users.edit')->with([
            'page' => $page,
            'page_values' => $page,
            'countArticle' => $countArticle,
            'userPremission' => $userPremission,
            'last5articles' => $last5articles,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::where('id', '!=', $id)->where('email', $request->email)->count() == 1)
        {
            return back()->with([
                'error' => $request->email.' и-мэйл хаяг системд давхардаж байна.',
                'backlname' => $request->lname,
                'backfname' => $request->fname,
                'backphone' => $request->phone,
                'backemail' => $request->email,
                'backpremission' => $request->premission,
            ]);
        }
        if(User::where('id', '!=', $id)->where('phone', $request->phone)->count() == 1)
        {
            return back()->with([
                'error' => $request->phone.' утасны дугаар системд давхардаж байна.',
                'backlname' => $request->lname,
                'backfname' => $request->fname,
                'backphone' => $request->phone,
                'backemail' => $request->email,
                'backpremission' => $request->premission,
            ]);
        }
        $old = User::where('id', $id)->get();

        User::where('id', $id)->update([
            'premission' => $request->premission,
            'lname' => $request->lname,
            'fname' => $request->fname,
            'phone' => $request->phone,
            'email' => $request->email,
            'email_verified_at' => now(),
        ]);

        return Redirect::to('/admin/users')->with('success', Auth::user()->email.' и-мэйл хаягтай хэрэглэгч та '.$old[0]->email.' и-мэйл хаягтай хэрэглэгчийн мэдээллийг засварлалаа.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::where('id', $id)->count() != 1)
        {
            return Redirect::to('/admin/users');
        }
        if(Auth::user()->id == $id)
        {
            return Redirect::to('/admin/users');
        }
        if(Auth::user()->premission != 1)
        {
            return Redirect::to('/admin');
        }
        $old = User::where('id', $id)->get();
        User::where('id', $id)->delete();
        return Redirect::to('/admin/users')->with('success', Auth::user()->email.' и-мэйл хаягтай хэрэглэгч та '.$old[0]->email.' и-мэйл хаягтай хэрэглэгчийн мэдээллийг системээс амжилттай хаслаа.');
    }

    public function changerpassword(Request $request, $id)
    {
        if(Strlen($request->password) < 7)
        {
            return back()->with('error', 'Нууц үг 8 Буюу түүнээс дээш тэмдэгтийг агуулах ёстой.');
        }
        if($request->password != $request->repassword)
        {
            return back()->with('error', 'Нууц үг таарахгүй байна.');
        }
        $old = User::Where('id', $id)->get();
        User::Where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);
        return Redirect::to('/admin/users')->with('success', Auth::user()->email.' и-мэйл хаягтай хэрэглэгч та '.$old[0]->email.' и-мэйл хаягтай хэрэглэгчийн нууц үгийг амжилттай солилоо.');
    }

    public function dropbox(Request $request)
    {
        $message = "";
        $count = 0;
        foreach($request->user_id as $value => $id)
        {
            $old = User::where('id', $id)->get();

            User::where('id', $id)->delete();

            if($value != 0)
            {
                $message .= ', '.$old[0]->email;
            }
            else{
                $message .= $old[0]->email;
            }
            $count += 1;
        }
        if($count == 1)
        {
            $message .= ' и-мэйл хаягтай хэрэглэгчийг системээс хасагдлаа.';
        }
        else{
            $message .= ' и-мэйл хаягтай хэрэглэгчүүдийг тус тус системээс хасагдлаа.';
        }
        return Redirect::to('/admin/users')->with('success', $message);
    }
}
