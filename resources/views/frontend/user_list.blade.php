@extends('base')

@section('content')
<div id="container">
    <div class="bg-white content-padding">
        @foreach($users as $user)
        <div class="row">
            <div class="col-xs-12 col-md-6 text-center">
                <a href="#">
                    <img src="{{$user->photo1}}" height="300" alt="User Avatar" class="img-thumbnail">
                </a>
                <div class="seperator"></div>
                <div class="seperator"></div>
            </div><!-- /.col -->
            <div class="col-xs-12 col-md-6">
                <h3>姓名: {{$user->name}}</h3>
                <p class="block text-muted">
                    年龄: {{$user->age}}
                </p>
                <p>居住地: {{$user->city}}</p>
                <p>兴趣爱好: {{$user->interest}}</p>
                <p>自我介绍: {{nl2br($user->self_intro)}}</p>
                <p>期望目标: {{nl2br($user->expectation)}}</p>
                <div class="alert alert-warning">
                    <strong>红娘点评:</strong>{{nl2br($user->reviews)}}
                </div>
            </div><!-- /.col -->
        </div>
        @endforeach
    </div>
</div>
@endsection