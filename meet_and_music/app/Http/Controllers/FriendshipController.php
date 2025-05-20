<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        // Modifique esta linha:
        $friends = $user->friends;
        // Ou alternativamente:
        // $friends = $user->friends()->get()->all();
        
        return view('friends.index', compact('friends'));
    }

    public function sendRequest($friendId)
    {

         /** @var \App\Models\User $user */
         $user = Auth::user(); // Usuário autenticado
        

        // Prevenção: não enviar para si mesmo ou duplicar
        if ($user->id == $friendId || $user->sentFriendRequests()->where('friend_id', $friendId)->exists()) {
            return back()->with('error', 'Solicitação inválida ou já enviada.');
        }

        $user->sentFriendRequests()->attach($friendId);
        return back()->with('success', 'Pedido de amizade enviado.');
    }

    public function acceptRequest($friendId)
    {
        DB::table('friend_user')
            ->where('user_id', $friendId)
            ->where('friend_id',  Auth::id())
            ->update(['accepted' => true]);

        return back()->with('success', 'Amizade aceita.');
    }

    public function receivedRequests()
    {

        /** @var \App\Models\User $user */
        $user = Auth::user(); // Usuário autenticado

        $requests = $user->receivedFriendRequests()->wherePivot('accepted', false)->get();
        return view('friends.received', compact('requests'));
    }

    public function sentRequests()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // Usuário autenticado

        $requests = $user->sentFriendRequests()->wherePivot('accepted', false)->get();
        return view('friends.sent', compact('requests'));
    }

    public function rejectRequest($friendId)
{
    DB::table('friend_user')
        ->where('user_id', $friendId)
        ->where('friend_id', Auth::id())
        ->delete();

    return back()->with('success', 'Solicitação rejeitada.');
}
}
