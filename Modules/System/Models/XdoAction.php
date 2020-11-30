<?php

namespace Modules\System\Models;

use App\Models\XdoBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class XdoAction extends XdoBase
{
    use HasFactory;
    protected $table = 'xdo_actions';
}
