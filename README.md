## Clone this repo

```bash
git clone git@github.com:UdyW/storelab_api.git
cd storelab_api
```

## Run Lumen API

```bash
make run_dev
```

### Details

Code for the application is in the `images\php\app` folder

To run the application make sure the correct db credentiols are in the `images\php\app\.env` file. It is already set to poinn to the mysql container stated with the above command.

Then run;

```sh
cd .images\php\app
php artisan migrate
```

The API requires JWT to authenticate API requests. to generate a JWT to be used in the Front end app run the following CURL; (password is hard coded to 1234 register user function is not implemented)

```sh
curl  -X POST \
  'http://localhost/auth/login' \
  --header 'Accept: */*' \
  --header 'User-Agent: Thunder Client (https://www.thunderclient.com)' \
  --form 'email="udy@1234.com"' \
  --form 'password="1234"'
```
