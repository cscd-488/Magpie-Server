<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use League\OAuth2\Client\Provider\Facebook;

class Controller extends BaseController
{

    private $facebookClient;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->facebookClient = new Facebook([
            'clientId'          => '1678368379046192',
            'clientSecret'      => 'f8f3546ba43431d3be08224653775175',
            'redirectUri'       => 'https://playground.app',
            'graphApiVersion'   => 'v2.5',
        ]);
    }

    public function facebookLogin(Request $request){

        // https://github.com/thephpleague/oauth2-facebook
        // https://developers.facebook.com/docs/facebook-login/manually-build-a-login-flow

        $fbAuthCode = $request->get('token');

        $fbAccessToken = $this->facebookClient->getLongLivedAccessToken($fbAuthCode);

        $owner = $this->facebookClient->getResourceOwner($fbAccessToken);

        return $owner->toArray();
    }
}
