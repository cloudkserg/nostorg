@extends('layouts.app')

@section('content')
<div class="container">
  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Название</th>
                  <th>Адрес</th>
                  <th>Дата заказа</th>
                  <th>Статус</th>
                  <th>Дата выдачи</th>
                  <th>Тип акции</th>
                  <th>В работе</th>
                  <th>Телефон</th>
                  <th>Адрес</th>
                  <th>Цена</th>
              </tr>
          </thead>
          <!-- <tfoot>
              <tr>
                <th>Ид</th>
                <th>Название</th>
                <th>Адрес</th>
                <th>Дата заказа</th>
                <th>Статус</th>
                <th>Дата выдачи</th>
                <th>Тип акции</th>
                <th>Заказ с</th>
                <th>Телефон</th>
                <th>Цена</th>
              </tr>
          </tfoot> -->
          <tbody>
          @foreach ($orders as $order)
          <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->addres}}</td>
            <td>{{ !empty($order->date) ? $order->date->format('d.m.Y') : '-'}}</td>
            <td>{{ !empty($order->status) ? (new App\Type\OrderStatus())->getTitle($order->status): '-'}}</td>
            <td>{{ !empty($order->date_out) ? $order->date_out->format('d.m.Y') : '-'}}</td>
            <td>{{ isset($order->action) ? $order->action->name : '-'}}</td>
            <td>{{ $order->in_work ? 'В работе' : 'Ожидает'}}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->price }}</td>
          </tr>
          @endforeach
          </tbody>
  </table>
</div>


<script>
  jQuery(document).ready(function() {
    jQuery('#example').DataTable({
            "language": {
                "url": "js/Russian.json"
            }
    });
  });
</script>
@endsection
