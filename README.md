# Laravel + Inertia.js + Vue 3 — Contacts CRUD

## ✅ Goal

-   Backend: All tests pass with **Laravel 11**.
-   Frontend: Contacts CRUD with **Inertia.js**, **Vue 3**, **TailwindCSS**.
-   Database: Local SQLite.

---

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

3. **Copy `.env`**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Create the SQLite database**

    ```bash
    touch database/database.sqlite
    chmod 666 database/database.sqlite
    ```

    > ⚠️ **Permission:** The SQLite file **must be writable**.
    > If you see `readonly database` → run:
    >
    > ```bash
    > chmod 666 database/database.sqlite
    > ```
    >
    > Or just run:

    ```bash
    ./permissions.sh
    ```

5. **Run migrations**

    ```bash
    php artisan migrate
    ```

6. **Install and build frontend**

    ```bash
    npm install
    npm run build
    ```

7. **Start Docker**

    ```bash
    docker-compose up --build
    ```

    Then access: [http://localhost:8001](http://localhost:8001)

---

## 🧪 How to run tests

```bash
php artisan test
```

> ✔️ For CI/production:
>
> ```bash
> npm run build
> php artisan test
> ```

---

## 📌 Common issues

**Error:** `attempt to write a readonly database`
✅ Solution:

```bash
chmod 666 database/database.sqlite
```

If permission problems persist:

```bash
./permissions.sh
```

---

## 📚 Fix summary

-   Refactored `ContactController` to use **Inertia**.
-   Added `app.blade.php` as Inertia layout.
-   Tests switched to `assertInertia`.
-   Session driver uses SQLite.
-   Proper file permissions enforced to avoid `readonly` failures.

---

**Ready. 100% passing.**
