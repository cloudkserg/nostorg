<?php
use App\ActiveOrder;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(ActiveOrder::class, function (ModelConfiguration $model) {
    $model->setTitle('Заказы');
    // Display
    $model->onDisplay(function () {
        return AdminDisplay::datatables()
            ->setApply(function ($query) {
                $query->orderBy('id', 'desc');
                $query->where('status', '!=', \App\Type\OrderStatus::ARCHIVE);
            })
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('id')->setLabel('Ид'),
                AdminColumn::text('email')->setLabel('Email'),

                AdminColumn::link('name')->setLabel('Имя'),
                AdminColumn::datetime('date', 'Дата заказа')->setFormat('d.m.Y')->setWidth('150px'),
                AdminColumn::custom('Статус', function (ActiveOrder $row) {
                  return !empty($row->status) ? (new \App\Type\OrderStatus())->getTitle($row->status) : '-';
                }),
                AdminColumn::custom('В работе', function (ActiveOrder $row) {
                    return $row->in_work ? 'Да' : 'Нет';
                }),
                AdminColumn::custom('Курьер', function (ActiveOrder $row) {
                  return isset($row->courier) ? $row->courier->name : '-';
                }),
                AdminColumn::text('address', 'Адрес'),
                AdminColumn::custom('Тип акции', function (ActiveOrder $row) {
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
            AdminFormElement::checkbox('in_work', 'В работе'),
            AdminFormElement::date('date_out', 'Дата выдачи')->setFormat('d.m.Y'),
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


    $model->updating(function(ModelConfiguration $model, ActiveOrder $order) {
      event(new \App\Events\OrderUpdate($order));
    });

    $model->setAlias('admin/orders');
})
->addMenuPage(ActiveOrder::class, 0)
->setIcon('fa fa-bank');
