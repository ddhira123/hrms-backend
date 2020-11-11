<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Activities;

class Timesheet extends Model
{

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'timesheets';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'is_approved',
    'user_id',
  ];

  /**
   * The model's default values for attributes.
   *
   * @var array
   */
  protected $attributes = [
    'is_approved' => false,
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'is_approved' => 'boolean'
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [];

  /**
   * The "booted" method of the model
   * 
   * @return void
   */
  public static function booted()
  {
  }

  /**
   * Sender detail from relation
   * 
   * @return object
   */
  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }

  /**
   * Activities for timesheets
   * 
   * @return object
   */
  public function activities()
  {
    return $this->hasMany(Activities::class, 'timesheet_id', 'id');
  }
}