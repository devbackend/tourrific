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
                'password' => $user_pass,
                'email' => $user_email
            ),
            array(
                'login' => 'required|min:4|unique:users',
                'password' => 'required|min:6',
                'email' => 'required|email|unique:users'
            )
        );

        if($userDataValidate->fails())
            return View::make('signError', array('errors' => $userDataValidate->messages()->all()));

        $user = new User();

        $user->login = $user_login;
        $user->password  = Hash::make($user_pass);
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

        $emailCheck = Validator::make(
            array('email' => $login),
            array('email' => 'email')
        );

        $authField = 'email';
        if($emailCheck->fails())
            $authField = 'login';

        if (Auth::attempt(array($authField => $login, 'password' => $pass)))
            return Redirect::intended();

        return View::make('loginError');
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::to('/');
    }
} 