<?php

namespace Buiz\Http\Controllers\Auth;

use Buiz\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Buiz\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Mail;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'email.unique' => 'El correo electrónico ya ha sido registrado previamente. Inicia sesión o intenta recuperar tu contraseña.'
        ];
        return Validator::make($data, [
            'email' => 'required|email|unique:users|min:8|max:50',
            'password' => 'required|confirmed|min:8|max:200',
            'userType' => 'required|boolean',
            'names' => 'required|min:3|max:100',
            'lastName' => 'required|min:3|max:100',
            'lastName2' => 'present|min:3|max:100',
            'sex' => 'present|in:Male,Female',
        ], $messages);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        return redirect()->route('login')
            ->with('messageActivation', 'Activa tu cuenta usando el enlace que enviamos a ')
            ->with('email', $user->email);;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'userType' => $data['userType'],
            'names' => $data['names'],
            'lastName' => $data['lastName'],
            'lastName2' => $data['lastName2'],
            'sex' => $data['sex']
        ]);
        $user->status = false;
        $user->tokenActivation = str_random(40);
        $user->save();

        $url = route('activation', ['token' => $user->tokenActivation]);

        Mail::send('emails.register', compact('user', 'url'), function ($message) use ($user) {
            $message->from('noreply@buiz.me', 'Buiz.me');
            $message->to($user->email, $user->names)->subject('Activa tu cuenta en Buiz');
        });

        return $user;
    }

    protected function getActivation($token)
    {
        $user = User::where('tokenActivation', $token)->first();
        if ($user !== null) {
            $user->tokenActivation = null;
            $user->status = 1;
            $user->save();
            return redirect()->route('login')
                ->with('messageActivation', 'Ahora puedes iniciar sesión.');
        } else {
            return redirect()->route('login')
                ->with('errorActivation', 'El enlace de activación no es válido');
        }

    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        // Only access to active users
        return [
            'email'    => $request->get('email'),
            'password' => $request->get('password'),
            'status'   => true,
            'tokenActivation' => null
        ];
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route('home');
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        return $this->logout();
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard($this->getGuard())->logout();
        return redirect()->route('login');
    }
}
