<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageTable extends Model
{
	protected $connection = 'mysql_SNS';
    protected $table = 'Messagetable';
    protected $guarded = array('id');
}
