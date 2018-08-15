<?php
/**
 * Created by PhpStorm.
 * User: CHxik
 * Date: 2018/8/13
 * Time: 11:33
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
class Tbstudent extends Model
{
    protected $table = 'tb_student';
    protected $primaryKey = 'stu_num';
}