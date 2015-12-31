<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.index')->with('pages',Page::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if(\Entrust::can('page_create')){
//           return view('page.create');
//        }else{
//            return \Redirect::back()->withErrors('抱歉，您没有创建页面权限');
//        }
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->title = $request->get('title');
        $page->slug = $request->get('slug');
        $page->body = $request->get('body');

        if(Auth::check()){
            $page->user_id = Auth::user()->id;
        }

        if($page->save()){
            return redirect('page');
        }else{
            return redirect('page')->withErrors('创建失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('page.show')->with('page',Page::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('page.edit')->with('page',Page::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:pages,title,'.$id.'|max:255',
            'body' => 'required',
        ]);

        $page = Page::find($id);
        $page->title = $request->get('title');
        $page->slug = $request->get('slug');
        $page->body = $request->get('body');
        $page->user_id = 1;//Auth::user()->id;

        if ($page->save()) {
            return redirect('page');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect('page');
    }
}
