# Laravel Blog
A RESTful API service built on Laravel for managing posts, comments, and user authentication.

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


## About

This project aims to provide a robust RESTful API service using the Laravel framework. The primary purpose is to facilitate the management of posts and comments, along with user authentication functionalities. By leveraging Laravel's features, such as routing, controllers, and middleware, the project aims to offer a secure and efficient API for developers to integrate into their applications. The goal is to streamline the process of creating, retrieving, updating, and deleting posts and comments, while also ensuring secure user authentication and authorization.


### Getting Started

### Step 1: Install Required Software

Before you begin, ensure that you have the necessary software installed on your machine. You’ll need:

- PHP
- Composer
- Git

### Step 2: Clone the GitHub Repository

### Step 3: Navigate to the Project Directory

Move into the project directory using the `cd` command:

```
cd repository
```

Replace `repository` with the actual name of the cloned repository.

### Step 4: Install Dependencies

Run the following command to install the project dependencies using Composer:

```
composer install
```

This command will download and install all the required packages specified in the `composer.json` file.

### Step 5: Create a Copy of the Environment File

Duplicate the `.env.example` file and save it as `.env`:

```
cp .env.example .env
```

Open the `.env` file and configure the database connection and any other necessary settings.

### Step 6: Generate Application Key

Generate the application key using the following command:

```
php artisan key:generate
```

This key is used for encrypting user sessions and other sensitive data.

### Step 7: Run Migrations

Execute the following command to run the database migrations:

```
php artisan migrate
```

This command will create the necessary database tables based on the migration files.

### Step 8: Serve the Application

To run the Laravel development server, use the following command:

```
php artisan serve
```

## Usage

To demonstrate the usage of this API service, a Flutter application has been developed as a note-taking app. This Flutter app seamlessly integrates with the provided Laravel-based API endpoints to offer users the ability to create, read, update, and delete notes. Additionally, users can add comments to individual notes, providing a collaborative environment for note management. The Flutter app showcases the versatility and ease of integration with the API service, providing a real-world example of how developers can leverage the Laravel back-end to power their mobile applications. Explore the codebase of the Flutter app to see how it communicates with the Laravel API and handles various API requests and responses.

link project: 
```
https://github.com/arminmehraeen/NoteBin
```
## Routes

### Authentication

#### Registration and Login

- **POST /register:** Endpoint for user registration.
- **POST /login:** Endpoint for user login.

### Authenticated Routes

#### User Management

- **GET /user:** Fetches the authenticated user's information.
- **POST /logout:** Logs out the authenticated user.

#### File Upload

- **POST /upload:** Endpoint for uploading files. Requires authentication.

#### Resourceful Routes

##### Posts

- **GET /posts:** Lists all posts.
- **POST /posts:** Creates a new post.
- **GET /posts/{post}:** Fetches a specific post.
- **PUT /posts/{post}:** Updates a specific post.
- **DELETE /posts/{post}:** Deletes a specific post.

##### Comments

- **GET /comments:** Lists all comments.
- **POST /comments:** Creates a new comment.
- **GET /comments/{comment}:** Fetches a specific comment.
- **PUT /comments/{comment}:** Updates a specific comment.
- **DELETE /comments/{comment}:** Deletes a specific comment.

## Middleware

- **auth:sanctum:** Middleware that ensures routes are accessible only to authenticated users.

## Controllers

- `LoginRegisterController`: Handles registration, login, fetching user information, and logout.
- `UploadController`: Handles file uploads.
- `PostController`: Manages CRUD operations for posts.
- `CommentController`: Manages CRUD operations for comments.

## Licensed

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
