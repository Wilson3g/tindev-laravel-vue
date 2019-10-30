<?php

namespace App\Http\Controllers\Api;

use App\Like;
use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct(Like $like, User $user)
    {
        $this->like = $like;
        $this->user = $user;
    }

    public function store($id, Request $request)
    {
        if($this->user->where('id', $id)->count() == 0){
            return response()->json(['data' => 'Usuário não existe']);
        }

        $this->like->insert([
            'target_id' => $id,
            'users_id' => $request['userLogged'],
        ]);

        return response()->json(['data' => 'like'], 200);
    }
}
