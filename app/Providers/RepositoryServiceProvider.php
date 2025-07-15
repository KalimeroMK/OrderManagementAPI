<?php

declare(strict_types=1);

namespace App\Providers;

use App\Modules\Auth\Interfaces\AuthInterface;
use App\Modules\Auth\Repositories\AuthRepository;
use App\Modules\Customer\Interfaces\CustomerInterface;
use App\Modules\Customer\Repositories\CustomerRepository;
use App\Modules\Order\Interfaces\OrderInterface;
use App\Modules\Order\Repositories\OrderRepository;
use App\Modules\Permission\Interfaces\PermissionInterface;
use App\Modules\Permission\Repositories\PermissionRepository;
use App\Modules\Product\Interfaces\ProductInterface;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\Role\Interfaces\RoleInterface;
use App\Modules\Role\Repositories\RoleRepository;
use App\Modules\SpecialDay\Interfaces\SpecialDayInterface;
use App\Modules\SpecialDay\Repositories\SpecialDayRepository;
use App\Modules\User\Interfaces\UserInterface;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use ReflectionClass;
use ReflectionNamedType;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var string[]
     */
    protected array $repositories = [
        UserInterface::class => UserRepository::class,
        AuthInterface::class => AuthRepository::class,
        RoleInterface::class => RoleRepository::class,
        PermissionInterface::class => PermissionRepository::class,
        OrderInterface::class => OrderRepository::class,
        ProductInterface::class => ProductRepository::class,
        CustomerInterface::class => CustomerRepository::class,
        SpecialDayInterface::class => SpecialDayRepository::class,
        ProductInterface::class => ProductRepository::class,
        OrderInterface::class => OrderRepository::class,
        CustomerInterface::class => CustomerRepository::class,
        SpecialDayInterface::class => SpecialDayRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {

        foreach ($this->repositories as $interface => $repository) {
            $this->app->bind($interface, function ($app) use ($repository) {
                /** @var class-string $repository */
                $reflector = new ReflectionClass($repository);
                $constructor = $reflector->getConstructor();

                if ($constructor && $constructor->getNumberOfParameters() > 0) {
                    $param = $constructor->getParameters()[0];
                    $type = $param->getType();

                    if ($type instanceof ReflectionNamedType && ! $type->isBuiltin()) {
                        $modelClass = $type->getName();

                        return new $repository($app->make($modelClass));
                    }
                }

                return new $repository;
            });
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
