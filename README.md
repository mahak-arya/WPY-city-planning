## NOTE:
All dynamic variables passed in GET request comprising of two or more words are separated by "-" instead of " ". Ex: Cass Avenue must be passed as cass-avenue.
auth is an authentication variable. A user can see the api results only when auth = 1.

## API Endpoints
API to fetch all people living in your city - http://127.0.0.1:8000/api/residents-by-city/{city-name}/{auth}
API to fetch all cars when providing a particular street name - http://127.0.0.1:8000/api/cars-by-street/{street-name}/{auth}
API to fetch the owner(s) of a vehicle when providing a license plate - http://127.0.0.1:8000/api/owner-by-car/{license-number}/{auth}
API to fetch the full address and street of a house when providing a person's name - http://127.0.0.1:8000/api/address-by-name/{name}/{auth}

## How to run
1. On the terminal, execute command: *php artisan serve*.
2. Hit the api endpoint.
