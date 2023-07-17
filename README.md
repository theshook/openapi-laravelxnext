# OpenAPI Generator

Leveraging OpenAPI to leverage the documentation and call the function instead of the URL. This also includes the format of the body, parameters, and return types for each endpoint.

## Installation

Use the package manager [node](https://nodejs.org/en) to install [client-next](https://nextjs.org/).

```bash
cd client-next


npm install
# or 
yarn install
```

Use the dependency manager [composer](https://getcomposer.org/) for [api](https://laravel.com/)
```bash
cd api

cp .env.example .env

composer install

php artisan key:gen
```

## Usage

To generate the services from the backend. Run the command inside of `client-next` folder

```bash
openapi-generator-cli generate -i http://localhost:8000/docs/api-docs.json -g typescript-fetch -o ./src/api
```

1. `http://localhost:8000/docs/api-docs.json`: sets the URL of openAPI.
2. `typescript-fetch`: generate the docs using typescript fetch. Can be Axios or javascript-fetch.
3. `./src/api`: sets the path and store the generated files.

## License

[MIT](https://choosealicense.com/licenses/mit/)
