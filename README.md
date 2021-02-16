## NOTE:
All dynamic variables passed in GET request comprising of two or more words are separated by "-" instead of " ". Ex: Cass Avenue must be passed as cass-avenue.

## API Endpoints
API to fetch all people living in your city - http://127.0.0.1:8000/api/residentsByCity/{city-name}
API to fetch all cars when providing a particular street name - http://127.0.0.1:8000/api/carsByStreet/{street-name}
API to fetch the owner(s) of a vehicle when providing a license plate - http://127.0.0.1:8000/api/getOwnerByCar/{license-number}
API to fetch the full address and street of a house when providing a person's name - http://127.0.0.1:8000/api/getAddressByName/{name}

## How to run
1. On the terminal, execute command: *php artisan serve*.
2. Hit the api endpoint.
