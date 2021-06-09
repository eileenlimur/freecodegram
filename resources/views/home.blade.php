@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-3 pt-5">
            <img src="https://img1.luminarypodcasts.com/v1/podcast/4476bc58-b31c-40b5-a63b-270ef0b20cd5/default/h_500,w_500/image/s--5r54k72s--/aHR0cHM6Ly9zc2wtc3RhdGljLmxpYnN5bi5jb20vcC9hc3NldHMvMi9mL2YvNy8yZmY3Y2M4YWEzM2ZlNDM4L2ZyZWVjb2RlY2FtcC1zcXVhcmUtbG9nby1sYXJnZS0xNDAwLmpwZw==.jpg" class="rounded-circle" style="max-width: 100%;"/>
        </div>
        <div class="col-9 pt-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>153</strong> posts</div>
                <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="/assets/1.jpg" alt="" class="w-100"/>
        </div>
        <div class="col-4">
            <img src="/assets/2.jpg" alt="" class="w-100"/>
        </div>
        <div class="col-4">
            <img src="/assets/3.jpg" alt="" class="w-100"/>
        </div>
    </div>
</div>
@endsection
