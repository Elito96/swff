<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use App\Balance;
use App\Notificacion;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        Usuario::create([
            'name' => $data['name'],
            'password' => $data['password'],
            'token' => str_random(16),
        ]);
        $Model = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $ultimo = DB::table('users')->select('*')->get();
        $ultimo = $ultimo[count($ultimo)-1];
        $monedas = DB::table('moneda')->select('*')->get();
        for ($i=0; $i <count($monedas) ; $i++) { 
            Balance::create([
                'cantidad' =>'0.00000000',
                'moneda_id' => $monedas[$i]->id,
                'user_id' => $ultimo->id,
                'usuario_id' => $ultimo->id
            ]);
        }
        Notificacion::create([
            'usuario_id' => $ultimo->id,
            'nuevo' => '1',
            'mensaje' => 'Bienvenido',
        ]);
        return $Model;
    }
}
