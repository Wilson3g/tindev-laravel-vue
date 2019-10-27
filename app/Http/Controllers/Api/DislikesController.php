<?php

namespace App\Http\Controllers\Api;

use App\Dislike;
use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DislikesController extends Controller
{
    public function __construct(Dislike $dislike)
    {
        $this->dislike = $dislike;
    }

    public function store($id, Request $request)
    {
        $userLogged = $request->userLogged; //id usuario logado
        $targetUser = $id; //usuario que receberá o like

        $devExists = User::where('id', $targetUser)->exists();

        if(!$devExists){
            return response()->json(['data' => 'Usuário não existe']);
            throw new \Exception('não existe');
        }

        DB::table('dislikes')->insert([
            'target_id' => $targetUser,
            'users_id' => $userLogged,
        ]);

        return response()->json(['data' => 'dislike']);
    }
}
