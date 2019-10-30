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

    public function store($id, Request $request)
    {
        $targetUser = $id; //usuario que receberá o like

        if($this->like->where('id', $targetUser)->count() == 0){
            return response()->json(['data' => 'Usuário não existe']);
            throw new \Exception('não existe');
        }

        $this->like->insert([
            'target_id' => $targetUser,
            'users_id' => $request['userLogged'],
        ]);

        return response()->json(['data' => 'like'], 200);
    }
}
