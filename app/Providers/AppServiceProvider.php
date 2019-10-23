<?php

namespace App\Providers;

use App\Collection\OrderCollection;
use App\Entity\GiftBox;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\User;
use App\Exceptions\DuplicateOrderIdException;
use App\Repository\DummyORM\DummyOrderRepository;
use App\Repository\OrderRepository;
use DateTime;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * @return void
     * @throws DuplicateOrderIdException
     */
    public function register()
    {
        // Bind implementations to interfaces
        $this->app->bind(OrderRepository::class, DummyOrderRepository::class);

        // Set up our dummy Products and Order database
        $product1 = new Product("I am awesome T-shirt", "ts154", 10);
        $product2 = new Product("DesignPatternitis T-shirt", "ts666", 15);
        $product3 = new Product('Supersocks', "s1", 3);

        $box1 = new GiftBox([$product1, $product3], 'Christmas box', 13, "box686");

        $user = new User('John Doe', 'johndoe@thedoe.com');
        $order1 = new Order($user, 123, new DateTime('2019-10-23 09:52'), [$product1, $product2, $box1], 38);

        $orderCollection = new OrderCollection();
        $orderCollection->add($order1);

        $this->app->bind(OrderCollection::class, function() use ($orderCollection) {
            return $orderCollection;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
