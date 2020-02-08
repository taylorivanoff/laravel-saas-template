<?php

namespace Template\Http\Tenant;

use Illuminate\Http\Request;
use Template\App\Controllers\Controller;
use Template\Domain\Company\Events\CompanyUserLogin;
use Template\Domain\Company\Models\Company;

class TenantSwitchController extends Controller
{
    /**
     * Switch tenant.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function switch(Company $company)
    {
        event(new CompanyUserLogin(
            request()->user(),
            $company
        ));

        return redirect()->route('tenant.dashboard');
    }
}
