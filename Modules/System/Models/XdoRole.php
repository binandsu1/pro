<?php

namespace Modules\System\Models;

use App\Models\XdoBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class XdoRole extends XdoBase
{
    use HasFactory;



    public function getRoutesAttribute() {
        static $routes = null;
        if ( $routes == null  ) {
            $_routes = $this->actions->pluck('route')->toArray();

            if ( $_routes == null ) {
                $routes = [];
            } else {
                $routes = $_routes;
            }
        }
        return $routes;
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
