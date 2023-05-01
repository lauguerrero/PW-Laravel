<?php

namespace App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
                list($type, $token) = explode(' ', $request->header('Authorization'), 2);
                if ($type === 'Bearer') {
                    $user = User::where('api_token', $token)->first();
                    if ($user) {
                        $request->request->add(['user' => $user]);
                    }
                    return $user;
                }
            }
        });

        Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('contrasena')
        ], $request->input('remember'));
    }
}
