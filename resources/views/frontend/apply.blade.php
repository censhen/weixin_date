@extends('base')

@section('content')
<div id="container">
    <div class="bg-white">
        <div class="text-center content-padding">
            <form id="formToggleLine" class="form-horizontal no-margin form-border">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" placeholder="姓名">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-xs-10">
                        <select class="form-control">
                            <option>性别</option>
                            <option value="0">男</option>
                            <option value="1">女</option>
                        </select>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-xs-10">
                    <select class="form-control">
                        <option>年龄</option>
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
                        <input class="form-control" type="text" placeholder="身高 (单位:cm)">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="体重 (单位:kg)">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="5" placeholder="期望寻求目标"></textarea>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="爱好、特长">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="5" placeholder="自我介绍"></textarea>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-xs-2 control-label">上传照片 1</label>
                    <div class="col-xs-10">
                        <input type="file">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-xs-2 control-label">上传照片 2</label>
                    <div class="col-xs-10">
                        <input type="file">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <button type="submit" class="btn btn-lg btn-success">提交</button>
            </form>
        </div>
    </div>
</div>
@endsection