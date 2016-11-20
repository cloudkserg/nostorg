<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SleepingOwl\Admin\Http\Controllers\AdminController;

class PurchaseController extends AdminController
{
    


    public function edit()
    {
    	$item = $this->getPurchase();

    	return view('admin.purchase', compact('item'))
    	        ->with('title', 'Закупки')
            	->with('item', $item)
            	->with('content'. '')
            	->with('breadcrumbKey', '');
    }


    public function store(Request $request)
    {
    	$item = $this->getPurchase();
    	$item->text = $request->get('text', '');
    	if (!$item->save()) {
    		throw new \Exception('Не сохранилась информация');
    	}
    	return redirect('/admin/purchase/edit');
    }

    private function getPurchase()
    {
    	$item = \App\Purchase::first();
    	if (!isset($item)) {
    		return new \App\Purchase();
    	}
    	return $item;
    }
}
