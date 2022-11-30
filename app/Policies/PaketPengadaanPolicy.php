<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PaketPengadaan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaketPengadaanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_paket::pengadaan');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaketPengadaan  $paketPengadaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PaketPengadaan $paketPengadaan)
    {
        return $user->can('view_paket::pengadaan');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_paket::pengadaan');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaketPengadaan  $paketPengadaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PaketPengadaan $paketPengadaan)
    {
        return $user->can('update_paket::pengadaan');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaketPengadaan  $paketPengadaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PaketPengadaan $paketPengadaan)
    {
        return $user->can('delete_paket::pengadaan');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_paket::pengadaan');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaketPengadaan  $paketPengadaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PaketPengadaan $paketPengadaan)
    {
        return $user->can('force_delete_paket::pengadaan');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_paket::pengadaan');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaketPengadaan  $paketPengadaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PaketPengadaan $paketPengadaan)
    {
        return $user->can('restore_paket::pengadaan');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_paket::pengadaan');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaketPengadaan  $paketPengadaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, PaketPengadaan $paketPengadaan)
    {
        return $user->can('replicate_paket::pengadaan');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_paket::pengadaan');
    }

}
