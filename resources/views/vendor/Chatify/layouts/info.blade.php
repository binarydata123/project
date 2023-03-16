{{-- user info and avatar --}}
@if($profilePic)
    <div class="avatars av-l chatify-d-flex" style="background-image: url(/storage/{{$profilePic}});"></div>
@else
    <div class="avatar av-l chatify-d-flex" style="background-image: url(http://localhost/storage/users-avatar/avatar.png);"></div>
@endif
<p class="info-name">{{ config('chatify.name') }}</p>
