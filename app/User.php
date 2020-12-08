<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'privilege_id', 'is_active', 'is_approved'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function privilege() {
        return $this->belongsTo(Privilege::class, 'privilege_id', 'id');
    }

    /*Funções adicionais*/
    public function getFirstName() {
        $names = explode(' ', $this->name);

        return $names[0];
    }

    public function getFirstLetter() {
        $names = explode(' ', $this->name);

        return $names[0][0];
    }

    public function isSuperAdmin() {
        return $this->privilege->fl_superadmin;
    }

    public function getInitials() {
        $names = explode(' ', $this->name);
        $initials = "";

        foreach ($names as $name) {
            $initials = $initials . $name[0];
        }

        return $initials;
    }

    /*Accessors*/
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date, 'GMT-3')->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date, 'GMT-3')->format('d/m/Y H:i:s');
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
