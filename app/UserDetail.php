<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{


  protected $fillable = [
      'user_id','clock_in_date','clock_in_time','clock_out_date','clock_out_time'
  ];
  const UPDATED_AT = null;




  protected $table = 'user_login_details';
}
