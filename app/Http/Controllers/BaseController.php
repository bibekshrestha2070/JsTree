<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected $layout = 'main';
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            // share current route in all views
            View::share('current_url',url()->current());
            // share current logged in user details all views
            View::share('current_user', $this->current_user());

            return $next($request);
        });


    }

    public function current_user()
    {
        $current_user =$this->user;


        return $current_user;

    }
    function success(array $data = array())
    {
        $response = ['status' => 1, 'data' => $data];

        return Response::json($response);
    }


    /**
     * return failed json data to view
     * @param array $data
     * @return mixed
     */
    function fail(array $data = array())
    {
        $response = ['status' => 0, 'data' => $data];

        return Response::json($response);
    }

}

