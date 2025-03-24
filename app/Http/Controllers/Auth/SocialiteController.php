<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialiteController extends Controller
{
    // إعادة التوجيه إلى Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // معالجة رد الاتصال من Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // البحث عن المستخدم أو إنشاء مستخدم جديد
            $user = User::updateOrCreate(
                [
                    'email' => $googleUser->getEmail(),
                ],
                [
                    'google_id' => $googleUser->getId(),
                    'google_name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken ?? null,
                   
                ]
            );
            // تسجيل دخول المستخدم
            Auth::login($user);

            return redirect('/dashboard');
        } catch (Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'حدث خطأ أثناء تسجيل الدخول باستخدام Google');
        }
    }

    // إعادة التوجيه إلى GitHub
    public function redirectToGithub()
    {

        return Socialite::driver('github')->redirect();
    }

    // معالجة رد الاتصال من GitHub
    public function handleGithubCallback()
    {


        try {
            $githubUser = Socialite::driver('github')->user();
            $user = User::updateOrCreate([
                'email' => $githubUser->email,
            ], [
                'github_name' => $githubUser->name,
                'github_id' => $githubUser->id,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]);

            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'حدث خطأ أثناء تسجيل الدخول باستخدام GitHub');
        }
    }
}
