# byteland × Paymenter Theme

Тема для Paymenter в стиле byteland — тёмная, glassmorphism, шрифт Golos Text.

## Установка

```bash
# 1. Скопировать папку темы
cp -r byteland /var/www/Paymenter/themes/

# 2. Скопировать vite.config.js в корень Paymenter (ЗАМЕНЯЕТ существующий)
cp byteland/vite.config.js /var/www/Paymenter/vite.config.js

# 3. Установить зависимости и собрать
cd /var/www/Paymenter
npm install
npm run build

# 4. В .env или в админке Paymenter — установить тему
# APP_THEME=byteland
# Или: Admin → Settings → Theme → byteland
```

## Структура файлов

```
byteland/
├── theme.php                          # Конфиг темы
├── vite.config.js                     # Сборщик (замените в корне)
├── css/app.css                        # Стили (Tailwind + byteland)
├── js/app.js                          # JS (минимальный)
└── views/
    ├── layouts/
    │   ├── app.blade.php              # Главный лейаут
    │   └── colors.blade.php           # Цветовые переменные
    ├── components/
    │   ├── logo.blade.php
    │   ├── notification.blade.php
    │   ├── dropdown.blade.php
    │   ├── navigation/
    │   │   ├── index.blade.php        # Топбар
    │   │   ├── sidebar.blade.php      # Сайдбар (desktop)
    │   │   ├── sidebar-links.blade.php
    │   │   ├── footer.blade.php
    │   │   ├── breadcrumb.blade.php
    │   │   └── link.blade.php
    │   ├── button/
    │   │   ├── primary.blade.php      # Синяя кнопка + shine
    │   │   ├── secondary.blade.php
    │   │   ├── danger.blade.php
    │   │   └── save.blade.php
    │   └── form/
    │       ├── input.blade.php
    │       ├── select.blade.php
    │       ├── checkbox.blade.php
    │       └── textarea.blade.php
    ├── home.blade.php                 # Витрина
    ├── dashboard.blade.php            # Дашборд
    ├── cart.blade.php                 # Корзина
    └── auth/
        ├── login.blade.php            # Вход
        └── register.blade.php         # Регистрация
```

## Ключевые дизайн-решения

- **Тёмная тема принудительно** — класс `dark` всегда на `<html>`
- **Glassmorphism** — `rgba(28,31,55,0.55)` + `backdrop-filter:blur(18px)` на всех карточках
- **Шрифт** — Golos Text (Google Fonts, загружается автоматически)
- **Цвет акцента** — `#0195f4` (byteland blue) → кнопки, ссылки, активные пункты
- **Кнопки** — shine-анимация на hover (как на byteland.ru)
- **Сайдбар** — glass, 256px, fixed, blur

## Что не включено (нужно брать из default темы)

Следующие компоненты оставь из дефолтной темы — они без изменений:
- `views/components/confirmation.blade.php`
- `views/components/impersonating.blade.php`
- `views/components/cart.blade.php`
- `views/components/currency-switch.blade.php`
- `views/components/form/configoption.blade.php`
- `views/components/form/properties.blade.php`
- `views/components/form/radio.blade.php`
- `views/components/form/toggle.blade.php`
- `views/components/form/setting.blade.php`
- `views/components/captcha/*.blade.php`
- `views/components/icons/*.blade.php`
- `views/client/**`                     ← страницы аккаунта
- `views/auth/2fa.blade.php`
- `views/auth/password/`
- `views/auth/verify-email.blade.php`
- `views/auth/logout.blade.php`

## Совет

Если что-то не работает — добавь недостающий файл из `/var/www/Paymenter/themes/default/views/`
в `/var/www/Paymenter/themes/byteland/views/` и тема автоматически его возьмёт.
