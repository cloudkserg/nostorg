<?php
use App\Action;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Action::class, function (ModelConfiguration $model) {
    $model->setTitle('Акции');
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
->addMenuPage(Action::class, 4)
->setIcon('fa fa-bank');
