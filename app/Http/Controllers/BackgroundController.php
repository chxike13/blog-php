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
            if (!$result->isEmpty())
            {
                $request->session()->put('username',$username);
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
//                dd('账户已存在');
                return back()->with('error','账户已存在！');
            }
            if ($password != $passwords){
//                dd('密码不一致');
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
            $act = $request->input('act');
            switch ($act){
                case 'add':{
                    $title = $request->input('title');
                    $author = $request->input('author');
                    $keywords = $request->input('keywords');
                    $cate = $request->input('cate');
                    $desc = $request->input('desc');
                    $content = $request->input('content');
                    $article = new TpArticle();
                    $article->title = $title;
                    $article->author = $author;
                    $article->keywords = $keywords;
                    $article->cate = $cate;
                    $article->desc = $desc;
                    $article->content = $content;
                    $article->save();
                    return redirect(route('articleList'))->with('success','添加成功！');
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
                        return view('background.article.addArticle');
                    }break;
                    case 'mod':{
                        $id = $request->input('id');
                        $articles = TpArticle::find($id);
//                        dd($articles);
                        return view('background.article.modifyArticle',['article'=>$articles]);
                    }
                }
            }
        }
    }

}