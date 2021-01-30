<?php

namespace Sortarad\Haystack;

use Statamic\Statamic;
use Statamic\Support\Str;
use Statamic\Facades\Addon;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'web' => __DIR__.'/../routes/web.php',
    ];

    protected $publishables = [
        __DIR__.'/../public' => 'js',
        __DIR__.'/../resources/data' => 'data',
    ];

    public function boot()
    {
        parent::boot();

        $this->bootAddonPublishAfterInstall();
    }

    public function bootAddonPublishAfterInstall()
    {
        if (! $this->publishAfterInstall) {
            return $this;
        }

        if (empty($this->publishables)) {
            return $this;
        }

        $addon = Addon::all()->first(function ($addon) {
            return Str::startsWith(get_class($this), $addon->namespace());
        });

        Statamic::afterInstalled(function ($command) use ($addon) {
            $command->call('vendor:publish', [
                '--tag' => $addon->slug(),
                '--force' => true,
            ]);
        });

        return $this;
    }
}
