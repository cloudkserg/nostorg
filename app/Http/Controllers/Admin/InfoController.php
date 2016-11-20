<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SleepingOwl\Admin\Http\Controllers\AdminController;

class InfoController extends AdminController
{
    


    public function edit()
    {
    	$item = $this->getInfo();

    	return view('admin.info', compact('item'))
    	        ->with('title', 'Информация')
            	->with('item', $item)
            	->with('content'. '')
            	->with('breadcrumbKey', '');
    }


    public function store(Request $request)
    {
    	$item = $this->getInfo();
    	$item->text = $request->get('text', '');
    	if (!$item->save()) {
    		throw new \Exception('Не сохранилась информация');
    	}
    	return redirect('/admin/info/edit');
    }

    private function getInfo()
    {
    	$item = \App\Info::first();
    	if (!isset($item)) {
    		return new \App\Info();
    	}
    	return $item;
    }
}
