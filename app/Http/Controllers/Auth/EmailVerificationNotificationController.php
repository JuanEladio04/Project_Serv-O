<?php

namespace App\Http\Controllers\Auth;

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

        VerifyEmail::createUrlUsing(function ($notifiable) use ($request) {
            return URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                [
                    'id' => $request->user()->getKey(),
                    'hash' => sha1($request->user()->getEmailForVerification()),
                ]
            );
        });

        $request->user()->notify(new VerifyEmail);

        return back()->with('verificationStatus', 'verification-link-sent');
    }
}
