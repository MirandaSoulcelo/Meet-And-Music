<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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



            return redirect()->route('users.index')->with('success', 'Usuário Criado com sucesso!');


        } catch (\Exception $e) {
            // Captura qualquer erro e retorna com mensagem personalizada
            return response()->json(['error' => 'Erro ao criar o usuário: ' . $e->getMessage()], 500);
        }
    }

        public function edit($id)
    {
        $user = User::findOrFail($id);  // Encontra o usuário pelo ID
        return view('useredit', compact('user'));  // Retorna a view de edição com os dados do usuário
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

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }

}

