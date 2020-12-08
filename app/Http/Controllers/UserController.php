<?php

namespace App\Http\Controllers;

use App\Privilege;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        
        $users = User::where([ ['is_approved', true], ['is_active', true] ])->orderBy('name')->paginate(20);
        $privileges = Privilege::orderBy('nm_privilege')->get(['id', 'nm_privilege']);

        foreach($users as $user) {
            $user->date = explode(' ', $user->created_at)[0];
        }

        return view('pages.admin.listUsers.index2', compact('users', 'privileges'));
    }

    public function show(User $user) {
        $privileges = Privilege::orderBy('nm_privilege')->get(['id', 'nm_privilege']);
        return view('pages.admin.perfil.index', compact('user', 'privileges'));
    }

    public function update(Request $request, User $user) {
        if(!(Auth::user()->isSuperAdmin())) {
            return redirect()->route('perfil', $user->id)->with('error', 'Erro, você não possui permissão');
        }

        if($user == null) {
            return view('customs.error400', ['message' => 'Usuário não existe!']);
        }


        $rules = [
            "privilege" => "required|number",
            "status" => "required|number",
        ];

        $validator = Validator::make($request->except(['_token', '_method']), $rules);

        if(!$validator) {
            return redirect()->route('perfil', $user->id)->with('error', 'Erro ao editar, dados inválidos');
        }

        
        $data = $request->except(['_token', '_method']);
        Log::info($data);

        $user->update($data);

        return redirect()->route('perfil', $user->id)->with('success', 'Dados alterados com sucesso!');
    }
}
