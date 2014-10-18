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

        Auth::loginUsingId($user->id);

        return Redirect::to('/profile');
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

    public function profile($user)
    {
	    $can_edit = false;
        if(!Auth::check() && Auth::user()->id==$user->id)
	        $can_edit = true;

	    $user_places = UserToPlaces::where('user_id', '=', $user->id);


        return View::make('profileView', array('user' => $user, 'can_edit'=>$can_edit, 'user_places'=>$user_places));
    }

    public function editProfile()
    {
        $newPassword = Input::get('new_pssword');
        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $about = Input::get('about_me');

        $user = User::find(Auth::user()->id);

        if(strlen($newPassword) != 0)
        {
            $userValidateNewPassword = Validator::make(
                array('password' => $newPassword),
                array('password' => 'required|min:6')
            );

            if($userValidateNewPassword->fails())
                return View::make('editProfileError');

            $user->password  = Hash::make($newPassword);
        }

        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->about_me = $about;

        $user->save();

        return Redirect::to('/profile');
    }
} 