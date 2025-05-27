<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $friends = $user->friends()->get(); // or $user->friends()->get()
        return view('friends.index', compact('friends'));
    }












       /* public function receivedRequests()
    {

        /** @var \App\Models\User $user */
    /*
        $user = Auth::user(); // Usuário autenticado

        $requests = $user->receivedFriendRequests()->wherePivot('accepted', false)->get();
        return view('friends.received', compact('requests'));
    }
    */

    /*

    public function sentRequests()
    {
        /** @var \App\Models\User $user */
        /*
        $user = Auth::user(); // Usuário autenticado

        $requests = $user->sentFriendRequests()->wherePivot('accepted', false)->get();
        return view('friends.sent', compact('requests'));
    }

    */
}



