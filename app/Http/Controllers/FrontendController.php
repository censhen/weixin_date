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
use Intervention\Image\Facades\Image;

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
            'interest' => 'between:0,100',
            'self_intro' => 'required|between:10,200',
            'expectation' => 'required|between:10,200',
            'photo1'=> 'required|image',
            'photo2'=> 'image',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
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
            $user->type = User::TYPE_MEMBER;

            // handle images
            $file_extension = Request::file('photo1')->getClientOriginalExtension();
            $file_name = $user->name."_01.".$file_extension;
            Request::file('photo1')->move('photos', $file_name);
            $user->photo1 = "photos/".$file_name;
            // create instance
            $this->image_process($file_name);

            if (Request::hasFile('photo2')) {
                $file_extension = Request::file('photo2')->getClientOriginalExtension();
                $file_name = $user->name."_02.".$file_extension;
                Request::file('photo2')->move('photos', $file_name);
                $user->photo2 = "photos/".$file_name;
                $this->image_process($file_name);
            }
            $user->save();

            return view('frontend.confirmed');
        }
    }

    protected function image_process($file_name)
    {
        // create instance
        $img = Image::make('photos/'.$file_name);
        // resize the image to a height of 200 and constrain aspect ratio (auto width)
        if($img->height() > 500) {
            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $img->save('photos/formal/'.$file_name);
    }
}
