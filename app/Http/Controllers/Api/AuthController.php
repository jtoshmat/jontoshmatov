<?php

namespace app\Http\Controllers\Api;

use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Session;
use app\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        // $header = $this->getCredentialsFromHeader();
        // $email = $header['email'];
        // $password = $header['password'];

        $ha = base64_decode(substr(\Request::header('Authorization'), 6));
        list($email, $password) = explode(':', $ha);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return $this->respondWithArray(['message' => 'Welcome!']);
        } else {
            return $this->errorUnauthorized();
        }
    }

    public function updatePassword(){
        $user_id = (int) Input::get('user_id');
        $user = User::findFromInput($user_id);

        if(!$user->canUpdate($this->currentUser)){
            return $this->errorUnauthorized();
        }

        $validator = Validator::make($data = Input::all(), User::$passwordUpdateRules);
        if ($validator->fails()) {
            return $this->errorWrongArgs($validator->errors()->all());
        }

        if($user->updatePassword($user, $data['password_confirmation'])) {
            return $this->respondWithArray(array('message' => 'The password has been updated successfully.'));
        }
        return $this->errorInternalError('Something went wrong, please try again.');
    }

    public function logout()
    {
        Auth::logout();
    }
}
