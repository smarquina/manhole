<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Build manhole

This project is a simple hexagonal architecture API.

##  Steps to get project running 🛠

This project is Dockerized

1. Default environment parameters can be found and updated in `.env.example`

2. When running on the first time: to install containers and dependencies, run `make install-app`.

## Running project 🚀

Docker containers auto-starts in background whe the application is installed.
To serve the app, run `make run` and app containers will start. Application is served on port 80.
To stop containers and remove containers, networks, volumes, and images created, run `make down`


## Vulnerabilities & contributions

If you discover a security vulnerability, please send an e-mail to Sergio Martín via [sergyzen@gmail.com](mailto:sergyzen@gmail.com).
All security vulnerabilities will be promptly addressed.

## License

This software is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
