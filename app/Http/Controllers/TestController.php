<?php
/**
 * Created by PhpStorm.
 * User: CHxik
 * Date: 2018/8/10
 * Time: 16:54
 */
namespace App\Http\Controllers;
use App\Tbstudent;
use Illuminate\Support\Facades\DB;
class TestController extends Controller{
    public function info(){
       $result = Tbstudent::all();
       dd($result);
    }
}