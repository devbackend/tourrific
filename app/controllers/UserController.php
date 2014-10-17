<?php
/**
 * Created by PhpStorm.
 * User: tsbgroup
 * Date: 17.10.14
 * Time: 23:12
 */

class UserController extends BaseController
{

    public function viewForm()
    {
        return View::make('register');
    }

    public function saveProfile()
    {
        $user_login = Input::get('user_login');
        $user_pass = Input::get('user_pass');
        $user_email = Input::get('user_email');

        /**
         * @todo: локализация
         */

        $userDataValidate = Validator::make(
            array(
                'login' => $user_login,
                'pass' => $user_pass,
                'email' => $user_email
            ),
            array(
                'login' => 'required|min:4|unique:users',
                'pass' => 'required|min:6',
                'email' => 'required|email|unique:users'
            )
        );

        if($userDataValidate->fails())
            return View::make('signError', array('errors' => $userDataValidate->messages()->all()));

        $user = new User();

        $user->login = $user_login;
        $user->pass  = Hash::make($user_pass);
        $user->email = $user_email;

        $user->save();

        Session::push('auth_login', $user_login);
        Session::push('auth_status', true);

        return View::make('signSuccess');
    }

    public function login()
    {
        $login = Input::get('login');
        $pass  = Input::get('pass');

        $user = User::where('login', '=', $login)->first();
        if(count($user) == 0)
            exit('Неверный пользователь');//return View::make('loginError');

        if(!Hash::check($pass, $user->pass))
            exit('Неверный пароль: <br />'.Hash::make($pass).'<br />'.$user->pass);//return View::make('loginError');

        Session::push('auth_login', $login);
        Session::push('auth_status', true);
    }

    public function logout()
    {
        Session::forget('auth_login');
        Session::push('auth_status', false);

        return Redirect::to('/');
    }
} 