<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Courier;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    // Метод для назначения курьера на заказ
    public function assign(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'courier_id' => 'required|exists:couriers,id',
        ]);

        $order = Order::findOrFail($validated['order_id']);
        $courier = Courier::findOrFail($validated['courier_id']);

        // Обновляем заказ и назначаем курьера
        $order->courier_id = $courier->id;
        $order->status = 'assigned';
        $order->save();

        return new OrderResource($order);
    }

    public function store(Request $request)
    {
        $data = $request->input('data');
        $orders = [];

        foreach ($data as $orderData) {
            // Преобразование delivery_hours в JSON строку
            $orderData['delivery_hours'] = json_encode($orderData['delivery_hours']);

            // Создание нового заказа
            $orders[] = Order::create($orderData);
        }

        return OrderResource::collection($orders);
    }

    // Метод для завершения заказа
    public function complete(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::findOrFail($validated['order_id']);

        // Обновляем статус заказа на завершенный
        $order->status = 'completed';
        $order->save();

        return new OrderResource($order);
    }
}



