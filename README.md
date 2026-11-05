# 💫 About Me:
I'm work as call center agent at NBE<br>I'm looking for work as a backend web developer<br>I studied PHP, database and Restful APIs<br>I have basics of html, css and js<br>I now learning laravel framwork


## 🌐 Socials:
[![Facebook](https://img.shields.io/badge/Facebook-%231877F2.svg?logo=Facebook&logoColor=white)](https://facebook.com/@moustafa.salah4) [![LinkedIn](https://img.shields.io/badge/LinkedIn-%230077B5.svg?logo=linkedin&logoColor=white)](https://linkedin.com/in/linkedin.com/in/mostafa-salah-48366b297) [![X](https://img.shields.io/badge/X-black.svg?logo=X&logoColor=white)](https://x.com/@Mostafasalem24) 

# 💻 Tech Stack:
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![WordPress](https://img.shields.io/badge/WordPress-%23117AC9.svg?style=for-the-badge&logo=WordPress&logoColor=white) ![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white) ![Git](https://img.shields.io/badge/git-%23F05033.svg?style=for-the-badge&logo=git&logoColor=white) ![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white) ![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)
# 📊 GitHub Stats:
![](https://github-readme-stats.shion.dev/api?username=MostafaSalah19&theme=dark&hide_border=false&include_all_commits=true&count_private=true)<br/>
![](https://streak-stats.demolab.com/?user=MostafaSalah19&theme=dark&hide_border=false)<br/>
![](https://github-readme-stats.shion.dev/api/top-langs/?username=MostafaSalah19&theme=dark&hide_border=false&include_all_commits=true&count_private=true&layout=compact)

## 🏆 GitHub Trophies
![](https://github-profile-trophy.vercel.app/?username=MostafaSalah19&theme=radical&no-frame=false&no-bg=true&margin-w=4)

### ✍️ Random Dev Quote
![](https://quotes-github-readme.vercel.app/api?type=horizontal&theme=radical)

### 🔝 Top Contributed Repo
![](https://github-contributor-stats.vercel.app/api?username=MostafaSalah19&limit=5&theme=dark&combine_all_yearly_contributions=true)

---
[![](https://komarev.com/ghpvc/?username=MostafaSalah19&icon=0&color=0)](https://visitcount.itsvg.in)

<!-- Proudly created with GPRM ( https://gprm.itsvg.in ) -->

# Expense Tracker

A small Laravel application for tracking personal income and expenses. Every user sees and manages **only their own** transactions, through a Blade web interface and a token-authenticated JSON API.

## Features

- Register, log in, and manage a profile (Laravel Breeze)
- Dashboard with income, expense, and balance totals (all time or this month) and your latest transactions
- Create, view, edit, and delete transactions (amount, category, income/expense type, date)
- Amounts stored as exact decimals with two decimal places (`decimal(12,2)`)
- User-scoped data: another user's transaction behaves exactly like one that does not exist (404)
- JSON API secured with Laravel Sanctum personal access tokens
- Feature tests written with Pest

## Tech stack

- PHP 8.5.11, Laravel 13
- MySQL
- Blade, Tailwind CSS, Alpine.js, Vite (via Laravel Breeze)
- Laravel Sanctum (API tokens)
- Pest (tests)

## Requirements

- PHP 8.5.11 or newer and Composer
- Node.js and npm
- MySQL (create an empty database first)

## Getting started

```bash
git clone https://github.com/MostafaSalah19/expense-tracker-app.git
cd expense-tracker-app

composer install
cp .env.example .env
php artisan key:generate
```

Open `.env` and point it at your MySQL database:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=expense-tracker-app
DB_USERNAME=root
DB_PASSWORD=
```

Then create the tables and build the front end:

```bash
php artisan migrate
npm install
npm run build
```

Run the app (two terminals while developing):

```bash
php artisan serve   # http://localhost:8000
npm run dev         # Vite dev server with hot reload
```

Register an account at `/register`, then open `/dashboard` or `/transactions`.

## Data model

`transactions`

| Column | Type | Notes |
|---|---|---|
| `id` | bigint | primary key |
| `user_id` | bigint | owner, foreign key to `users`, cascades on delete |
| `amount` | decimal(12,2) | returned as a string such as `"1500.00"` |
| `category` | string(255) | free text |
| `type` | enum | `income` or `expense` |
| `date` | date | the day it happened (`YYYY-MM-DD`); defaults to today when omitted |
| `created_at`, `updated_at` | timestamps | |

`user_id` is never accepted from a request. It is always taken from the authenticated user.

## Validation

| Field | Rules |
|---|---|
| `amount` | required, at most 2 decimal places, between `0.01` and `9999999999.99` |
| `category` | required, string, up to 255 characters |
| `type` | required, `income` or `expense` |
| `date` | optional when creating (defaults to today), format `YYYY-MM-DD`; when updating it may be left out, but not blank |

## Web routes

All transaction pages require login.

| Method | URI | Action |
|---|---|---|
| GET | `/dashboard` | totals for income, expenses, and balance (`?period=month` for the current month) and the 5 latest transactions |
| GET | `/transactions` | list your transactions (10 per page, newest first) |
| GET | `/transactions/create` | new transaction form |
| POST | `/transactions` | create |
| GET | `/transactions/{id}` | show |
| GET | `/transactions/{id}/edit` | edit form |
| PUT | `/transactions/{id}` | update |
| DELETE | `/transactions/{id}` | delete |

Login, registration, password reset, email verification, and profile routes come from Laravel Breeze.

## API

Base path: `/api`. Always send `Accept: application/json`.

### Get a token

```bash
curl -X POST http://localhost:8000/api/sanctum/token \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{"email":"you@example.com","password":"your-password","device_name":"my-laptop"}'
```

The response body is the plain-text token. This endpoint is rate limited to 5 requests per minute. Send the token on every other request:

```
Authorization: Bearer <token>
```

### Endpoints

| Method | URI | Description |
|---|---|---|
| POST | `/api/sanctum/token` | exchange credentials for a token |
| GET | `/api/user` | the authenticated user |
| GET | `/api/transactions` | your transactions, paginated (15 per page), newest first |
| POST | `/api/transactions` | create a transaction (`201 Created`) |
| GET | `/api/transactions/{id}` | show one transaction |
| PUT / PATCH | `/api/transactions/{id}` | update (send `amount`, `category`, and `type`; `date` is optional) |
| DELETE | `/api/transactions/{id}` | delete (`204 No Content`) |

### Example

```bash
curl -X POST http://localhost:8000/api/transactions \
  -H "Accept: application/json" \
  -H "Authorization: Bearer <token>" \
  -H "Content-Type: application/json" \
  -d '{"amount":"1500.00","category":"Groceries","type":"expense"}'
```

```json
{
  "data": {
    "id": 1,
    "amount": "1500.00",
    "category": "Groceries",
    "type": "expense",
    "date": "2026-10-14"
  }
}
```

### Errors

| Status | Meaning |
|---|---|
| 401 | missing or invalid token |
| 404 | transaction does not exist, or belongs to another user |
| 422 | validation failed; the body lists the failing fields |

## Testing

```bash
php artisan test
```

The suite uses Pest and covers transaction creation, validation, per-user access control, decimal amounts, and the API (authentication, responses, and token issuing). Confirm in `phpunit.xml` that tests use a separate database (SQLite in memory is the Laravel default) so your development data is never touched.

## Project structure

```
app/Http/Controllers/DashboardController.php         dashboard totals
app/Http/Controllers/TransactionController.php       web controller
app/Http/Controllers/Api/TransactionController.php   API controller
app/Http/Requests/                                   Store/Update validation
app/Http/Resources/TransactionResource.php           API response shape
app/Models/Transaction.php, User.php
database/migrations/                                 schema
resources/views/transactions/                        Blade views
routes/web.php, routes/api.php
tests/Feature/                                       Pest tests
```

## Ideas for next steps

- Charts and per-category breakdowns on the dashboard
- Filter and search by category, type, and date range
- Reusable categories instead of free text
