<?php

namespace Modules\Mongo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\System\Models\BaseMongo;

abstract class MongData extends BaseMongo
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

}
