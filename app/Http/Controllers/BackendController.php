<?php namespace App\Http\Controllers;
use App\User;

/**
 * Created by PhpStorm.
 * User: cshen
 * Date: 15-7-28
 * Time: 下午3:55
 */

class BackendController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return \App\Http\Controllers\BackendController
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function getShowAll()
    {
        $users = User::all();
        return view('backend.show', ['users'=>$users]);
    }
}
