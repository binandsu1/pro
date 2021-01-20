<?php
namespace Modules\System\Models;
use Jenssegers\Mongodb\Eloquent\Model;

abstract class BaseMongo extends Model
{
    protected $connection = 'yan_data';
    protected $guarded = [];

}
