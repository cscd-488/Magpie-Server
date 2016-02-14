<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use League\OAuth2\Client\Provider\Facebook;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class Controller extends BaseController
{
``
    private $facebookClient;
    private $authTokenProvider;

    /**
     * Controller constructor.
     */
    public function __construct(\Tymon\JWTAuth\JWTAuth $auth)
    {
        $this->facebookClient = new Facebook([
            'clientId'          => '1132303580136076',
            'clientSecret'      => 'be8b5568716ab55294283199d15f1b97',
            'redirectUri'       => 'http://event-test.app',
            'graphApiVersion'   => 'v2.5',
        ]);

        $this->authTokenProvider = $auth;
    }

    public function facebookLogin(Request $request)
    {

        // https://github.com/thephpleague/oauth2-facebook
        // https://developers.facebook.com/docs/facebook-login/manually-build-a-login-flow

        $fbAuthCode = $request->get('token');

        $fbAccessToken = $this->facebookClient->getLongLivedAccessToken($fbAuthCode);

        $owner = $this->facebookClient->getResourceOwner($fbAccessToken);

        $user = User::findOrCreateByFacebookId($owner->getId());

        $user->fill($owner->toArray());
        $user->save();

        $token = $this->authTokenProvider->fromUser($user);
        return [
            'token' => $token,
            'user' => $user
        ];
    }


}
