<?php

namespace App\Http\Controllers\Api;

use App\Like;
use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Like  as UserMatch;

class LikesController extends Controller
{
    public function __construct(Like $like, User $user)
    {
        $this->like = $like;
        $this->user = $user;
    }

    public function store(Request $request)
    {
        if($this->user->where('id', $request['userTarget'])->count() == 0){
            return response()->json(['data' => 'Usuário não existe']);
        }

        $checkLikeExists = $this->checkLikeExists($request->all());

        event(new UserMatch($checkLikeExists));

        // $this->like->insert([
        //     'target_id' => $request['userTarget'],
        //     'users_id' => $request['userLogged'],
        // ]);

        return response()->json([
            'message' => 'Like'
        ], 200);
    }

    public function checkLikeExists($request)
    {
    // ********ESTUDAR SOBRE ESTE COMPORTAMENTO********

        $checkLikeExists = $this->like->where([
            'target_id' => $request['userLogged'],
            'users_id' => $request['userTarget']
        ])->first();

        return $checkLikeExists->first();
    }
}
