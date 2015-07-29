<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: cshen
 * Date: 15-7-28
 * Time: 下午3:56
 */
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | FrontendController Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
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
    public function getApply()
    {
        return view('frontend.apply');
    }

    public function postApply()
    {
        $v = Validator::make(Request::all(), [
//            'title' => 'required|unique|max:255',
//            'body' => 'required',
        ]);

        if ($v->fails()) {
            return 'failed';
//            return redirect()->back()->withErrors($v->errors());
        } else {
            return view('frontend.confirmed');
        }
    }

}
