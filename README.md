# Reptile Bio

**An open-source reptile species database — community-maintained taxonomy, conservation education, and freely licensed data.**

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

---

## Mission

Reptile Bio is a permanent, community-maintained record of reptile species, subspecies, taxonomy, photographs, and natural history. Every data point is released under open licenses — freely available to researchers, educators, conservationists, and enthusiasts worldwide.

Full revision history ensures taxonomic changes are traceable and attributable. Data stewardship is at the heart of everything we do.

## Stack

- **PHP 8.3** / **Laravel 11**
- **PostgreSQL 16**
- **Tailwind CSS 3** + **Alpine.js**
- **Vite** for asset bundling
- **Pest** for testing

## Requirements

- PHP 8.3+
- PostgreSQL 16+
- Node.js 20+
- Composer

## Local Setup

```bash
git clone git@github.com:defenestrator/reptile.bio.git
cd reptile.bio

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Create a PostgreSQL database:

```sql
CREATE DATABASE reptile_bio;
```

Configure `.env`:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=reptile_bio
DB_USERNAME=your_user
DB_PASSWORD=
```

Run migrations and seed default roles:

```bash
php artisan migrate
php artisan db:seed
```

Build assets and start the dev server:

```bash
npm run dev
php artisan serve
# or use Laravel Herd / Valet
```

## Testing

Create a test database:

```sql
CREATE DATABASE reptile_bio_test;
```

```bash
php artisan test
```

## Roles

| Role | Permissions |
|------|-------------|
| `contributor` | Submit species edits and photos for review |
| `moderator` | Approve/reject submissions, manage species data |
| `admin` | Full access including user and role management |

Roles are hierarchical: admin implies moderator, moderator implies contributor.

## Contributing

1. Fork the repository
2. Create a feature branch
3. Write tests for new functionality
4. Submit a pull request

Species data corrections, taxonomy updates, photographs (CC BY or CC0), and translations are all welcome.

## License

MIT — see [LICENSE](LICENSE).

Species data and photographs are released under [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/) unless otherwise noted.

---

## Changelog

### 2026-05-07
- Initial release: species database, many-to-many roles system, conservation mission homepage, Breeze auth with dark mode
