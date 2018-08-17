<?php
/**
 * Created by PhpStorm.
 * User: CHxik
 * Date: 2018/8/16
 * Time: 9:09
 */

namespace App\Http\Controllers;


use App\TpArticle;
use App\TpCate;
use App\TpTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForegroundController extends Controller
{
    public function index()
    {
        $cates = TpCate::all();
        $tags = TpTags::all();
        $articles = TpArticle::orderBy('create_time','desc')->paginate(3);
        $clicks = TpArticle::orderBy('click','desc')->take(4)->get();
        $recommend = TpArticle::where('state','=',1)->take(4)->get();
        return view('foreground.index',['cates'=>$cates, 'tags'=>$tags, 'articles'=>$articles, 'clicks'=>$clicks, 'recommend'=>$recommend]);
    }


    public function getContent(Request $request)
    {
        $act = $request->input('act');
        $id = $request->input('id');
        if ($act)
        {
            switch ($act)
            {
                case 'cate':{
                    $articles = TpArticle::where('cateid','=',$id)->paginate(5);
                    $cates = TpCate::find($id);
                    return view('foreground.list',['articles'=>$articles,'cates'=>$cates]);
                }break;
                case 'tag':{
                    $articles = DB::table('tp_article')->where('keywords','like','%'.$id.'%')->paginate(5);
                    return view('foreground.list',['articles'=>$articles]);
                }break;
            }
        }
        $articles = TpArticle::find($id);
        $click  = $articles->click;
        $click++;
        $articles->click = $click;
        $keywords = preg_split("/[,]+/",$articles->keywords);
        $articles->save();
        $cates = TpCate::find($articles->cateid);
        return view('foreground.article',['articles'=>$articles,'cates'=>$cates, 'keywords'=>$keywords]);
    }
    public function getPosition(Request $request)
    {
        $act = $request->input('act');
        $id = $request->input('id');
        switch ($act){
            case 'cate':{
                $cates = TpCate::find($id);
                return view('foreground.position',['cates'=>$cates,'act'=>'cate']);
            }break;
            case 'art':{
                $articles = TpArticle::find($id);
                $cates = TpCate::find($articles->cateid);
                return view('foreground.position',['cates'=>$cates,'act'=>'cate']);
            }break;
            case 'tag':{
                return view('foreground.position',['tagname'=>$id,'act'=>'tag']);
            }break;
        }
    }
}