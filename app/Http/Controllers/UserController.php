<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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

    public function updateProfile(User $user, Request $request){

        $user = User::where('_id', $user->id)->select('username', 'email')->first();
        $oldUsername = $user->username;
        $oldEmail = $user->email;
        $newUsername = $request->input('username');
        $newEmail = $request->input('email');

        if ($oldUsername !== $newUsername) {
             $username = $request->validate([
            'username'=> ['required', 'min:3','max:20',Rule::unique('users', 'username')]
        ]);

    }

        if ($oldEmail !== $newEmail) {
            $email = $request->validate([
            'email'=>['required', 'email', Rule::unique('users','email')]
        ]);

    }

        User::where('_id', $user->id)->update(['username' => $newUsername, 'email' => $newEmail]);
        return redirect()->to('/edit-profile/'.$newUsername)->with('success', 'Profil został zaktualizowany!');

    }

    public function showEditProfileForm(User $user){
        return view('edit-profile', ['avatar' => $user->avatar, 'username' => $user->username, 'email' => $user->email]);

    }

    public function updatePassword(User $user, Request $request){
        $fields = $request->validate([
            'old-password'=>'required',
            'new-password'=>['required', 'min:4','confirmed']
        ]);

        $oldPassword = $fields['old-password'];
        $hashedPassword = User::where('_id',$user->id)->first()->password;

        if(Hash::check($oldPassword, $hashedPassword))
        {
            $user->password = bcrypt($fields['new-password']);
            $user->save();

           return redirect('/')->with('success', 'Hasło zostało zmienione');
        }else{
            return redirect()->back()->with('failure','Hasło nie pasuje do obecnego hasła. Proszę spróbuj ponownie.');
        }

    }


    public function deleteProfile(User $user, Request $request){

        $field= $request->validate([
            'password'=>'required',
        ]);

        $inputPassword = $field['password'];
        $hashedPassword = User::where('_id',$user->id)->first()->password;

        if(Hash::check($inputPassword, $hashedPassword))
        {
            $request->session()->regenerate();
            Post::where('user_id', $user->id)->delete();
            $user->delete();

           return redirect('/')->with('success', 'Profil został usunięty');
        }else{
            return redirect()->back()->with('failure','Twoje obecne hasło nie pasuje do hasła, które podałeś. Proszę spróbuj ponownie.');
        }

    }

    public function showDeleteForm(User $user){
        return view('profile-deleted');

    }

    public function changePassword(User $user){
        return view('change-password', ['avatar' => $user->avatar, 'username' => $user->username, 'email' => $user->email]);

    }

    public function storeAvatar(Request $request){

        $request->validate([
         'avatar' => 'required|image|max:3000'
        ]);

        $user = auth()->user();
        $filename = $user->id . '-'.uniqid() . '.jpg';

        $imgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
        Storage::put('/public/avatars/'. $filename, $imgData);

        $oldAvatar = $user->avatar;

        $user->avatar = $filename;
        $user->save();

        if($oldAvatar != "/fallback-avatar.jpg"){
             Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        }

        return back()->with('success', 'Avatar został zmieniony!');

     }

    public function showAvatarForm(){
        return view('avatar-form');
    }

    private function checkFollowedPosts(User $user){

        $followedPosts = Follow::where('user_id', $user->id)->pluck('followedpost');
        $posts = [];
        foreach($followedPosts as $followedPost){
            $post_id = $followedPost;
            $posts[] = Post::where('_id', $post_id)->get();
        }

        return $posts;

    }

    public function profile(User $user){

        //$thePosts = $user->posts()->get();
        $followedPosts = $this->checkFollowedPosts($user);
        $countFollowed = count($followedPosts);

        return view('profile-posts', ['avatar' => $user->avatar, 'username' => $user->username, 'posts' =>$user->posts()->latest()->get(), 'postCount' =>$user->posts()->count(), 'postCountFollowed' => $countFollowed]);
    }

    public function postFollowing(User $user){

        // $followedPosts = Follow::where('user_id', $user->id)->pluck('followedpost');

        // foreach($followedPosts as $followedPost){
        //     $post_id = $followedPost;
        //     $posts[] = Post::where('_id', $post_id)->get();
        // }
        $followedPosts = $this->checkFollowedPosts($user);
        $countFollowed = count($followedPosts);

        return view('profile-following',['posts'=>$followedPosts, 'avatar' => $user->avatar, 'username' => $user->username, 'postCount' =>$user->posts()->count(), 'postCountFollowed' => $countFollowed]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerForm()
    {
        return view('register-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registerUser(Request $request)
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
        $posts = Post::latest()->paginate(4);
        if(auth()->check()){
            return view('homepage-logged',['posts'=>$posts]);
        } else {
            return view('homepage-notlogged',['posts'=>$posts]);
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
