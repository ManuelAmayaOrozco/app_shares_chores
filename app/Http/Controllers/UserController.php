<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    //Show login form
    public function showLogin() {
        return view('user_views.login'); // CARGA LA VIEW DE LOGIN PARA PODER REALIZAR LOGIN
    }

    //Do login
    public function doLogin(Request $request) {
        // VALIDAR DATOS DE ENTRADA

        $validator = Validator::make(
            $request->all(), //Los datos a validar
            [
                "email"=> "required",
                "password"=> "required"
            ], [
                "email.required"=>"The :attribute is required.",
                "password.required"=>"The :attribute is required."
            ]
        );

        // SI LOS DATOS SON INVÁLIDOS, DEVOLVER A LA PÁGINA ANTERIOR E IMPRIMIR LOS ERRORES DE VALIDACIÓN

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // SI LOS DATOS SON VÁLIDOS (SI EL LOGIN ES CORRECTO) CARGAR LA VISTA PRINCIPAL DEL USUARIO.
        // LA VISTA PRINCIPAL DE USUARIO DEBE INCLUIR:
        /*
            -> Un header que contenga el nombre del usuario.
            -> Un botón de logout que redirija a la view de login.

            -> La lista de tareas, tanto pendientes como realizadas, que el usuario tiene asignadas.
            -> Un botón al lado de cada tarea para eliminar la tarea.
            -> Un botón para marcar como hecha la tarea.
        */

        $datosLogin = $request->all();
        $email = $datosLogin["email"];
        $password = $datosLogin["password"];

        $usuarioBD = User::where("email", $email)->first();

        if ($usuarioBD) {

            if (password_verify($password, $usuarioBD->password)) {

                return view('user_views.index', compact('usuarioBD')); // CARGA LA VIEW PRINCIPAL CON LA INFO DEL USUARIO

            }

        } else {

            $loginIncorrecto = "The login credentials are not correct.";

            return view('user_views.login', compact('loginIncorrecto'));

        }

    }

    //Show register form
    public function showRegister() {
        return view('user_views.register'); // CARGA LA VIEW DE REGISTER PARA PODER REALIZAR UN ALTA DE USUARIO
    }

    //Do register
    public function doRegister(Request $request) {

        // VALIDAR DATOS DE ENTRADA. LAS REGLAS DE VALIDACIÓN SON LAS SIGUIENTES:
        /*
            -> nombre es obligatorio, debe ser un string y debe ser menor de 20 carácteres
            -> email es obligatorio, debe seguir un formato estándar, debe ser único en la base de datos
            -> password es obligatoria, debe ser mayor de 5 carácteres, menor de 20 carácteres, debe contener una minúscula, una mayúscula y al menos un dígito
            -> repeat_password es obligatoria y debe ser igual a password
        */

        $validator = Validator::make(
            $request->all(), //Los datos a validar
            [
                "name"=> "required|string|max:20",
                "email"=> "required|email:rfc,dns|unique:users,email",
                "password"=> "required|min:5|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/",
                "repeat_password"=> "required|same:password"
            ], [
                "name.required"=>"The :attribute is required.",
                "name.string"=>"The :attribute must be a string",
                "name.max"=>"The :attribute must be less or equal to 20 characters.",
                "email.required"=>"The :attribute is required.",
                "email.email"=>"The :attribute must have the right format.",
                "email.unique"=>"The :attribute must be unique.",
                "password.required"=>"The :attribute is required.",
                "password.min"=>"The :attribute must be more or equal to 5 characters.",
                "password.max"=>"The :attribute must be less or equal to 20 characters.",
                "password.regex"=>"The :attribute must contain at least one lowercase letter, a capital letter and a numerical digit.",
                "repeat_password.required"=>"The repeated password is required.",
                "repeat_password.same"=>"The repeated password is not the same as the original password."
            ]
        );

        // SI LOS DATOS SON INVÁLIDOS, DEVOLVER A LA PÁGINA ANTERIOR E IMPRIMIR LOS ERRORES DE VALIDACIÓN

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // SI LOS DATOS SON VÁLIDOS (SI EL REGISTRO SE HA REALIZADO CORRECTAMENTE) CARGAR LA VIEW DE LOGIN PARA PODER REALIZAR LOGIN

        $user = new User();
        $user["name"] = $request["name"];
        $user["email"] = $request["email"];
        $user["password"] = $request["password"];
        
        $user->save();

        return view('user_views.login'); // CARGA LA VIEW DE LOGIN PARA PODER REALIZAR LOGIN
    }
}
