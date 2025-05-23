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




        /**
     * Mostrar formulário para entrar em reunião
     */
    public function formEntrarReuniao()
    {
        return view('meetings.join-form');
    }

    /**
     * Processar entrada na reunião
     */
    public function processarEntradaReuniao(Request $request)
    {
        $request->validate([
            'meeting_input' => 'required|string'
        ]);

        $input = $request->meeting_input;
        
        // Se for um link completo, extrair o ID
        if (str_contains($input, 'video-call/')) {
            $meetingId = last(explode('video-call/', $input));
        } else {
            // Se for apenas o código
            $meetingId = $input;
        }
        
        // Verificar se a reunião existe
        $meeting = Meeting::where('room_id', $meetingId)->first();
        
        if (!$meeting) {
            return back()->withErrors([
                'meeting_input' => 'Reunião não encontrada. Verifique o código ou link.'
            ])->withInput();
        }
        
        return redirect()->route('video.call', $meetingId);
    }

}