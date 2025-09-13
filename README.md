# Cabal Online Website Template

A clean and modern PHP-based website template designed fo Cabal Online.

## Features

- **Clean PHP Architecture** - No heavy frameworks, just pure PHP with organized structure
- **User Authentication** - Login/register system with session management
- **Dynamic Routing** - Clean URLs with PHP router system
- **Modular Components** - Reusable header, footer, and modal components
- **Player Rankings** - Display top players and guilds
- **News System** - Manage and display game news and updates
- **Download Page** - Game client download with system requirements
- **User Cabinet** - Personal account management for players

## Project Structure

```
/
├── index.php                 # Main entry point
├── css/
│   └── styles.css           # All styling with BEM methodology
├── js/
│   └── main.js             # JavaScript functionality
├── components/
│   ├── header.php          # Site navigation and user menu
│   ├── footer.php          # Site footer with social links
│   └── modals.php          # Login/register modal windows
├── controllers/
│   ├── BaseController.php   # Base class for all controllers
│   ├── HomeController.php   # Home page logic
│   ├── NewsController.php   # News display logic
│   ├── RatingController.php # Player rankings logic
│   ├── DownloadController.php # Download page logic
│   ├── RulesController.php  # Server rules logic
│   └── CabinetController.php # User account logic
├── pages/
│   ├── home.php            # Home page template
│   ├── news.php            # News page template
│   ├── rating.php          # Rankings page template
│   ├── download.php        # Download page template
│   ├── rules.php           # Rules page template
│   └── cabinet.php         # User cabinet template
├── includes/
│   ├── router.php          # URL routing system
│   └── auth.php            # Authentication handler
├── config/
│   └── routes.php          # Route definitions
└── data/
    ├── stats.php           # Server statistics
    ├── news.php            # News articles data
    └── rating.php          # Player/guild rankings
```

## How to Add New Pages

Adding a new page requires 4 simple steps:

### 1. Create the Controller

Create a new file in `controllers/` folder:

```php
<?php
/**
 * Example Page Controller - Description of what this page does
 */

require_once __DIR__ . '/BaseController.php';

class ExampleController extends BaseController {
    
    public function index() {
        // Load any data you need
        $data = $this->loadData('example');
        
        // Render the page template
        $this->render('example', [
            'data' => $data
        ]);
    }
}
```

### 2. Create the Page Template

Create a new file in `pages/` folder:

```php
<?php
/**
 * Example Page - Description of what this page shows
 */
?>

<div class="section-header">
    <h2>Page Title</h2>
    <p>Page description</p>
</div>

<div class="card">
    <!-- Your page content here -->
</div>
```

### 3. Add Route Configuration

Edit `config/routes.php` and add your new route:

```php
'example' => [
    'controller' => 'ExampleController',
    'title' => 'Example Page',
    'nav_name' => 'Example'
],
```

### 4. Create Data File (Optional)

If your page needs data, create `data/example.php`:

```php
<?php
/**
 * Example Page Data
 */

return [
    'items' => [
        // Your data here
    ]
];
```

## File Purposes

**Core Files:**
- `index.php` - Main entry point that handles all requests
- `includes/router.php` - Routes URLs to appropriate controllers
- `includes/auth.php` - Handles login/logout functionality

**Controllers:**
- Handle page logic and data processing
- Extend BaseController for common functionality
- Load data and render page templates

**Pages:**
- HTML templates for each page
- Receive data from controllers
- Use PHP for dynamic content

**Components:**
- Reusable pieces like header, footer, modals
- Included in main layout via index.php

**Data Files:**
- Static data arrays (easily replaceable with database)
- Return PHP arrays with structured data
- Perfect for prototyping before database integration

## Customization

**Styling:**
All styles are in `css/styles.css` using BEM methodology. The CSS is organized in clear sections with comments.

**Colors and Theme:**
CSS variables are used for easy theme customization. Edit the `:root` section in `styles.css`.

**JavaScript:**
Minimal JavaScript in `js/main.js` handles modals, forms, and basic interactions.

## Authentication

The template includes a simple session-based authentication system:
- Login/register forms in modals
- Session management in `includes/auth.php`
- User state available in all pages
- Cabinet page for logged-in users

## Database Integration

Currently uses PHP arrays in `data/` folder. To integrate with a database:
1. Replace data files with database queries
2. Modify controllers to use database connections
3. Update BaseController's `loadData()` method

## Requirements

- PHP 7.2.18 or higher
- Web server (Apache/Nginx/Xampp)
- No database required (file-based)

## Installation

1. Upload files to your web server
2. Ensure PHP is enabled
3. Access the website through your domain
4. Customize content in `data/` files

## License

This is a template project. Feel free to use and modify for your own projects.

# WARNING: USE SQL PROCEDURE FOR GET AND SEND DATA
