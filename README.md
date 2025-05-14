# Projekt: Doctrine ORM + databáze vozidel

Tento projekt slouží jako ukázka použití ORM knihovny **Doctrine** v PHP pro práci s databází vozidel (`vehicles`).

## 📦 Použité technologie

- PHP 8+
- Doctrine ORM
- MySQL / MariaDB
- Composer (pro správu závislostí)

---

## ⚙️ Instalace a spuštění

1. Naklonuj nebo rozbal projekt.
2. V terminálu spusť:
    ```bash
    composer install
    ```
3. Uprav přihlašovací údaje k databázi v souboru:
    `src/bootstrap.php`
4. Spusť PHP server:
    ```bash
    php -S localhost:8000 -t public
    ```
5. Otevři si prohlížeč na adrese:
    [http://localhost:8000](http://localhost:8000)

---

## 🗃️ Struktura databáze

Projekt pracuje s databází `vehicles`, která obsahuje 4 tabulky:

- `manufacturers`: výrobci vozidel
- `models`: modely vozidel
- `owners`: majitelé vozidel
- `cars`: samotná auta (napojená na modely i majitele)

SQL skript pro vytvoření DB je dostupný zde:  
https://github.com/kozakpetr1/SQL/tree/main/examples/vehicles

---

## 🔍 Funkce projektu

- Výpis všech modelů vozidel včetně názvu výrobce
- Filtrování modelů podle:
  - výrobce (`manufacturer_name`)
  - názvu modelu (`model_name`)
- Zobrazení majitelů modelů (pokud existuje vazba přes auta)

---

## 🧠 Autor & Účel

Projekt vznikl jako odpověď na úlohu pro pochopení základů ORM v PHP. Ukazuje propojení mezi tabulkami, práci s Doctrine a vykreslení jednoduché HTML stránky bez frameworku.

