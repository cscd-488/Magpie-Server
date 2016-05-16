<?php
/**
 * @author Benjamin Daschel
 * Date: 1/23/16
 */

namespace App\Http\Middleware;



use Closure;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class JWTAuthCheck
{

    private $auth;

    /**
     * JWTAuthCheck constructor.
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next)
    {
//        $token = $request->header('Authorization');

        try{
            $this->auth->parseToken();
            $this->auth->toUser();
        }catch (JWTException $e){

            abort(403, 'Unauthorized action.');
        }
        $next($request);
    }

}