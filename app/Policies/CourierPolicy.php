<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Courier;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any couriers.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        // Логика для проверки прав
        return true; // или другой код
    }

    /**
     * Determine whether the user can view the courier.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Courier $courier)
    {
        // Логика для проверки прав
        return true; // или другой код
    }

    // Добавьте другие методы, если это необходимо
}
