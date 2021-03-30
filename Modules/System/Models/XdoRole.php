<?php

namespace Modules\System\Models;

use App\Models\XdoBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class XdoRole extends XdoBase
{
    use HasFactory;



    public function getRoutesAttribute() {
            $_routes = $this->actions->pluck('route')->toArray();
        return $_routes;
    }

    public function adminGroupActions()
    {
        $rel = [
            XdoAction::class,
            'xdo_admin_group_actions',
            'group_id', 'unioncode',
            'id', 'unioncode'
        ];
        return $this->belongsToMany(...$rel)->wherePivot('is_del', 0);
    }

    public function getActionsAttribute() {
        return $this->adminGroupActions()->get();
    }



}
