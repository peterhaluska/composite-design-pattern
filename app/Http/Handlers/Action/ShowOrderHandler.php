<?php

namespace App\Http\Handlers\Action;

use App\Exceptions\OrderNotFoundException;
use App\Repository\OrderRepository;
use App\ValueObject\ViewData;

class ShowOrderHandler
{
    /** @var OrderRepository */
    private $orderRepository;

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param int $orderId
     *
     * @return ViewData
     * @throws OrderNotFoundException
     */
    public function viewOrderDetails(int $orderId): ViewData
    {
        $order = $this->orderRepository->getOrderById($orderId);

        $viewParams = [
            'order' => $order,
        ];

        return new ViewData('order.show', $viewParams);
    }
}
