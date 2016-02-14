<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use League\OAuth2\Client\Provider\Google;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class Controller extends BaseController
{
    private $googleClient;
    private $authTokenProvider;

    /**
     * Controller constructor.
     */
    public function __construct(\Tymon\JWTAuth\JWTAuth $auth)
    {
        $this->googleClient = new Google([
            'clientId'          => '733348910797-5et9jiv9l6t5ev3n5mkcshgf86q1us6v.apps.googleusercontent.com',
            'clientSecret'      => 'H2NN3t58KDBx2eUVL68AnOn7',
            'redirectUri'       => 'http://event-web.app',
        ]);

        $this->authTokenProvider = $auth;
    }

    public function googleLogin(Request $request)
    {

        // https://github.com/thephpleague/oauth2-google

        $gpAuthCode = $request->get('token');
        $gpAccessToken = $this->googleClient->getLongLivedAccessToken($gpAuthCode);
        $owner = $this->googleClient->getResourceOwner($gpAccessToken);
        $user = User::findOrCreateByGoogleId($owner->getId());
        $user->fill($owner->toArray());
        $user->save();
        $token = $this->authTokenProvider->fromUser($user);
        return [
            'token' => $token,
            'user' => $user
        ];
    }


}
