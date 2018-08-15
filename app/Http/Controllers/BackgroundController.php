<?php
/**
 * Created by PhpStorm.
 * User: CHxik
 * Date: 2018/8/13
 * Time: 18:49
 */

namespace App\Http\Controllers;


use App\TpAdmin;
use App\TpArticle;
use App\TpCate;
use App\TpTags;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class BackgroundController extends Controller
{
//    首页
    public function index()
    {
        return view('background.index');
    }
//    编辑权限
    public function edit()
    {
        return view('edit');
    }
//    用户列表
    public function roleList(Request $request)
    {
        $action = $request->input('act');
        if ($action){
            switch ($action){
                case 'del':{
                    $role = TpAdmin::find($request->input('id'));
                    if ($role){
                        $role->delete();
                        return redirect('background/roleList')->with('success','删除成功!');
                    }
                    return redirect('background/roleList')->with('error','删除失败!');
                }break;
            }
        }
        $roles = TpAdmin::all();
        return view('background.admin.roleList',['roles'=>$roles]);
    }
//    文章列表
    public function articleList(Request $request)
    {
        $action = $request->input('act');
        if ($action){
            switch ($action){
                case 'del':{
                    $articles = TpArticle::find($request->input('id'));
                    if ($articles){
                        $articles->delete();
                        return redirect('background/articleList')->with('success','删除成功!');
                    }
                    return redirect('background/articleList')->with('error','删除失败!');
                }break;
            }
        }
        $articles = TpArticle::all();
        return view('background.article.articleList',['articles'=>$articles]);
    }
//    登录
    public function login(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $username = $request->input('username');
            $password = $request->input('password');
            $result = TpAdmin::all()->where('username','=',$username)->where('password','=',$password);
            $test = $result->first();
            $id = $test->id;
            if (!$result->isEmpty())
            {
                $request->session()->put('username',$username);
                $request->session()->put('id',$id);
                return redirect(route('index'));
            }else{
                return back()->with('error','登陆失败！');
            }
        }
        if (session()->has('username'))
        {
            session()->forget('username');
        }
        return view('background.admin.login');
    }
//    注册
    public function register(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $username = $request->input('username');
            $password = $request->input('password');
            $passwords = $request->input('passwords');
            $result = TpAdmin::all()->where('username','=',$username);
            if (!$result->isEmpty()){
                return back()->with('error','账户已存在！');
            }
            if ($password != $passwords){
                return back()->with('error','两次输入的密码不一致！');
            }
            $admin = new TpAdmin();
            $admin->username = $username;
            $admin->password = $password;
            $admin->save();
            return redirect(route('page-login'))->with('success','注册成功！');
        }
        return view('background.admin.register');
    }
//    更新用户（添加或修改）
    public function updateRole(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $act = $request->input('act');
            switch ($act){
                case 'add':{
                    $username = $request->input('username');
                    $password = $request->input('password');
                    $result = TpAdmin::all()->where('username','=',$username);
                    if (!$result->isEmpty()){
//                dd('账户已存在');
                        return back()->with('error','账户已存在！');
                    }
                    $admin = new TpAdmin();
                    $admin->username = $username;
                    $admin->password = $password;
                    $admin->save();
                    return redirect(route('roleList'))->with('success','添加成功！');
                }break;
                case 'mod':{
                    $username = $request->input('username');
                    $id = $request->input('id');
                    $result = TpAdmin::find($id);
                    $result->username = $username;
                    $result->save();
                    return redirect(route('roleList'))->with('success','修改成功！');
                }break;
            }

        }else{
            if ($request->input('act')){
                $act = $request->input('act');
                switch ($act){
                    case 'add':{
                        return view('background.admin.addRole');
                    }break;
                    case 'mod':{
                        return view('background.admin.modifyRole',['username'=>$request->input('username'),'id'=>$request->input('id')]);
                    }
                }
            }
        }
    }
