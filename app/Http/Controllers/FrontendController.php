<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: cshen
 * Date: 15-7-28
 * Time: 下午3:56
 */
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Log, Config;
use App\User;
use Intervention\Image\Facades\Image;
use Wechat;

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
        $data = Config::get('questions.questions');
        return view('frontend.apply',$data);
    }

    public function postApply()
    {
        $v = Validator::make(Request::all(), [
            'name' => 'required|between:1,10',
            'gender' => 'required|between:1,2',
            'wechat_account' => 'required|between:1,20',
            'age' => 'required|numeric|between:18,50',
            'city' => 'required|between:1,10',
            'job' => 'required|between:1,20',
            'height' => 'numeric',
//            'interest' => 'between:0,100',
            'self_intro' => 'required|between:10,200',
//            'expectation' => 'required|between:10,200',
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
            $user->job = Request::input('job');
            $user->interest = Request::input('interest');
            $user->self_intro = Request::input('self_intro');
            $user->expectation = Request::input('expectation');
            $user->type = User::TYPE_MEMBER;

            // handle images
            $file_extension = Request::file('photo1')->getClientOriginalExtension();
            $file_name = $user->name."_01.".$file_extension;
//            Request::file('photo1')->move('photos', $file_name);
            $user->photo1 = "photos/formal/".$file_name;
            // create instance
//            $this->image_process($file_name);

//            if (Request::hasFile('photo2')) {
//                $file_extension = Request::file('photo2')->getClientOriginalExtension();
//                $file_name = $user->name."_02.".$file_extension;
//                Request::file('photo2')->move('photos', $file_name);
//                $user->photo2 = "photos/formal/".$file_name;
//                $this->image_process($file_name);
//            }
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

        // upload to wechat server
//        $media = Wechat::media();
//        $imageId = $media->image("photos/formal/".$file_name); // 上传并返回媒体ID
    }

    public function getUsersByGender()
    {
        $id = Request::input('id');
        $self = User::where('id','=', $id)->get();

        $users = User::where('gender','=', Request::input('gender'))
            ->where('type','=',User::TYPE_MEMBER)
//            ->whereNotNull('reviews')
            ->orderBy('id', 'desc')
            ->get();

        $user_map = [];
        foreach($users as $user) {
            $rate = $this->similarity($self->feature, $user->feature);
            $user_map[] = ['rate'=>$rate, 'user' => $user];
        }

        return view('frontend.user_list', ['users'=>$users]);
    }

    /**
     * @param $a  '1,2,3;1,2,3'
     * @param $b  '1,2,3;1,2,5'
     * @return float
     */
    public function similarity($a, $b)
    {
        $a=rtrim($a, ";");
        $b=rtrim($b, ';');

        $featrue_a = explode(';', $a);
        $featrue_b = explode(';', $b);

        // compare
        $total_rates = 0;
        foreach($featrue_a as $index=>$vals) {
            $val_arr_a = explode(',', $vals);
            $val_arr_b = explode(',', $featrue_b[$index]);

            $total = count($val_arr_a);
            $same_ele = array_intersect($val_arr_a, $val_arr_b);
            $total_rates += count($same_ele)/$total;
        }

        return $total_rates/count($featrue_a);
    }

}
