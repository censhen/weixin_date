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
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">身高</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="身高">
                        <span class="help-block">单位(cm)</span>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">体重</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="体重">
                        <span class="help-block">单位(kg)</span>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">爱好、特长</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="爱好、特长">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">自我介绍</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="5"></textarea>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">目标描述</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="5"></textarea>
                    </div><!-- /.col -->
                </div><!-- /form-group -->

                <button type="submit" class="btn btn-sm btn-success">提交</button>
            </form>
        </div>
    </div>
</div>
@endsection