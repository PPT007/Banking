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
