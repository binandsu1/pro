<?php

namespace Modules\Curd\Models;

use App\Models\XdoBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class XdoData extends XdoBase
{
    use HasFactory,SoftDeletes;


}
