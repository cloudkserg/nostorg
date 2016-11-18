<?php
use App\Order;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Order::class, function (ModelConfiguration $model) {
    $model->setTitle('Заказы');
    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('id')->setLabel('Ид'),
                AdminColumn::text('email')->setLabel('Email'),

                AdminColumn::link('name')->setLabel('Имя'),
                AdminColumn::datetime('date', 'Дата заказа')->setFormat('d.m.Y')->setWidth('150px'),
                AdminColumn::custom('Статус', function (Order $row) {
                  return !empty($row->status) ? (new \App\Type\OrderStatus())->getTitle($row->status) : '-';
                }),
                AdminColumn::custom('Курьер', function (Order $row) {
                  return isset($row->courier) ? $row->courier->name : '-';
                }),
                AdminColumn::text('address', 'Адрес'),
                AdminColumn::custom('Тип акции', function (Order $row) {
                  return isset($row->action) ? $row->action->name : '-';
                }),
                AdminColumn::text('profit', 'Прибыль'),
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Имя')->required(),
            AdminFormElement::date('date', 'Дата заказа')->setFormat('d.m.Y')->required(),
            AdminFormElement::select('status', 'Статус')
              ->setOptions((new \App\Type\OrderStatus())->getData())
              ->setDefaultValue(\App\Type\OrderStatus::ACTIVE)
              ->required(),

            AdminFormElement::date('date_out', 'Дата выдачи')->setFormat('d.m.Y'),
            AdminFormElement::date('order_start', 'Заказ с')->setFormat('d.m.Y'),
            AdminFormElement::select('action_id', 'Тип акции')->setOptions(\App\Action::pluck('name', 'id')->toArray()),
            AdminFormElement::text('price', 'Цена'),
            AdminFormElement::text('packer', 'Упаковщик'),
            AdminFormElement::select('courier_id', 'Курьер')->setOptions(\App\Courier::pluck('name', 'id')->toArray()),
            AdminFormElement::text('delivery', 'Доставка'),
            AdminFormElement::text('profit', 'Прибыль'),
            AdminFormElement::text('size', 'Размер'),
            AdminFormElement::text('phone', 'Телефон'),
            AdminFormElement::text('email', 'E-mail'),
            AdminFormElement::text('address', 'Адрес'),
            AdminFormElement::textarea('comment', 'Коммент'),
            AdminFormElement::textarea('wish', 'Пожелания от клиента-курьера-цпк'),

        ]);
    });


    $model->updating(function(ModelConfiguration $model, Order $order) {
      event(new \App\Events\OrderUpdate($order));
    });
})
->addMenuPage(Order::class, 0)
->setIcon('fa fa-bank');
