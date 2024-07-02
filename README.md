# Weather Display App

This is a simple web application that displays current weather information based on the user's IP address location.

## Features

- Automatically detects user's location based on IP address
- Displays current weather conditions including:
  - Temperature (°C and °F)
  - Weather condition (e.g., Sunny, Cloudy)
  - Wind speed and direction
  - Humidity
  - Last updated time
- Responsive design for both desktop and mobile devices
- Dark mode interface

## Technologies Used

- PHP 7.4+
- HTML5
- SASS/CSS3
- GuzzleHTTP for API requests
- WeatherAPI.com for weather data
- ipify API for IP address detection
- ipinfo.io for IP geolocation

## Setup

1. Clone this repository to your local machine or web server.

2. Install dependencies using Composer:
  ```
   composer install
  ```
   
4. Create two files in the root directory:
   - `api.txt`: Contains your WeatherAPI.com API key
   - `token.txt`: Contains your ipinfo.io API token

5. Ensure your web server is configured to run PHP files.

6. Compile SASS to CSS:
   - Make sure you have the ScssPhp library installed
   - Run the SASS compilation script:
```
php compile_sass.php
```
6. Access the `index.php` file through your web server.

## File Structure

- `index.php`: Main HTML and PHP script
- `sass/`: Directory containing SASS files
  - `index.module.scss`: Main SASS file
  - `_var.scss`: SASS variables
- `css/`: Directory for compiled CSS files
- `vendor/`: Composer dependencies
- `compile_sass.php`: Script to compile SASS to CSS

## Customization

You can customize the appearance by modifying the SASS files in the `sass/` directory. After making changes, recompile the SASS using the `compile_sass.php` script.

## License

[MIT License](https://opensource.org/licenses/MIT)

## Author

Cameron Emery

## Acknowledgements

- WeatherAPI.com for providing weather data
- ipify.org for IP address detection
- ipinfo.io for IP geolocation services
