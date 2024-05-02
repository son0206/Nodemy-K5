<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.login');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

         return User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),

       ]);
    }

    public function register(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required'
        ]); 
    
        $token = strtoupper(Str::random(10));
        $password = Hash::make($request->password);
        
        $user = User::create([
            'email' => $request->email,
            'password' => $password,
            'token' => $token
        ]);
    
        if($user) {
            Mail::send('emails.active_account', compact('user'), function($email) use($user){
                $email->subject('Xác nhận tài khoản');
                $email->to($user->email, $user->name);
            });
    
            return redirect()->route('user.login')->with('no', 'Thành công');
        }
    
        return redirect()->route('user.login');
        
    }
    public function logout(){
        Auth::guard('user')->logout();
        return redirect()->route('user.login');

   }
    public function actived(User $user,$token){
        if($user->token===$token){
            $user->update(['status' => 1]);
           return redirect()->route('user.login')->with('no','Thành công');
        }else{
           return redirect()->route('user.login')->with('no','Lỗi');
        }
    }
    

}
