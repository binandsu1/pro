<?php

namespace Modules\Laravel\Models;

use App\Models\XdoBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class XdoArtisan extends XdoBase
{
    use HasFactory,SoftDeletes;


}
