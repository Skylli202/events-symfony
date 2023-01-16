<?php

namespace App\EventListener;

use App\Entity\Order;
use Doctrine\Persistence\Event\LifecycleEventArgs;


class OrderListener
{
    public function prePersist(Order $order, LifecycleEventArgs $lifecycleEventArgs)
    {
        dump('OrderListener->prePersist(...)');
//        dump($order, $lifecycleEventArgs);
        $order->setCreationDate(new \DateTime());
    }

    public function preFlush(Order $order)
    {
        dump('OrderListener->preFlush(...)');
        //        dump($order, $lifecycleEventArgs);
        // Update the updateDate property only on update and not on creation
        // preFlush event is also call at creation but at this time entity id would be null
        if ($order->getId() !== null) {
            $order->setUpdateDate(new \DateTime());
        }
    }
}