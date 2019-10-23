<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Composite Pattern - Workshop</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        <small>
                            The Composite Pattern - Workshop
                        </small>
                    </div>
                </div>
                <div>
                    <h3>Application</h3>
                    <p>
                        Our application displays one specific Order from our E-shop, listing all the products and the total price of the Order.
                    </p>
                    <p>
                        The application is not connected to any Database, it is using a dummy repository to grab the Order and it's items. The current database for the Orders
                        is configured in the <strong>AppServiceProvider</strong>.
                    </p>
                    <p>
                        Through our E-shop we can order simple Products or so called Gift Boxes, which can contain any number of products or smaller gift boxes.
                        <br>
                        Please keep in mind, our application currently supports <string>int</string> values for Prices.
                    </p>

                    <h3>
                        The Task
                    </h3>
                    <p>
                        As currently the application is containing some very bad code, our goal is to refactor it while implementing the Composite Pattern.
                    </p>
                    <p>
                        The main problem is, that we are currently setting the Order's Total Price manually when creating the Order...there is a better way to do it! ;)
                    </p>
                    <p>
                        Once you have identified the place for the Composite pattern and have implemented it, please create a new Product in the AppServiceProvider with a Price
                        of 12EUR and add it to the existing gift box. You will know you have implemented the Composite, if the Order's total amount will be 50EUR.
                    </p>
                    <p>Good luck!</p>
                </div>
                <div>
                    <p class="center">
                        <a class="btn" href="{{ route('order.show', 123) }}">
                            Go to the Order
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
