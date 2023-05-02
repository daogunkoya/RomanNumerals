
# Roman Numeral Converter
This is a simple web application that allows users to convert integers to Roman numerals and vice versa.


## Requirements
To run this application, you must have the following installed:

PHP 7.4 or higher
MySQL or another compatible database management system
Composer


# Installation

1. Clone the repository to your local machine using Git:

git clone https://github.com/your-username/roman-numeral-converter.git


2. Navigate to the project directory:

cd roman-numeral-converter


3.Install the application dependencies using Composer:
composer install


4. Create a new database for the application.

5. Create a .env file in the project root directory by copying the .env.example file and updating the database connection details:

cp .env.example .env


6. Generate a new application key:
php artisan key:generate


7. Run the database migrations:
php artisan db:seed


8. (Optional) Seed the database with some sample data:
(Optional) Seed the database with some sample data:

9. Start the application:
php artisan serve


10. Access the application in your web browser by visiting http://localhost:8000.


## Usage

To convert an integer to a Roman numeral, enter the integer in the input field and click the "Convert" button.

To convert a Roman numeral to an integer, enter the Roman numeral in the input field and click the "Convert" button.

To view the 10 most recent conversions, click the "Recent Conversions" link in the navigation menu.

To view the 10 most frequently converted Roman numerals, click the "Top Conversions" link in the navigation menu.




# Routes

The application exposes the following routes:

POST /api/roman-numerals
Converts an integer to its Roman numeral equivalent and saves it to the database.

### Request Body

{
    "integer": 123
}



### Response

## License

This project is licensed under the MIT License. See the LICENSE file for details.
{
    "integer": 123,
    "roman_numeral": "CXXIII"
}



### GET /api/recent-conversions

Returns a list of the most recent Roman numeral conversions, sorted by date in descending order.

Query Parameters
count: (optional) the number of conversions to return (default: 10)
Response


[    {        "integer_value": 123,        "roman_numeral": "CXXIII",        "created_at": "2023-05-03T10:00:00.000000Z",        "updated_at": "2023-05-03T10:00:00.000000Z"    },    {        "integer_value": 456,        "roman_numeral": "CDLVI",        "created_at": "2023-05-02T10:00:00.000000Z",        "updated_at": "2023-05-02T10:00:00.000000Z"    }]


### GET /api/top-conversions

Returns a list of the top Roman numeral conversions, sorted by frequency in descending order.

Query Parameters
count: (optional) the number of conversions to return (default: 10)
Response

[    {        "integer_value": 100,        "roman_numeral": "C",        "count": 2,        "created_at": "2023-05-03T10:00:00.000000Z",        "updated_at": "2023-05-03T10:00:00.000000Z"    },    {        "integer_value": 123,        "roman_numeral": "CXXIII",        "count": 1,        "created_at": "2023-05-02T10:00:00.000000Z",        "updated_at": "2023-05-02T10:00:00.000000Z"    }]




