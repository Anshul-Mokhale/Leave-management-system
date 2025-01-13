# Leave Management System

## Project Overview
The Leave Management System is a web-based application designed to manage employee leave requests efficiently. It allows employees to apply for leave, and managers to approve or reject leave requests. The system also keeps track of leave balances and generates reports.

## Features
- Employee leave application
- Manager leave approval/rejection
- Leave balance tracking
- Leave history and reports

## Installation

### Prerequisites
- PHP 7.3 or higher
- Composer
- MySQL
- Node.js
- npm (Node Package Manager)

### Steps
1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/leave_management.git
    ```
2. Navigate to the project directory:
    ```sh
    cd leave_management
    ```
3. Install the PHP dependencies:
    ```sh
    composer install
    ```
4. Install the Node.js dependencies:
    ```sh
    npm install
    ```
5. Set up the environment variables. Copy the `.env.example` file to `.env` and update the following:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

## Running the Application
1. Create the database tables:
    ```sh
    php artisan migrate
    ```
2. Start the development server:
    ```sh
    php artisan serve
    ```
3. Open your browser and navigate to `http://localhost:8000`.

## Contributing
Contributions are welcome! Please fork the repository and create a pull request with your changes.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact
For any questions or suggestions, please contact [yourname@yourdomain.com](mailto:yourname@yourdomain.com).