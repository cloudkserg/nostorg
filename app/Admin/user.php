<?php
use App\User;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(User::class, function (ModelConfiguration $model) {
    $model->setTitle('Пользователи');
    // Display
    $model->onDisplay(function () {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::link('name')->setLabel('Имя'),
                AdminColumn::email('email')->setLabel('Email')->setWidth('150px'),
            ])->paginate(20);
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Имя')->required(),
            AdminFormElement::password('password', 'Пароль')->required()->addValidationRule('min:3'),
            AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
        ]);
    });
})
->addMenuPage(User::class, 0)
->setIcon('fa fa-bank');
