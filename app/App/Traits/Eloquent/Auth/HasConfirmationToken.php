<?php
/**
 * Created by PhpStorm.
 * User: Cuthbert Mirambo
 * Date: 12/29/2017
 * Time: 2:38 AM
 */

namespace Template\App\Traits\Eloquent\Auth;

use Illuminate\Support\Str;
use Template\Domain\Users\Models\ConfirmationToken;

trait HasConfirmationToken
{
    /**
     *  Generates a confirmation token for a user.
     */
    public function generateConfirmationToken()
    {
        $this->confirmationToken()->create([
            'token' => $token = Str::random(200),
            'expires_at' => $this->getConfirmationTokenExpiry(),
        ]);

        return $token;
    }

    protected function getConfirmationTokenExpiry()
    {
        return $this->freshTimestamp()->addHours(3);
    }

    /**
     * Get's the user's confirmation token.
     *
     * @return mixed
     */
    public function confirmationToken()
    {
        return $this->hasOne(ConfirmationToken::class);
    }
}