<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmerRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class FarmerRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     * @param FarmerRegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FarmerRegisterRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'state_id' => $request->state_id,
            'local_government_id' => $request->local_government_id,
            'ward_id' => $request->ward_id,
            'accept_terms' => $request->accept_terms
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
