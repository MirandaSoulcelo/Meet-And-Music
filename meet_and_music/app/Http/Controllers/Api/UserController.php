<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User_xp;  // no topo do arquivo

class UserController extends Controller
{

    public function create()
    {
        return view('usercreate');  // Retorna a view com o formulário
    }



    public function index()
    {
        $users = User::all(); // Pega todos os usuários do banco
        return view('index', compact('users')); // Passa os usuários para a view
    }



    public function login()
    {

        return view('login'); // Passa os usuários para a view
    }

            public function store(Request $request)
        {
            try {
                // Validação dos dados recebidos
                $validated = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:6',
                ]);

                // Criação do novo usuário com os dados validados
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => bcrypt($validated['password']),
                ]);

                // Cria o registro na tabela XP para esse usuário
                User_xp::create([
                    'user_id' => $user->id,
                    'nivel_atual' => 1,
                    'xp_atual' => 0,
                ]);

                return redirect()->route('login.index')->with('success', 'Usuário criado com sucesso! Por favor, faça login.');
            } catch (\Exception $e) {
                return back()->with('error', 'Erro ao criar o usuário: ' . $e->getMessage());
            }
        }


        

        public function edit($id)
    {
        if(!Auth::check()){
            return redirect()->route('login.index')->with('error', 'você precisa estar logado');

        }

        $user = User::findOrFail($id);
        return view('useredit', compact('user'));  // Retorna a view de edição com os dados do
    }




        public function update(Request $request, $id)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Senha pode ser nula, mas se for preenchida, deve ser confirmada
        ]);

        // Encontra o usuário pelo ID
        $user = User::findOrFail($id);

        // Atualiza os dados do usuário
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password, // Se a senha for fornecida, atualiza, senão mantém a atual
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }




        public function destroy($id)
    {
        $user = User::findOrFail($id);  // Encontra o usuário pelo ID
        $user->delete();  // Exclui o usuário

        return redirect()->route('login.index')->with('success', 'Usuário excluído com sucesso!');
    }

/*
    public function ganharXP(Request $request)
{
    $user = Auth::user(); // Pega o usuário autenticado

    if (!$user) {
        return response()->json(['error' => 'Usuário não autenticado'], 401);
    }

    $xpGanho = $request->input('xp'); // Recebe a quantidade de XP

    // Verifica se o usuário tem o relacionamento xp configurado
    if (!$user->xp) {
        return response()->json(['error' => 'XP não encontrado'], 404);
    }

    // Adiciona o XP ganho
    $user->xp->adicionarXP($xpGanho);

    return response()->json([
        'xp_atual' => $user->xp->xp_atual,
        'nivel_atual' => $user->xp->nivel_atual
    ]);
}
    */


}

