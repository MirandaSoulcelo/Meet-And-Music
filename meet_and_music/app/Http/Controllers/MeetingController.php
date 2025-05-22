<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    /**
     * Criar uma nova videochamada
     */
    public function criarChamada(Request $request)
    {
        $meetingId = Str::random(10);
        
        // Opcional: salvar no banco
        Meeting::create([
            'room_id' => $meetingId,
            'created_by' => Auth::id(),
            'title' => $request->title ?? 'Videochamada',
        ]);
        
        return redirect()->route('video.call', $meetingId);
    }
    
    /**
     * Entrar em uma videochamada
     */
    public function entrarChamada($meetingId)
    {
        $roomName = "meetmusic-" . $meetingId;
        $meeting = Meeting::where('room_id', $meetingId)->first();
        
        return view('video-call', compact('roomName', 'meeting'));
    }
    
    /**
     * Listar chamadas do usuário
     */
    public function minhasChamadas()
    {
        $meetings = Meeting::where('created_by', Auth::id())
                          ->orderBy('created_at', 'desc')
                          ->get();
        
        return view('meetings.index', compact('meetings'));
    }
    
    /**
     * Gerar link de convite
     */
    public function gerarConvite($meetingId)
    {
        $link = url("/video-call/{$meetingId}");
        
        return response()->json([
            'link' => $link,
            'message' => 'Link copiado!'
        ]);
    }
}