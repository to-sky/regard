<?php

declare(strict_types=1);

/*
 * Задача №2
 *
 * Даны две модели Order и Manager
 *
 * Каждый Order имеет manager_id. Manager имеет id, firstName, lastName
 * Необходимо вывести 50 заказов (Order) + fullName менеджера с минимальным кол-вом запросов к бд.
 * Дополните класс Order.
 * Реализовать нужно без использование join.
 */

class Order extends Model
{
    public function manager()
    {
        return $this->hasOne('App\Manager');
    }

    public static function getOrdersWithManagerFullName(int $limit = 50)
    {
        return self::with('manager')
            ->take($limit)
            ->get()
            ->map(function ($order) {
                $manager = $order->manager;
                $order->fullName = $manager ? $manager->firstName . ' ' . $manager->lastName : null;

                return $order;
            });
    }
}

class Manager extends Model
{
}

$orders = Order::getOrdersWithManagerFullName();