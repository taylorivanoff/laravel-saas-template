<?php

namespace Template\Domain\Users\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;
use Laravel\Passport\HasApiTokens;
use Template\App\Traits\Eloquent\Auth\HasConfirmationToken;
use Template\App\Traits\Eloquent\Auth\HasTwoFactorAuthentication;
use Template\App\Traits\Eloquent\Roles\HasPermissions;
use Template\App\Traits\Eloquent\Roles\HasRoles;
use Template\App\Traits\Eloquent\Subscriptions\HasSubscriptions;
use Template\Domain\Company\Models\Company;
use Template\Domain\Subscriptions\Models\Plan;
use Template\Domain\Teams\Models\Team;
use Template\Domain\Users\Filters\UserFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use Notifiable,
        HasConfirmationToken,
        HasRoles,
        HasPermissions,
        Billable,
        HasSubscriptions,
        SoftDeletes,
        HasTwoFactorAuthentication,
        HasApiTokens,
        HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->useFallbackUrl('/img/default-avatar.jpg')
            ->useFallbackPath(public_path('/images/default-avatar.jpg'))
            ->singleFile();
    }

    public function avatar()
    {
        return $this->getFirstMediaUrl('avatar');
    }

    
    public function taxPercentage()
    {
        return 10;
    }

    /**
     * Filters the result.
     *
     * @param Builder $builder
     * @param $request
     * @param array $filters
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new UserFilters($request))->add($filters)->filter($builder);
    }

    /**
     * Check if user is activated.
     *
     * @return mixed
     */
    public function hasActivated()
    {
        return $this->activated;
    }

    /**
     * Check if user is not activated.
     *
     * @return bool
     */
    public function hasNotActivated()
    {
        return !$this->hasActivated();
    }

    /**
     * Check if user is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * Check if user's team limit reached.
     *
     * @return bool
     */
    public function teamLimitReached()
    {
        return $this->team->users->count() === $this->plan->teams_limit;
    }

    /**
     * Check if current user matches passed user.
     *
     * @param User $user
     * @return bool
     */
    public function isTheSameAs(User $user)
    {
        return $this->id === $user->id;
    }

    /**
     * Get team owned by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function team()
    {
        return $this->hasOne(Team::class);
    }

    /**
     * Get plan that the user is currently on.
     *
     * @return mixed
     */
    public function plan()
    {
        return $this->plans->first();
    }

    /**
     * Get user's plan as a property.
     *
     * @return mixed
     */
    public function getPlanAttribute()
    {
        return $this->plan();
    }

    /**
     * Get plans owned by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function plans()
    {
        return $this->hasManyThrough(
            Plan::class,
            Subscription::class,
            'user_id',
            'gateway_id',
            'id',
            'stripe_plan'
        )->orderBy('subscriptions.created_at', 'desc');
    }

    /**
     * Get teams that user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_users');
    }

    /**
     * Get user's last accessed company.
     *
     * If using the new tenant switch functionality:
     * Append 'lastAccessedCompany' to model 'appends' property
     * And uncomment lines below
     *
     * @return mixed
     */
     public function getLastAccessedCompanyAttribute()
     {
        return $this->companies()->orderByDesc('last_login_at')->first();
     }

    /**
     * Get companies that user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_users');
    }


}
