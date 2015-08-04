@extends('base')

@section('content')
<div id="container">
    <div class="bg-white">
        <div class="text-center content-padding">
            <form id="formToggleLine" class="form-horizontal no-margin" method="post" enctype="multipart/form-data" >
                <p>要脱单的小伙伴们，欢迎来到这里。我们追求优质可靠的嘉宾，所以我们推崇人脉网络推荐，熟人介绍嘉宾参的方式交友，品质高保证。我们希望您的关注和参与，能高效精准快捷地找到Mr/Mrs Right。</p>
                <h3>基本信息:</h3>
                @if($errors->has())
                @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
                @endforeach
                @endif
                <hr>
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" type="text" name="name" value="{{Request::old('name')}}" placeholder="姓名">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" type="text" name="wechat_account" value="{{Request::old('wechat_account')}}" placeholder="微信号">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <select name="gender" class="form-control">
                            <option value="0">性别</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                    <select name="age" class="form-control">
                        <option value="0">年龄</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                    </select>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <input name="city" class="form-control" type="text" value="{{Request::old('city')}}"  placeholder="目前居住地">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <input name="job" class="form-control" type="text" value="{{Request::old('job')}}"  placeholder="职业">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <input name="height" class="form-control" type="text" value="{{Request::old('height')}}"  placeholder="身高 (单位:cm)">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
<!--                <div class="form-group">-->
<!--                    <div class="col-lg-10">-->
<!--                        <input name="weight" class="form-control" type="text" placeholder="体重 (单位:kg)">-->
<!--                    </div>-->
<!--                </div>-->
                <h3>额外信息:</h3>
                <hr>
                <div class="form-group">
                    <div class="col-lg-10">
                        <input name="interest" class="form-control" type="text" value="{{Request::old('interest')}}"  placeholder="爱好">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <textarea name="self_intro" class="form-control" rows="5" placeholder="自我介绍。写的越详细越好...">{{Request::old('self_intro')}}</textarea>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <textarea name="expectation" class="form-control" rows="5" placeholder="期望寻求目标。写的越详细越好...">{{Request::old('expectation')}}</textarea>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <h3>照片:</h3>
                <hr>
                <div class="form-group">
                    <label class="col-xs-2 control-label">上传照片 1</label>
                    <div class="col-xs-10">
                        <input name="photo1" type="file">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-xs-2 control-label">上传照片 2</label>
                    <div class="col-xs-10">
                        <input name="photo2" type="file">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <hr>
                <button type="submit" class="btn btn-lg btn-success">提交</button>
            </form>
        </div>
    </div>
</div>
@endsection