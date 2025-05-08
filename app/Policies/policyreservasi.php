<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reservasi;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservasiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Siapa saja bisa melihat daftar reservasi
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Reservasi $reservasi): bool
    {
        return $user->id === $reservasi->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Siapa saja yang login bisa membuat reservasi
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Reservasi $reservasi): bool
    {
         // User yang membuat reservasi bisa mengupdate, atau admin
        return $user->id === $reservasi->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Reservasi $reservasi): bool
    {
        // User yang membuat reservasi bisa delete, atau admin
        return $user->id === $reservasi->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Reservasi $reservasi): bool
    {
        return $user->isAdmin(); // Hanya admin yang bisa restore
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Reservasi $reservasi): bool
    {
        return $user->isAdmin(); // Hanya admin yang bisa force delete
    }
}
