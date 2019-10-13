<?php

namespace App\Http\Controllers\Api;

use App\Dislike;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DislikesController extends Controller
{
    public function __construct(Dislike $dislike)
    {
        $this->dislike = $dislike;
    }

    public function store(Request $request)
    {
        $userLogged = $request->userLogged; //id usuario logado
        $target = $request->target; //usuario que receberá o like

        DB::table('dislikes')->insert([
            'target_id' => $target,
            'users_id' => $userLogged,
        ]);

        return response()->json(['data' => 'dislike']);
    }
}
