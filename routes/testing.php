<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "__testing__/"], function () {
    Route::get("factory/{model}", function (Request $request, $model) {

        $overrides = $request->all();

        // Special case for user: The password field is hashed
        if ($model === "User") {
            if (isset($overrides["password"])) {
                $overrides["password"] = Hash::make($overrides["password"]);
            }
        }

        return response()->json(
            factory("App\\{$model}")
                ->create($overrides)
        );
    });

    Route::get("login", function () {
        $new_user = factory(User::class)->create();
        Auth::login($new_user);
        return response()->json($new_user);
    });
});
