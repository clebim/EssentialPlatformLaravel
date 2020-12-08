<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OnApprovalController extends Controller
{
    public function index() {
        $page_title = 'Usuários - Em aprovação';
        $page_description = 'Lista de Usuários que solicitaram acesso';

        $approvingUsers = User::where([ ['is_approved', '=', false], ['is_active', '=', true] ])
            ->orderBy('name')
            ->paginate(20);
        return view('pages.admin.onApproval.index', compact('approvingUsers', 'page_title', 'page_description'));
    }

    public function approval(User $user) {

        if(!(Auth::user()->isSuperAdmin())) {
            return response()->json([["success" => false, "message" => "Você não possui permição."], 400]);
        }

        $user->is_approved = true;

        $user->save();

        Mail::to($user->email)->send(new WelcomeMail($user));

        return response()->json(["success" => true, "message" => "Usuário aprovado, acesso liberado."], 200);
    }

    public function reject(User $user) {

        if(!(Auth::user()->isSuperAdmin())) {
            return response()->json([["success" => false, "message" => "Você não possui permição."], 401]);
        }

        $user->is_approved = true;
        $user->is_active = false;
        $user->save();

        return response()->json(["success" => true, "message" => "Usuário reprovado, acesso negado."], 200);
    }
}
