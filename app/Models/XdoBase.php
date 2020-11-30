<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 基础模型扩展
 */
class XdoBase extends Model
{
  protected $guarded = [];

  /**
   * 获取字段映射
   */
  static public function getFieldMap($field=null, $value=null) {
    $retval = null;
    if ( $field === null && $value === null ) {
      // TODO 获取所有map数据
    } else {
      $target = $field.'_map';
      if ( $field !==null && $value === null ) {
        $retval = static::$$target;
      } else {
        $retval = static::$$target[$value];
      }
    }
    return $retval;
  }

  /**
   * 将时间戳转传承时间格式或者时间对象
   */
  public function toDate($value, $isObj=false) {
    if ( $isObj === false ) {
      return date('Y-m-d H:i:s');
    } else {
      return app('xdo.datetime')->setTimestamp($value);
    }
  }

  /**
   * TODO 自动装载缺省值
   */
  public function loadDefaulValues() {

  }

}