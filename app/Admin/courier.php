<?php
use App\Courier;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Courier::class, function (ModelConfiguration $model) {
    $model->setTitle('Курьеры');
    // Display
    $model->onDisplay(function () {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::link('name')->setLabel('Имя'),
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Имя')->required(),
        ]);
    });
})
->addMenuPage(Courier::class, 4)
->setIcon('fa fa-bank');
