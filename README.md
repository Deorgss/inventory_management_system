# Vanilla PHP REST API
A high-performance, framework-free RESTful API for inventory management.

## Key Highlights

+ Architecture: Clean MVC-like structure with a Single Entry Point.

+ Database: Secure implementation using PHP Data Objects (PDO) with prepared statements.

+ Speed: Minimal overhead, optimized for high-load microservices.

+ Composer Autoload: Standard PSR-4 namespacing for clean dependency management.

## API Endpoints
- `GET /products` — Get all products.
- `POST /products` — Create a new product.
- Body: `{"name": "Laptop", "sku": "LT-100", "quantity": 10, "price": 999.99}`

## Testing the API:

+ Copy api_tests.http.sample to api_tests.http.
+ Update the @baseUrl variable with your local or server URL.
+ Use the VS Code REST Client extension to run requests.
