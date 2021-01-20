<?php

namespace Modules\Mongo\Models;

use Modules\System\Models\BaseMongo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MongData extends BaseMongo
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

}
