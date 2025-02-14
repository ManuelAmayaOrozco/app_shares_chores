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

    public function showRegisterChore() {
        return view('user_views.insertChores');
    }

    public function doRegisterChore(Request $request) {

        // VALIDAR DATOS DE ENTRADA. LAS REGLAS DE VALIDACIÓN SON LAS SIGUIENTES:
        /*
            -> nombre es obligatorio, debe ser un string y debe ser menor de 20 carácteres
            -> email es obligatorio, debe seguir un formato estándar, debe ser único en la base de datos
            -> password es obligatoria, debe ser mayor de 5 carácteres, menor de 20 carácteres, debe contener una minúscula, una mayúscula y al menos un dígito
            -> password_repeat es obligatoria y debe ser igual a password
        */
        $validator = Validator::make(
            $request->all(),
            [
                "name"=>"required",
                "description"=> "required",
                "assigned_to"=>"required",
                "due_date"=>"required"
            ],[
                "name.required" => "The :attribute is required.",
                "description.required" => "The :attribute is required.",
                "assigned_to.required" => "The task must be assigned to a person.",
                "due_date.required" => "The due date is required."
            ]
        );

        // SI LOS DATOS SON INVÁLIDOS, DEVOLVER A LA PÁGINA ANTERIOR E IMPRIMIR LOS ERRORES DE VALIDACIÓN
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // SI EL USUARIO NO EXISTE, DEVOLVER A LA PÁGINA ANTERIOR E IMPRIMIR LOS ERRORES DE VALIDACIÓN
        $userID = $request->get('assigned_to');
        $user = User::where('id', $userID)->first();
        if(!$user) {
            $validator->errors()->add('credentials', 'This user does not exist, use a different ID.');
            return redirect()->route('user_views.insertChores')->withErrors($validator)->withInput();
        }

        // SI LOS DATOS SON VÁLIDOS (SI EL REGISTRO SE HA REALIZADO CORRECTAMENTE) CARGAR LA VIEW DE LOGIN PARA PODER REALIZAR LOGIN
        $datosChore = $request->all();
        $chore = new Chore();
        $chore->name = $datosChore['name'];
        $chore->description = $datosChore['description'];
        $chore->status = Status::PENDING;
        $chore->assigned_to = $datosChore['assigned_to'];
        $chore->due_date = $datosChore['due_date'];
        $chore->save();

        $chores = $user->chores()->get();
        return view('user_views.index', compact('chores', 'user'));
    }

}
