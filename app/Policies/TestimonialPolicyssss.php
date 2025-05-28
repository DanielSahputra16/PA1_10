<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonialPolicy
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
        return true; // Siapa saja boleh melihat daftar testimonial
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Testimonial $testimonial)
    {
        return true; // Siapa saja boleh melihat detail testimonial
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return auth()->check(); // Hanya user yang login boleh membuat
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Testimonial $testimonial)
    {
        return $user->id === $testimonial->user_id; // Hanya pemilik yang boleh mengedit
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Testimonial $testimonial)
{
    echo "TestimonialPolicy@delete dijalankan"; // Menggunakan echo untuk debug
    return true; // Izinkan semua pengguna untuk menghapus (HANYA UNTUK DEBUG!)
}
}
