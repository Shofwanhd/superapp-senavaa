<?php

namespace App\Policies;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransaksiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['2','3','4']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Transaksi $transaksi): bool
    {
        return in_array($user->role, ['2','3','4']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['2','3','4']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Transaksi $transaksi): bool
    {
        return in_array($user->role, ['2','3','4']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Transaksi $transaksi): bool
    {
        return in_array($user->role, ['2','3','4']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Transaksi $transaksi): bool
    {
        return in_array($user->role, ['2','3','4']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Transaksi $transaksi): bool
    {
        return in_array($user->role, ['2','3','4']);
    }
}
