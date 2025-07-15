# Order Management Modular API (Laravel 12)


## 🚀 Features
- Modular structure: each domain (Order, Product, Customer, SpecialDay) is a self-contained module under `app/Modules`.
- DTOs for request validation and data transfer.
- Actions encapsulate business logic, injected into controllers.
- Repository pattern for data access abstraction.
- Discount strategy pattern: all discounts calculated independently on original subtotal and aggregated.
- Strict typing and modern PHP 8.1+ features throughout.
- Factories, migrations, and seeders for all modules.
- PHPUnit Feature and Unit tests.

---

## ⚡️ Quick Start

1. **Clone & Install**
   ```bash
   git clone https://github.com/KalimeroMK/OrderManagementAPI
   cp .env.example .env
   # (Optional) Adjust .env if needed for Docker
   docker compose up -d --build
   docker compose exec app_module composer install
   docker compose exec app_module php artisan key:generate
   docker compose exec app_module php artisan migrate --seed
   ```

2. **Run Tests**
   ```bash
   docker compose exec app_module php artisan test
   ```

---

## 🛣️ API Routes

All routes use the `/api/v1/` prefix.

### Products
- `GET    /api/v1/products`         — List products
- `POST   /api/v1/products`         — Create product
- `GET    /api/v1/products/{id}`    — Show product
- `PUT    /api/v1/products/{id}`    — Update product
- `DELETE /api/v1/products/{id}`    — Delete product

### Customers
- `GET    /api/v1/customers`
- `POST   /api/v1/customers`
- `GET    /api/v1/customers/{id}`
- `PUT    /api/v1/customers/{id}`
- `DELETE /api/v1/customers/{id}`

### Special Days
- `GET    /api/v1/special_days`
- `POST   /api/v1/special_days`
- `GET    /api/v1/special_days/{id}`
- `PUT    /api/v1/special_days/{id}`
- `DELETE /api/v1/special_days/{id}`

### Orders
- `GET    /api/v1/orders`
- `POST   /api/v1/orders`
- `GET    /api/v1/orders/{id}`
- `PUT    /api/v1/orders/{id}`
- `DELETE /api/v1/orders/{id}`
- `GET    /api/v1/orders/{id}/details` — Get order with discount breakdown

---

## 🏗️ Architecture

- **DTOs:** Used for request validation and data transfer between layers.
- **Actions:** Encapsulate business logic, used by controllers.
- **Discount Rules:** Strategy pattern, all rules applied independently on subtotal.
- **Repository Pattern:** Interface-to-Eloquent binding for data access.
- **Strict Types:** All PHP files declare strict types for safety.

---

## 🧪 Testing
- Run `php artisan test` for the full suite.
- Factories and seeders ensure valid, unique data.
- Tests assert correct HTTP status codes and JSON payloads.

---

## ℹ️ Notes
- No authentication enforced by default.
- RESTful conventions for all endpoints.
- No Blade/web routes; API only.

---

## 📄 Senior PHP Backend Task Compliance
- Modular structure, DTOs, Actions, and discount logic implemented as per requirements.
- All routes and behaviors covered by tests.
- Codebase is ready for review, extension, or deployment.

---

For more details, see code comments and module directories.
