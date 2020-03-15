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
        $targetUser = $id; //usuario que receberá o like

        if($this->like->where('id', $targetUser)->count() == 0){
            return response()->json(['data' => 'Usuário não existe']);
            throw new \Exception('não existe');
        }

        $this->dislike->insert([
            'target_id' => $targetUser,
            'users_id' => $request['userLogged'],
        ]);

        return response()->json(['data' => 'dislike'], 200);
    }
}
