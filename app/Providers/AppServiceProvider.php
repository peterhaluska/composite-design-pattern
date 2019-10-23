<?php

namespace App\Providers;

use App\Collection\OrderCollection;
use App\Collection\ProductCollection;
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

        $giftBoxProducts = new ProductCollection();
        $giftBoxProducts->add($product1);
        $giftBoxProducts->add($product3);

        $giftBoxProducts->add(new Product('My awesome 12EUR product', '121212', 12));

        $box1 = new GiftBox($giftBoxProducts, 'Christmas box', "box686");

        // Create Order
        $user = new User('John Doe', 'johndoe@thedoe.com');
        $orderProductsCollection = new ProductCollection([$product1, $product2, $box1]);
        $order1 = new Order($user, 123, new DateTime('2019-10-23 09:52'), $orderProductsCollection);

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
