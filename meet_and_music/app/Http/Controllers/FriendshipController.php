<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function sendRequest($friendId) 
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Verificar se já existe uma amizade ou solicitação
        if ($user->isFriendWith(User::find($friendId)) || 
            $user->hasPendingFriendRequestTo(User::find($friendId)) ||
            $user->hasPendingFriendRequestFrom(User::find($friendId))) {
            return back()->with('error', 'Esta solicitação não pode ser enviada.');
        }

        // Criar a solicitação de amizade (accepted = false)
        $user->sentFriendRequests()->attach($friendId, ['accepted' => false]);

        return back()->with('success', 'Solicitação de amizade enviada.');
    }

    public function acceptRequest($friendId)
    {
        DB::table('friend_user')
            ->where('user_id', $friendId)
            ->where('friend_id',  Auth::id())
            ->update(['accepted' => true]);

        return back()->with('success', 'Amizade aceita.');
    }

    public function rejectRequest($friendId) 
    {
        DB::table('friend_user')
            ->where('user_id', $friendId)
            ->where('friend_id', Auth::id())
            ->delete();

        return back()->with('success', 'Solicitação rejeitada.');
    }

    public function requests()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        return view('friends.requests', [
            'receivedRequests' => $user->receivedFriendRequests()->wherePivot('accepted', false)->get(),
            'sentRequests' => $user->sentFriendRequests()->wherePivot('accepted', false)->get()
        ]);
    }

    public function removeFriend(User $friend)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->removeFriend($friend);
        return back()->with('success', 'Amigo removido com sucesso.');
    }

    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $friends = $user->friends()->get();
        
        // Adicionar informações sobre reuniões ativas dos amigos
        $friendsWithMeetingStatus = $friends->map(function ($friend) {
            // Buscar reunião ativa mais recente do amigo
            $activeMeeting = Meeting::where('created_by', $friend->id)
                                   ->where('status', 'active')
                                   ->orderBy('created_at', 'desc')
                                   ->first();
            
            return [
                'user' => $friend,
                'is_in_meeting' => $activeMeeting !== null,
                'meeting_code' => $activeMeeting ? $activeMeeting->room_id : null,
                'meeting_title' => $activeMeeting ? $activeMeeting->title : null,
                'meeting_link' => $activeMeeting ? route('meeting.video.call', $activeMeeting->room_id) : null
            ];
        });
        
        return view('friends.index', compact('friendsWithMeetingStatus'));
    }
}