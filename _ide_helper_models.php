<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Photo
 *
 * @property int $id
 * @property int $user_id
 * @property string $caption
 * @property string $file_name
 * @property string $extension
 * @property string $size
 * @property string $height
 * @property string $width
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $author
 * @property-read mixed $created_at_diff_for_human
 * @property-read float $kilo_bytes
 * @property-read mixed $photo_file_path
 * @property-read mixed $tag_list
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereWidth($value)
 */
	class Photo extends \Eloquent {}
}

namespace App{
/**
 * App\PhotoTag
 *
 * @property int $id
 * @property int $photo_id
 * @property int $tag_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PhotoTag whereUpdatedAt($value)
 */
	class PhotoTag extends \Eloquent {}
}

namespace App{
/**
 * App\Tag
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereName($value)
 */
	class Tag extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

