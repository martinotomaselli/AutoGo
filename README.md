# 🚗 AutoGo

Gestione autonoleggi **Laravel 10 / Vite** con:

* Autenticazione utenti (Laravel Breeze)
* CRUD Veicoli
* Prenotazioni con stato (`pending → paid`)
* Pagamento **Stripe Checkout**
* Chatbot demo (Python / Flask) incorporato via Blade
* UI responsive Bootstrap 5 + CSS custom

---

##  Requisiti

| Software | Versione consigliata |
|----------|----------------------|
| PHP      | ≥ 8.2                |
| Composer | ≥ 2.5               |
| Node.js  | ≥ 18 LTS             |
| npm/yarn | ≥ 9 / ≥ 1.22         |
| MySQL / MariaDB | qualsiasi compatibile con Laravel |
| Stripe account | modalità test attiva |

---
##  Installazione

```bash
git clone https://github.com/tuo-utente/autogo.git
cd autogo

# PHP + Laravel
cp .env.example .env           # configura DB & chiavi Stripe
composer install
php artisan key:generate
php artisan migrate --seed     # carica tabelle di esempio

# Front-end
npm install
npm run dev                    # o npm run build per prod

# Avvia server
php artisan serve
