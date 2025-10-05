# QXIT Requirements

- **Laravel Version:** 12
- **PHP Version:** 8.3  
- **MySQL Version:** 8  
- **Database Name:** `qxitinterviewdb`  
- **Admin User:** Seeded user with  
  - Email: `qxit@quantumx.com`  
  - Password: `interview@qxit`  

### Case Study
- Project to manage companies and their employees.

### Functionality
- Basic Laravel Auth: ability to log in as administrator (registration disabled)  
- CRUD for Companies and Employees using Laravel resource controllers (`index`, `create`, `store`, `edit`, `update`, `destroy`)  
- Companies table fields:  
  - Name (required)  
  - Email  
  - Logo (minimum 100x100)  
  - Website  
- Employees table fields:  
  - First Name (required)  
  - Last Name (required)  
  - Company (foreign key to Companies)  
  - Email  
  - Phone  
- Logos stored in `storage/app/public` and accessible publicly  
- Use Laravel validation with Request classes  
- Pagination: 10 entries per page  
- Use database migrations to create the schemas  
- Use Laravel starter kit for auth and basic theme, but remove registration  
  - Starter Kit Link: [https://laravel.com/docs/11.x/starter-kits](https://laravel.com/docs/11.x/starter-kits)

## Tech Stack
- Backend: PHP, Laravel 11  
- Frontend: Blade, Bootstrap  
- Database: MySQL 8  

## Installation

1. Clone the repository:
```bash
git clone [repository-url]
cd [project-folder]

2. to seed
type in terminal 

php artisan migrate:fresh --seed
