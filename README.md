# Price Quote API

Quick dummy API to create and fill product price quotes for customers.

## Endpoints

| Method    | URI                          | Name              |
|-----------|------------------------------|-------------------|
| GET-HEAD  | /api/customers               | customers.index   |
| GET-HEAD  | /api/customers/{customer_id} | customers.show    |
| POST      | /api/customers               | customers.store   |
| PUT-PATCH | /api/customers/{customer_id} | customers.update  |
| GET-HEAD  | /api/products                | products.index    |
| GET-HEAD  | /api/products/{product_id}   | products.show     |
| POST      | /api/products                | products.store    |
| PUT-PATCH | /api/products/{product_id}   | products.update   |
| GET-HEAD  | /api/quotes                  | quotes.index      |
| GET-HEAD  | /api/quotes/{quote_id}       | quotes.show       |
| POST      | /api/quotes                  | quotes.store      |
| PUT-PATCH | /api/quotes/{quote_id}       | quotes.update     |

## Examples

All the GET endpoints can simply be viewed in a browser,
such as https://example.com/api/customers

To send data to the server, [curl][1] will be used for the following examples.

Create a customer:

    curl --request POST --data 'first_name=John&last_name=Doe&email=john@example.com&phone=888-555-5555' https://example.com/api/customers

```json
{
  "id": 42,
  "created_at": "2017-04-11 21:16:24",
  "updated_at": "2017-04-11 21:16:24",
  "first_name": "John",
  "last_name": "Doe",
  "email": "john@example.com",
  "phone": "888-555-5555"
}
```

Create a product:

    curl --request POST --data 'name=widget&description=something amazing&image=https://lorempixel.com/640/480/technics/?20016' https://example.com/api/products

```json
{
  "id": 51,
  "created_at": "2017-04-11 21:21:07",
  "updated_at": "2017-04-11 21:21:07",
  "name": "widget",
  "description": "something amazing",
  "image": "https://lorempixel.com/640/480/technics/?20016"
}
```

Request a quote (no price):

    curl --request POST --data 'customer_id=42&product_id=51' https://example.com/api/quotes

```json
{
  "id": 13,
  "created_at": "2017-04-11 21:27:04",
  "updated_at": "2017-04-11 21:27:04",
  "price": null,
  "customer_id": 42,
  "product_id": 51
}
```

Fulfill a quote (notice `updated_at` has changed too):

    curl --request PATCH --data 'price=99.99' https://example.com/api/quotes/13

```json
{
  "id": 13,
  "created_at": "2017-04-11 21:27:04",
  "updated_at": "2017-04-11 21:31:09",
  "price": "99.99",
  "customer_id": 42,
  "product_id": 51
}
```

## Installation

generate some random data:

```php
factory(App\Quote::class, 50)->create();
```

[1]:https://curl.haxx.se/
