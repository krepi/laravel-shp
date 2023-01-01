<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $fields = $request->validate([
            'username'=>['required', 'min:3','max:20',Rule::unique('users', 'username')],
            'email'=>['required', 'email', Rule::unique('users','email')],
            'password'=>['required', 'min:4','confirmed']
        ]);
        $fields['password'] = bcrypt($fields['password']);
       $user= User::create($fields);
        auth()->login($user);
        return redirect('/')->with('success', 'Thank You for creating account');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request){
        $fields= $request->validate([
            'loginusername'=>'required',
            'loginpassword'=>'required',
        ]);

        if (auth()->attempt(['username'=>$fields['loginusername'],'password'=> $fields['loginpassword']]))
        {
            $request->session()->regenerate();
            return redirect('/')->with('success','zalogowano ');
        }else{
            return redirect('/')->with('failure','bład logowania ');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'wylogowany');
    }
    public function showCorrectPage(){

        if(auth()->check()){
            return view('homepage-logged');
        } else {
            return view('welcome');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
