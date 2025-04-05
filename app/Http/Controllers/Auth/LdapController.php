<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Ldap\User as LdapUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LdapRecord\Container;

class LdapController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        try {
            $connection = Container::getConnection('default');
            
            if ($connection->auth()->attempt($credentials['username'], $credentials['password'])) {
                $ldapUser = LdapUser::findByOrFail('samaccountname', $credentials['username']);
                
                // Criar ou atualizar usuário local
                $user = User::updateOrCreate(
                    ['email' => $ldapUser->mail[0] ?? $credentials['username']],
                    [
                        'name' => $ldapUser->cn[0],
                        'password' => Hash::make($credentials['password']),
                    ]
                );

                Auth::login($user);

                return redirect()->intended('/dashboard');
            }

            return back()->withErrors([
                'username' => 'As credenciais fornecidas estão incorretas.',
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Ocorreu um erro ao tentar autenticar com o Active Directory.',
            ]);
        }
    }
} 