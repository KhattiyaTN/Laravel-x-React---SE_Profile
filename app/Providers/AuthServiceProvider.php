<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate; สามารถเพิ่มในภายหลัง

use App\Models\Badge;
use App\Models\Certificate;
use App\Models\Class_project;

use App\Policies\BadgePolicy;
use App\Policies\CertificatePolicy;
use App\Policies\ProjectPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Badge::class => BadgePolicy::class,
        Certificate::class => CertificatePolicy::class,
        Class_project::class => ProjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
