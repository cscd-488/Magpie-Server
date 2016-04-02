<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            'clientId'          => '170378995036-99ob67o6p5871kn02omq6bh5blb25070.apps.googleusercontent.com',
            'clientSecret'      => env("CLIENT_SECRET"),
            'redirectUri'       => 'http://magpieserver.com',
        ]);

        $this->authTokenProvider = $auth;
    }

    public function googleLogin(Request $request)
    {

        // https://github.com/thephpleague/oauth2-google
	print "test";
        // get and use token to obtain access token
        $token = $this->googleClient->getAccessToken('authorization_code', [
            'code' => $request->get('code')
        ]);

        // get owner details
        try {

            $owner = $this->googleClient->getResourceOwner($token);

            $user = User::findOrCreateByGoogleId($owner->getId());
            $user->fill([
                'first_name'    => $owner->getFirstName(),
                'last_name'     => $owner->getLastName()
            ]);
            $user->save();

            // generate jwt token
            $userToken = $this->authTokenProvider->fromUser($user);


            return [
                'token' => $userToken,
            ];

        } catch (Exception $e) {
            exit('Failed to get Resource: '.$e->getMessage());
        }

    }

}
