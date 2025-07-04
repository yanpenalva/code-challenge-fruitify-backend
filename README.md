# Laravel + Inertia.js + Vue 3 — Contacts CRUD

## ✅ Main Objectives

- Pass **all tests** with **Laravel 11**.
- Implement a **complete CRUD** for contacts using **Inertia.js**, **Vue 3**, and **TailwindCSS**.
- Use **SQLite** local database for easy setup.
- Implement **pagination** (10 per page).
- Handle **validation** and **error display** properly.
- Provide a **full Dockerized setup** for easy local run.

## 🚀 How to run the project

1. **Clone the repository**

     ```bash
    git clone https://github.com/yanpenalva/code-challenge-fruitify-backend
    ```

   Then navigate to the project directory:

    ```bash
    cd code-challenge-fruitify-backend
    ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Copy the `.env`**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Create the SQLite database**

   ```bash
   touch database/database.sqlite
   chmod 775 database/database.sqlite
   ```

   > ⚠️ **Permissions:** The SQLite file must be writable.
   > If you see `attempt to write a readonly database`:
   >
   > ```bash
   > chmod 775 database/database.sqlite
   > ```

5. **Run migrations**

   ```bash
   php artisan migrate
   ```

6. **Install frontend dependencies and build**

   ```bash
   npm install
   npm run build
   ```

7. **Run with Docker**

   Make sure you have **Docker** installed and running.

   ```bash
   docker compose up -d
   ```

   This will spin up the complete environment.
   Then access: [http://localhost:8001/contacts](http://localhost:8001/contacts)

## 🧪 How to run tests

```bash
php artisan test
```

## ✅ Routes available

- `GET /contacts` — List contacts (paginated)
- `POST /contacts` — Create contact
- `PUT /contacts/{contact}` — Update contact
- `DELETE /contacts/{contact}` — Delete contact

## 📌 Notes

- **Pagination** works 10 by 10 with page navigation.
- Validation errors are properly displayed on modals.
- CRUD flow tested end-to-end.

## 🧩 Decision Note

The project keeps **Laravel standards** and clean patterns for maintainability. No unnecessary layers were added since the scope is small, but I have full experience with:

- **DDD**
- **Clean Architecture**
- **Service/Repository patterns**
- **Actions**, **Event Listeners**, **Pipelines**
- **SOLID**, **DRY**, **KISS**

All main goals of the test were **100% accomplished**.

