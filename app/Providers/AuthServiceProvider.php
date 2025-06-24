<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Note;
use App\Policies\NotePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Note::class => NotePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
