<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: cshen
 * Date: 15-7-28
 * Time: 下午3:56
 */
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Log;
use App\User;

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
            'name' => 'required|between:1,10',
            'gender' => 'required|between:1,2',
            'wechat_account' => 'required|between:1,20',
            'age' => 'required|numeric|between:18,50',
            'city' => 'required|between:1,10',
            'height' => 'numeric',
//            'interest' => 'required|between:0,100',
//            'self_intro' => 'required|between:10,200',
//            'expectation' => 'required|between:10,200',
//            'photo1'=> 'required|image',
//            'photo2'=> 'image',
        ]);

        if ($v->fails()) {
//            print_r(Request::all());
            return redirect()->back()->withErrors($v->errors());
        } else {
            Log::info('new user profile: '. Request::input('name'));

            $user = new User();
            $user->name = Request::input('name');
            $user->gender = Request::input('gender');
            $user->wechat_account = Request::input('wechat_account');
            $user->age = Request::input('age');
            $user->height = Request::input('height');
            $user->city = Request::input('city');

            $user->interest = Request::input('interest');
            $user->self_intro = Request::input('self_intro');
            $user->expectation = Request::input('expectation');

            $file_extension = Request::file('photo1')->getClientOriginalExtension();
            Request::file('photo1')->move('photos', $user->name."_01.".$file_extension);
            $user->photo1 = "photos/".$user->name."_01.".$file_extension;

            if (Request::hasFile('photo2')) {
                $file_extension = Request::file('photo2')->getClientOriginalExtension();
                Request::file('photo2')->move('photos', $user->name."_02.".$file_extension);
                $user->photo2 = "photos/".$user->name."_02.".$file_extension;
            }
            $user->save();

            return view('frontend.confirmed');
        }
    }
}
