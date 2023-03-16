@php
    $user = App\Models\User::whereId(request()->segment(count(request()->segments())))->first();
@endphp
{{-- -------------------- All users/group list -------------------- --}}
@if($get == 'user')
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
        <div class="avatar av-m"
        style="background-image: url('{{ $user->avatar }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
        <p data-id="{{ $user->id }}" data-type="user">
            {{ strlen($user->name) > 12 ? trim(substr($user->name, 0, 12)).'..' : $user->name }}
       
        </td>

    </tr>
</table>
@endif



