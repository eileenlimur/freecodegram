@extends('layouts.app')

@section('jquery')
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>\ -->
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }} " class="rounded-circle" style="max-width: 100%;"/>
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-4">
                    <div class="h4">{{ $user->username }}</div>
                    @if(json_encode($follows) == 'true' )
                    <button id="follow-btn" class="btn ml-4 btn-secondary">Unfollow</button>
                    @else
                    <button id="follow-btn" class="btn ml-4 btn-primary">Follow</button>
                    @endif
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->posts()->count() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100"/>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

        $('#follow-btn').click(function(){
            followUser(<?= $user->id ?>);
        })
    
        function followUser(userId){
            axios.post('/follow/' + userId)
            .then(response=>{
                //if user is now following the profile
                if (response.data.attached.length) {
                    $('#follow-btn').removeClass('btn-primary');
                    $('#follow-btn').addClass('btn-secondary');
                    $('#follow-btn').text('Unfollow');
                } else {
                    $('#follow-btn').addClass('btn-primary');
                    $('#follow-btn').removeClass('btn-secondary');
                    $('#follow-btn').text('Follow');
                }
            })
            .catch(error=>{
                if (error.response.status == 401) {
                    window.location = '/login'
                }
            });
        }
    })
</script>
@endsection