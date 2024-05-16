<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Notifications\VerifyEmail;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('index', [], false));
        }

        $user = $request->user();
        $hash = Str::random(32); // Genera un hash aleatorio

        VerifyEmail::createUrlUsing(function ($notifiable) use ($user, $hash) {
            return URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                ['id' => $user->getKey(), 'hash' => $hash] 
            );
        });

        $user->sendEmailVerificationNotification();

        return back()->with('verificationStatus', 'verification-link-sent');
    }
}
