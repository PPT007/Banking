# Banking System

## Overview

The Banking System project is a comprehensive solution built with PHP and Laravel, designed to manage user accounts, transactions, and fund transfers with support for multiple currencies. It includes features for user authentication, two-factor authentication (2FA), and account management.

## Features

- **User Registration & Authentication:**
  - Registration for new users with the first user being assigned admin privileges.
  - Secure login with Two-Factor Authentication (2FA) using Laravel Fortify.

- **Account Management:**
  - Admin functionality to create saving accounts with an initial balance of 10,000 USD.
  - Unique account number generation.
  - Listing, searching, and filtering user accounts.
  - Viewing detailed transaction history for each account.

- **Fund Transfers:**
  - Users can transfer funds between accounts.
  - Support for USD, GBP, and EUR with automatic currency conversion using the ExchangeRates API.

## Technologies

- **Backend:** PHP, Laravel
- **Frontend:** HTML, CSS, JavaScript
- **Database:** MySQL or compatible
- **APIs:** ExchangeRates API for currency conversion

## Installation

### Prerequisites

Ensure you have the following installed:

- PHP >= 7.4
- Composer
- MySQL or another supported database
- Node.js and npm

### Clone the Repository

```bash
git clone https://github.com/yourusername/banking-system.git
cd banking-system




Install Dependencies
Install PHP and JavaScript dependencies:

bash
Copy code
composer install
npm install
Environment Configuration
Copy the Example Environment File:

bash
Copy code
cp .env.example .env
Generate an Application Key:

bash
Copy code
php artisan key:generate
Configure Database and Other Environment Variables:

Edit the .env file to set up your database connection and other environment settings.

Database Setup
Run Migrations:

bash
Copy code
php artisan migrate
Seed the Database:

bash
Copy code
php artisan db:seed
Start the Development Server
bash
Copy code
php artisan serve
Open your browser and navigate to http://localhost:8000 to access the application.

Usage
Registration & Login
Registration: Register a new user. The first user will be given admin privileges.
Login: Log in using your credentials. Two-Factor Authentication (2FA) is required for secure access.
Account Management
Create Accounts: Admin can create saving accounts through the dashboard.
Manage Accounts: View and manage user accounts, including searching and filtering.
Fund Transfers
Transfer Funds: Initiate fund transfers between accounts. Select the currency for conversion if needed.
API Integration
The project uses the ExchangeRates API for currency conversion. Ensure to replace 'your_api_key_here' in the code with your actual API key.

Documentation
Laravel Documentation
ExchangeRates API Documentation
Contributing
Contributions are welcome! Please open an issue or submit a pull request to improve the project.

License
This project is licensed under the MIT License. See the LICENSE file for details.

Contact
For questions or feedback, please reach out to your.email@example.com.

markdown
Copy code

### Notes:
- **Update Placeholders:** Replace `https://github.com/yourusername/banking-system.git` and `'your_api_key_here'` with your actual GitHub repository URL and API key.
- **Include Additional Information:** If there are more specific setup instructions or usage guidelines, add them to the README.

Let me know if you need any more changes or additional sections!
