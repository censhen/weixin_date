@extends('base')

@section('content')
<div id="container">
    <div class="bg-white">
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
                <strong class="font-14">{{$user->name}}</strong>
                <small class="block text-muted">
                    年龄:{{$user->age}}
                </small>
                <p>居住地: {{$user->city}}</p>
                <p>兴趣爱好: {{$user->interest}}</p>
                <p>自我介绍: {{$user->self_intro}}</p>
                <p>期望目标: {{$user->expectation}}</p>
            </div><!-- /.col -->
        </div>
        @endforeach
    </div>
</div>
@endsection