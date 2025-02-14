<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Chore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChoreController extends Controller
{
    //
    public function updateStatus($id) {

        $validator = Validator::make(
            ['id' => $id],
            [
                'id' => 'required|exists:App\Models\Chore,id'
            ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $chore = Chore::find($id);
        $chore->status = Status::COMPLETED->value;
        $chore->save();

        $user = User::find($chore->assigned_to);
        $chores = $user->chores()->get();

        return view('user_views.index', compact('chores', 'user')); // CARGA LA VIEW PRINCIPAL CON LA INFO DEL USUARIO

    }

    public function delete($id) {

        $validator = Validator::make(
            ['id' => $id],
            [
                'id' => 'required|exists:App\Models\Chore,id'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $chore = Chore::find($id);
        $chore->delete();

        $user = User::find($chore->assigned_to);
        $chores = $user->chores()->get();

        return view('user_views.index', compact('chores', 'user')); // CARGA LA VIEW PRINCIPAL CON LA INFO DEL USUARIO

    }
}
