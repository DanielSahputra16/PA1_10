<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Reservasi;
use App\Models\User;
use App\Models\Testimonial;
use App\Policies\ReservasiPolicy;
use App\Policies\TestimonialPolicy; // Tambahkan use statement untuk TestimonialPolicy

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    // protected $policies = [
    //     Reservasi::class => ReservasiPolicy::class,
    //     Testimonial::class => TestimonialPolicy::class, // Daftarkan TestimonialPolicy
    // ];

    /**
     * Register any authentication / authorization services.
     */ 
    public function boot(): void
    {
        $this->registerPolicies();

        // ---------------------------------------------------------------------
        // Opsi 1: Berikan akses penuh kepada Super Admin (Jika Anda punya)
        // ---------------------------------------------------------------------
        // Gate::before() akan dijalankan *sebelum* policy apapun.  Jika user
        // adalah admin, mereka akan diizinkan melakukan *semua* action.
        // Jika Anda tidak punya Super Admin, hapus atau komentari bagian ini.
        Gate::before(function ($user, $ability) {
            return $user->isAdmin() ? true : null; // Asumsi isAdmin() ada di model User
        });

        // ---------------------------------------------------------------------
        // Opsi 2: Definisikan Gate individual untuk izin yang lebih granular
        // ---------------------------------------------------------------------
        // Gunakan Gate::define() untuk mendefinisikan izin individual.  Ini
        // memberikan kontrol yang lebih besar atas siapa yang bisa melakukan
        // apa.  Ganti logika di dalam closure dengan cara Anda menentukan
        // izin (misalnya, berdasarkan role, permission, atau kombinasi keduanya).
        // ---------------------------------------------------------------------

        Gate::define('view-reservations', function (User $user) {
            // Contoh: User harus memiliki permission 'view-reservations' atau menjadi admin
            return $user->hasPermission('view-reservations'); // Asumsi ada method hasPermission di model User
        });

        Gate::define('create-reservations', function (User $user) {
            // Contoh: Semua user yang terautentikasi bisa membuat reservasi
            return true; // Atau tambahkan logic yang lebih kompleks jika diperlukan
        });

        Gate::define('update-reservations', function (User $user, Reservasi $reservasi) {
            // Contoh: User yang membuat reservasi bisa mengupdate (jika statusnya 'pending')
            // ATAU admin bisa mengupdate
            return ($reservasi->user_id === $user->id && $reservasi->status === Reservasi::STATUS_PENDING) || $user->isAdmin();
        });

        Gate::define('delete-reservations', function (User $user, Reservasi $reservasi) {
            // Contoh: Hanya admin yang bisa menghapus reservasi
            return $user->isAdmin();
        });

        Gate::define('confirm-reservations', function (User $user) {
            // Contoh: Hanya user dengan permission 'confirm-reservations' yang bisa mengkonfirmasi
            return $user->hasPermission('confirm-reservations');
        });

        // Tidak perlu Gate::define untuk Testimonial jika menggunakan Policy

        // Gate::define('update-testimonial', function (User $user, Testimonial $testimonial) {
        //     // User bisa update testimonial jika dia pembuatnya
        //     return $testimonial->user_id === $user->id;
        // });

        // Gate::define('delete-testimonial', function (User $user, Testimonial $testimonial) {
        //     // User bisa delete testimonial jika dia pembuatnya
        //     return $testimonial->user_id === $user->id;
        // });
    }
}
