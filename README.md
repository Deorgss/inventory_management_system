# Simple Inventory Management System (REST API)

A lightweight, high-performance PHP REST API designed for inventory tracking. Built with a focus on clean architecture, security, and scalability.

## 🚀 Key Highlights

* **Architecture:** Clean MVC-inspired structure with a **Single Entry Point** (`public/index.php`) and a custom **dynamic Router**.
* **Database:** Secure implementation using **PDO** with prepared statements to prevent SQL injection.
* **Performance:** Zero-framework overhead, optimized for high-load microservices.
* **Standards:** Fully compliant with **PSR-4** namespacing for clean and predictable dependency management.
* **Environment:** Ready for **Docker** deployment (PHP-FPM, Nginx, MySQL).

## 🛠 Tech Stack
* PHP 8.x (Native)
* MySQL 8.0
* Composer (PSR-4 Autoloading)
* Docker & Docker-Compose

## 📂 API Endpoints

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `GET` | `/products` | Retrieve all products from the database |
| `GET` | `/products/{id}` | Retrieve a specific product by ID |
| `POST` | `/products` | Create a new product |
| `PUT` | `/products/{id}` | Update an existing product |
| `DELETE` | `/products/{id}` | Remove a product from inventory |

### Example POST Request Body:
```json
{
    "name": "Hetzner Cloud Server",
    "sku": "HTZ-001",
    "quantity": 10,
    "price": 12.50
}
```

###  🧪 Testing the API
I've included a pre-configured testing suite for VS Code REST Client:

- Install the REST Client extension in VS Code.

- Copy api_tests.http.sample to api_tests.http.

- Update the @baseUrl variable with your local or server URL.

- Open the file and click "Send Request" above any method.

### ⚙️ Installation
Clone the repository:

```bash
git clone https://github.com/Deorgss/inventory_management_system.git
```

Install dependencies:

```bash
composer install
```

- Set up your .env file (see .env.example).

- Import the database schema from database.sql
