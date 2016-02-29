<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected $redirectPath = '/home';

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $userFromSocialMedia = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('auth/'.$provider);
        }

        $authUser = $this->findOrCreateUser($userFromSocialMedia);

        Auth::login($authUser, true);
        Flash::success('You are logged in');
        return redirect('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($userFromSocialMedia)
    {
        Log::info('findOrCreateUser');
        $authUser = User::where('social_id', $userFromSocialMedia->id)->first();
        if ($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $userFromSocialMedia->name,
            'email' => $userFromSocialMedia->email,
            'social_id' => $userFromSocialMedia->id,
            'avatar' => $userFromSocialMedia->avatar
        ]);
    }

}
