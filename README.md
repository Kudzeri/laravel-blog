
# Edica Blog

## Project Overview
Edica is a blogging platform that allows administrators to create posts with multiple tags and categories. Users can engage with the content by liking posts and leaving comments. It includes an admin panel for managing posts, categories, and tags. The platform also features email verification for user accounts.

## Features
- User registration and login with email verification
- Admin panel for managing posts, categories, and tags
- Users can leave comments and add/remove likes on posts
- Posts can be categorized and tagged with multiple tags
- User profile management with options to edit profile, view personal posts, comments, and favorite posts
- Posts are written by administrators

## Technologies
- Laravel 10
- PHP 8
- Laravel Authentication with email verification
- Blade templates for the front end
- Admin panel for post management
- User interaction: comments and likes

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/yourusername/edica-blog.git
   cd edica-blog
   ```

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Set up environment variables:**

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

   Update the necessary variables such as database connection details and mail settings in your `.env` file:

   ```env
   MAIL_MAILER=smtp
   MAIL_HOST=your_mail_host
   MAIL_PORT=your_mail_port
   MAIL_USERNAME=your_mail_username
   MAIL_PASSWORD=your_mail_password
   MAIL_ENCRYPTION=your_mail_encryption
   MAIL_FROM_ADDRESS="no-reply@edica.com"
   MAIL_FROM_NAME="Edica Blog"
   ```

4. **Generate an application key:**

   ```bash
   php artisan key:generate
   ```

5. **Run the database migrations and seed the database:**

   ```bash
   php artisan migrate --seed
   ```

6. **Start the local development server:**

   ```bash
   php artisan serve
   ```

## API Routes

### Authentication
- `POST /register` - Register a new user
- `POST /login` - Log in a user
- `POST /logout` - Log out a user
- `POST /email/verification-notification` - Resend email verification link
- `GET /email/verify/{id}/{hash}` - Verify email

### Posts
- `GET /` - List all posts
- `GET /posts/{post}` - Show a single post
- `POST /posts/{post}/like` - Like a post
- `DELETE /posts/{post}/unlike` - Unlike a post
- `POST /posts/{post}/comments` - Add a comment to a post
- `DELETE /posts/{post}/comments/delete` - Delete a comment

### Categories
- `GET /categories` - List all categories
- `GET /categories/{category}` - Show posts under a category

### Admin Panel (Admin only)
- `GET /admin` - Admin dashboard
- `POST /admin/posts` - Create, edit, and manage posts
- `POST /admin/categories` - Create, edit, and manage categories
- `POST /admin/tags` - Create, edit, and manage tags

## Running Tests
To run tests, use the following command:

```bash
php artisan test
```

## Admin Panel
The admin panel can be accessed by users with the 'admin' role. Administrators can create and manage posts, categories, and tags via the following routes:

- `/admin/posts` - Manage posts
- `/admin/categories` - Manage categories
- `/admin/tags` - Manage tags

## License
This project is open-source and available under the [MIT License](LICENSE).
