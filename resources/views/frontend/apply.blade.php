@extends('base')

@section('content')
<div id="container">
    <div class="bg-white">
        <div class="text-center content-padding">
            <form id="formToggleLine" class="form-horizontal no-margin form-border">
                <div class="form-group">
                    <label class="col-xs-2 control-label">姓名</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" placeholder="input here...">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">性别</label>
                    <div class="col-lg-10">
                        <select class="form-control">
                            <option>男</option>
                            <option>女</option>
                        </select>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">年龄</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="input here...">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">身高</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="input here...">
                        <span class="help-block">单位(cm)</span>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">体重</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="input here...">
                        <span class="help-block">单位(kg)</span>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">爱好、特长</label>
                    <div class="col-lg-10">
                        <input class="form-control" type="text" placeholder="input here...">
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">自我介绍</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3"></textarea>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">目标描述</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3"></textarea>
                    </div><!-- /.col -->
                </div><!-- /form-group -->

                <button type="submit" class="btn btn-sm btn-success">提交</button>
            </form>
        </div>
    </div>
</div>
@endsection