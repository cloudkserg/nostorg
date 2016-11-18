В вашем заказе #{{ $item->id }} произошли изменения: <br />
<a href="{{ url('/orders', ['email' => $item->email]) }}">Просмотреть изменения</a></br />
Информация о заказе:<br />
Имя: {{ $item->name }} <br />
Дата заказа: {{ !empty($item->date) ? $item->date->format('d.m.Y') : '-'}} <br />
Дата выдачи: {{ !empty($item->date_out) ? $item->date_out->format('d.m.Y') : '-'}} <br />
Статус: {{ !empty($item->status) ? (new \App\Type\OrderStatus())->getTitle($item->status) : '-'}} <br />
Заказ с: {{ !empty($item->order_start) ? $item->order_start->format('d.m.Y') : '-'}} <br />
Тип акции: {{ isset($item->action) ? $item->action->name : '-'}} <br />
Цена: {{ $item->price }}<br />
Размер: {{ $item->size }}<br />
Доставка: {{ $item->delivery }}<br />
Телефон: {{ $item->phone }}<br />
Адрес: {{ $item->address }}<br />
