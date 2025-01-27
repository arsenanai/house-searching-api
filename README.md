House Search API
================

A modern web application built with **Laravel**, **Vue.js**, **Vite**, and **Element Plus** to search and manage houses. This repository contains both the backend (Laravel) and frontend (Vue.js) code.

**Author:** [Arsenanai](https://github.com/arsenanai)

Table of Contents
-----------------

*   [Technologies](#technologies)
*   [Requirements](#requirements)
*   [Installation](#installation)
*   [Backend Setup (Laravel)](#backend-setup-laravel)
*   [Frontend Setup (Vue.js with Vite)](#frontend-setup-vuejs-with-vite)
*   [Running the Development Servers](#running-the-development-servers)
*   [Deployment](#deployment)

Technologies
------------

**Backend**: Laravel (latest version)  
**Frontend**: Vue.js (latest version) with Vite  
**UI Library**: Element Plus  
**Database**: MySQL/PostgreSQL (or your preferred DB)  
**Environment**: PHP, Node.js

Requirements
------------

Make sure the following software is installed on your system:

*   **PHP** (>=8.0)
*   **Composer**
*   **Node.js** (>=16.x)
*   **NPM** or **Yarn**
*   **MySQL** or **PostgreSQL** (or any other supported database)

Installation
------------

### Clone the repository

    git clone https://github.com/arsenanai/house-search-api.git
    cd house-search-api

### Backend Setup (Laravel)

1.  **Install Composer dependencies**  
    In the backend folder (Laravel), run the following command to install the required PHP dependencies:
    
        composer install
    
2.  **Set up environment variables**  
    Copy the \`.env.example\` file to \`.env\`:
    
        cp .env.example .env
    
3.  **Generate the application key**  
    Laravel requires an application key for encryption. Run the following command:
    
        php artisan key:generate
    
4.  **Configure Database Connection**  
    Open the \`.env\` file and update your database credentials. Example:
    
        
              DB_CONNECTION=mysql
              DB_HOST=127.0.0.1
              DB_PORT=3306
              DB_DATABASE=house_search_db
              DB_USERNAME=root
              DB_PASSWORD=
              
    
5.  **Run Database Migrations**  
    Run the following command to set up the database schema:
    
        php artisan migrate
    
6.  **(Optional) Seed Database**  
    If your project includes sample data, you can seed the database:
    
        php artisan db:seed
    
7.  **Start the Backend Server**  
    Run the following command to start the backend server:
    
        php artisan serve
    
    The backend server will run on `http://127.0.0.1:8000`.

### Frontend Setup (Vue.js with Vite)

1.  **Install Node.js dependencies**  
    Run the following commands prepare the front-end:
    
        npm install
    
2.  **Set up Vite configuration**  
    Ensure the \`vite.config.js\` file is correctly configured to match your backend API URL for local development.

### Running the Development Servers

#### Backend (Laravel)

1.  **Start the backend server**  
    In the root folder (where \`artisan\` is located), run:
    
        php artisan serve
    
    This will start the backend server on `http://127.0.0.1:8000`.

#### Frontend (Vue.js with Vite)

1.  **Start the frontend server**  
    In the \`frontend\` folder, run:
    
        npm run dev
    
    This will start the frontend server on `http://localhost:5173`.

Open your browser and go to [http://localhost:5173](http://localhost:5173). The application should be live and ready for use!

Deployment
----------

To deploy your application, follow these steps:

1.  **Build frontend assets**  
    Run the following command to build the frontend for production:
    
        npm run build
    
2.  **Deploy backend (Laravel)**  
    You can deploy the Laravel backend to any server that supports PHP (e.g., Laravel Forge, DigitalOcean, Heroku, etc.). Make sure to configure your production database and environment settings properly.

License
-------

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.