<?php

namespace App\Http\Controllers\Api;

use App\Like;
use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    public function store(Request $request)
    {
        $userLogged = $request->userLogged; //id usuario logado
        $target = $request->target; //usuario que receberá o like

        $devExists = User::where('id', $target)->exists();

        if(!$devExists){
            return response()->json(['data' => 'Usuário não existe']);
            throw new \Exception('não existe');
        }

        DB::table('likes')->insert([
            'target_id' => $target,
            'users_id' => $userLogged,
        ]);

        return response()->json(['data' => 'like']);
    }
}
