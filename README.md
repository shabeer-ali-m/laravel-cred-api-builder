# Laravel CRED API Builder

Laravel CRED API Builder is a Laravel package that simplifies the process of creating APIs for basic CRUD (Create, Read, Update, Delete) operations. With a single command, it generates all the necessary files for CRED functionality, including:

- Controller File
- Request File
- Resource File
- Service File

## Features

- **Single Command API Generation**: Generate all required files with one simple command.
- **Model Optionality**: Specify a model name or let the package use the class name as the default model name.
- **RESTful Endpoints**: Automatically creates endpoints for common CRUD operations.
- **Pagination**: Includes Laravel's pagination for listing records.

### Endpoints Created

| Method   | Endpoint             | Description                                  |
|----------|----------------------|----------------------------------------------|
| `GET`    | `/api/<name>`        | Get a paginated list of all records.         |
| `POST`   | `/api/<name>`        | Create a new object in the database.         |
| `GET`    | `/api/<name>/<id>`   | Retrieve object details by ID.               |
| `PUT`    | `/api/<name>/<id>`   | Update an existing record by ID.             |
| `DELETE` | `/api/<name>/<id>`   | Delete a record by ID.                       |

## Installation

Follow these steps to install the Laravel CRED API Builder package:

1. **Require the package** via Composer:

   ```bash
   composer require laravel/laravel-cred-api-builder --dev
   ```

## Usage

Run the following Artisan command to generate the CRED API files:

```bash
php artisan make:cred-api <name> <model-name>
```

- **`<name>`**: The name of the API resource (e.g., `Post`).
- **`<model-name>` (optional)**: The name of the model to associate with the API. If not provided, the class name will be used as the model name.

### Example Command

```bash
php artisan make:cred-api Post PostModel
```

This will generate all required files for the `Post` API and use `PostModel` as the associated model.

### Generated Files

- **Controller**: Handles the business logic and API routes.
- **Request**: Validates incoming data for creating and updating records.
- **Resource**: Formats the API response data.
- **Service**: Encapsulates reusable business logic.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, feel free to open an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