//    更新文章（添加或修改）
    public function updateArticle(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $title = $request->input('title');
            $author = $request->input('author');
            $keywords = $request->input('keywords');
            $cate = $request->input('cateid');
            $desc = $request->input('desc');
            $content = $request->input('content');
            $act = $request->input('act');
            $id = $request->input('id');
            $state = $request->input('state');
            $keywordsStr = implode(",",$keywords);
            switch ($act){
                case 'add':{
                    $article = new TpArticle();
                    $article->title = $title;
                    $article->author = $author;
                    $article->keywords = $keywordsStr;
                    $article->cateid = $cate;
                    $article->desc = $desc;
                    $article->content = $content;
                    $article->state = $state;
                    $article->save();
                    return redirect(route('articleList'))->with('success','添加成功！');
                }break;
                case 'mod':{
                    $article = TpArticle::find($id);
                    $article->title = $title;
                    $article->author = $author;
                    $article->keywords = $keywordsStr;
                    $article->cateid = $cate;
                    $article->desc = $desc;
                    $article->content = $content;
                    $article->state = $state;
                    $article->save();
                    return redirect(route('articleList'))->with('success','修改成功！');
                }break;
            }

        }else{
            if ($request->input('act')){
                $act = $request->input('act');
                $tags = TpTags::all();
                $cates = TpCate::all();
                switch ($act){
                    case 'add':{
                        return view('background.article.addArticle',['cates'=>$cates,'tags'=>$tags]);
                    }break;
                    case 'mod':{
                        $id = $request->input('id');
                        $articles = TpArticle::find($id);
                        $keywords = preg_split("/[,]+/",$articles->keywords);
                        return view('background.article.modifyArticle',['article'=>$articles, 'cates'=>$cates, 'tags'=>$tags, 'keywords'=>$keywords]);
                    }
                }
            }
        }
    }
    public function tagList(Request $request)
    {
        $action = $request->input('act');
        if ($action){
            switch ($action){
                case 'del':{
                    $tags = TpTags::find($request->input('id'));
                    if ($tags){
                        $tags->delete();
                        return redirect('background/tagList')->with('success','删除成功!');
                    }
                    return redirect('background/tagList')->with('error','删除失败!');
                }break;
            }
        }
        $tags = TpTags::all();
        return view('background.tag.tagList',['tags'=>$tags]);
    }

    public function updateTag(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $act = $request->input('act');
            $tagname = $request->input('tagname');
            $id = $request->input('id');
            switch ($act){
                case 'add':{
                    $tags = new TpTags();
                    $tags->tagname = $tagname;
                    $tags->save();
                    return redirect(route('tagList'))->with('success','添加成功！');
                }break;
                case 'mod':{
                    $tags = TpTags::find($id);
                    $tags->tagname = $tagname;
                    $tags->save();
                    return redirect(route('tagList'))->with('success','修改成功！');
                }break;
            }

        }else{
            if ($request->input('act')){
                $act = $request->input('act');
                switch ($act){
                    case 'add':{
                        return view('background.tag.addTag');
                    }break;
                    case 'mod':{
                        $id = $request->input('id');
                        $tags = TpTags::find($id);
                        return view('background.tag.modifyTag',['tags'=>$tags]);
                    }
                }
            }
        }
    }

    public function cateList(Request $request)
    {
        $action = $request->input('act');
        if ($action){
            switch ($action){
                case 'del':{
                    $cates = TpCate::find($request->input('id'));
                    if ($cates){
                        $cates->delete();
                        return redirect('background/cateList')->with('success','删除成功!');
                    }
                    return redirect('background/cateList')->with('error','删除失败!');
                }break;
            }
        }
        $cates = TpCate::all();
        return view('background.cate.cateList',['cates'=>$cates]);
    }

    public function updateCate(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $act = $request->input('act');
            $catename = $request->input('catename');
            $id = $request->input('id');
            switch ($act){
                case 'add':{
                    $cates = new TpCate();
                    $cates->catename = $catename;
                    $cates->save();
                    return redirect(route('cateList'))->with('success','添加成功！');
                }break;
                case 'mod':{
                    $cates = TpCate::find($id);
                    $cates->catename = $catename;
                    $cates->save();
                    return redirect(route('cateList'))->with('success','修改成功！');
                }break;
            }

        }else{
            if ($request->input('act')){
                $act = $request->input('act');
                switch ($act){
                    case 'add':{
                        return view('background.cate.addCate');
                    }break;
                    case 'mod':{
                        $id = $request->input('id');
                        $cates = TpCate::find($id);
                        return view('background.cate.modifyCate',['cates'=>$cates]);
                    }
                }
            }
        }
    }
    public function modifyPassword(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $password = $request->input('password');
            $passwords = $request->input('passwords');
            if ($password != $passwords)
            {
                return back()->with('error','修改失败，两次输入的密码不一致！');
            }else{
                $id = \session()->get('id');
                $admin = TpAdmin::find($id);
                $admin->password = $password;
                $admin->save();
                return redirect(route('page-login'))->with('success',"修改成功，请重新登陆！");
            }
        }
        return view('background.admin.modifyPassword');
    }

}