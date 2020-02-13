<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $username
 * @property string $level
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Permasalahan
 *
 * @property int $id
 * @property string $judul
 * @property string $konten
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permasalahan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permasalahan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permasalahan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permasalahan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permasalahan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permasalahan whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permasalahan whereKonten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permasalahan whereUpdatedAt($value)
 */
	class Permasalahan extends \Eloquent {}
}

namespace App{
/**
 * App\SubMateri
 *
 * @property int $id
 * @property string $judul
 * @property string $konten
 * @property int $materi_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri whereKonten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri whereMateriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubMateri whereUpdatedAt($value)
 */
	class SubMateri extends \Eloquent {}
}

namespace App{
/**
 * App\Materi
 *
 * @property int $id
 * @property string $judul
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materi query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materi whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materi whereUpdatedAt($value)
 */
	class Materi extends \Eloquent {}
}

