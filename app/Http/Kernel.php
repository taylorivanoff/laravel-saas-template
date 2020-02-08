<?php

namespace Template\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Template\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \Template\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Template\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Template\Http\Middleware\VerifyCsrfToken::class,
            \Template\Http\Middleware\Admin\Impersonate::class,
        ],

        'tenant' => [
            \Template\Http\Middleware\Tenant\TenantMiddleware::class,
            \Template\Http\Middleware\Tenant\TenantConfigMiddleware::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \Template\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'confirmation_token.expired' => \Template\Http\Middleware\ChecksExpiredConfirmationTokens::class,
        'role' => \Template\Http\Middleware\AbortIfHasNoRole::class,
        'permission' => \Template\Http\Middleware\AbortIfHasNoPermission::class,
        'auth.register' => \Template\Http\Middleware\AuthenticateRegister::class,
        'subscription.active' => \Template\Http\Middleware\Subscription\RedirectIfNotActive::class,
        'subscription.notcancelled' => \Template\Http\Middleware\Subscription\RedirectIfCancelled::class,
        'subscription.cancelled' => \Template\Http\Middleware\Subscription\RedirectIfNotCancelled::class,
        'subscription.customer' => \Template\Http\Middleware\Subscription\RedirectIfNotCustomer::class,
        'subscription.inactive' => \Template\Http\Middleware\Subscription\RedirectIfNotInactive::class,
        'subscription.team' => \Template\Http\Middleware\Subscription\RedirectIfNoTeamPlan::class,
        'subscription.owner' => \Template\Http\Middleware\Subscription\RedirectIfNotSubscriptionOwner::class,
    ];
}
