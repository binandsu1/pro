<?php
namespace Modules\System\Models;

use App\Models\XdoBase;
use Jenssegers\Mongodb\Eloquent\Model;

abstract class BaseMongo extends XdoBase
{
    protected $connection = 'mongo_data';
    protected $guarded = [];
}
