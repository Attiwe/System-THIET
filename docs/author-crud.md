# Author CRUD System Documentation

## Overview

This document describes the complete CRUD (Create, Read, Update, Delete) system for managing authors in the application.

## Features

-   ✅ Create new authors
-   ✅ View all authors in a data table
-   ✅ Edit existing authors
-   ✅ Delete authors with confirmation
-   ✅ View individual author details
-   ✅ Form validation
-   ✅ Arabic language support
-   ✅ Responsive design
-   ✅ SweetAlert confirmation dialogs

## Database Structure

### Authors Table

```sql
CREATE TABLE authors (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Files Created

### 1. Model

-   `app/Models/Author.php` - Eloquent model with fillable fields

### 2. Controller

-   `app/Http/Controllers/Dashboard/AuthorController.php` - Handles all CRUD operations

### 3. Request Validation

-   `app/Http/Requests/dashboard/AuthorRequest.php` - Form validation rules

### 4. Views

-   `resources/views/pages/authors/index.blade.php` - Main listing page
-   `resources/views/pages/authors/_create.blade.php` - Create modal
-   `resources/views/pages/authors/_edit.blade.php` - Edit modal
-   `resources/views/pages/authors/_delete.blade.php` - Delete confirmation script
-   `resources/views/pages/authors/show.blade.php` - Individual author details

### 5. Routes

-   Added to `routes/web.php`:
    ```php
    Route::resource('authors', AuthorController::class)->names('authors');
    ```

### 6. Navigation

-   Added link to sidebar in `resources/views/layouts/main-sidebar.blade.php`

### 7. Database

-   Migration: `database/migrations/2025_10_07_041347_create_authors_table.php`
-   Seeder: `database/seeders/AuthorSeeder.php`
-   Factory: `database/factories/AuthorFactory.php`

### 8. Tests

-   Feature tests: `tests/Feature/AuthorTest.php`

## Usage

### Accessing the Authors Management

1. Navigate to the dashboard
2. Go to "اداره الموقع" (Site Management) section
3. Click on "المؤلفين" (Authors)

### Creating a New Author

1. Click the "إضافة مؤلف" (Add Author) button
2. Fill in the required fields:
    - **Name** (required): Author's name
    - **Description** (optional): Author's description
3. Click "حفظ المؤلف" (Save Author)

### Editing an Author

1. In the authors table, click the dropdown menu for the desired author
2. Click "تعديل" (Edit)
3. Modify the fields as needed
4. Click "تحديث المؤلف" (Update Author)

### Deleting an Author

1. In the authors table, click the dropdown menu for the desired author
2. Click "حذف" (Delete)
3. Confirm the deletion in the popup dialog

### Viewing Author Details

1. Click on an author's name in the table
2. This will show the detailed view with all author information

## Validation Rules

### Create/Update Validation

-   **name**: Required, string, maximum 255 characters
-   **description**: Optional, string, maximum 1000 characters

### Error Messages (Arabic)

-   Name is required: "اسم المؤلف مطلوب"
-   Name must be string: "اسم المؤلف يجب أن يكون نص"
-   Name too long: "اسم المؤلف يجب ألا يتجاوز 255 حرف"
-   Description must be string: "وصف المؤلف يجب أن يكون نص"
-   Description too long: "وصف المؤلف يجب ألا يتجاوز 1000 حرف"

## API Endpoints

| Method    | URL                  | Description         |
| --------- | -------------------- | ------------------- |
| GET       | `/authors`           | List all authors    |
| GET       | `/authors/create`    | Show create form    |
| POST      | `/authors`           | Store new author    |
| GET       | `/authors/{id}`      | Show author details |
| GET       | `/authors/{id}/edit` | Show edit form      |
| PUT/PATCH | `/authors/{id}`      | Update author       |
| DELETE    | `/authors/{id}`      | Delete author       |

## Sample Data

The system includes a seeder with 5 sample authors in Arabic:

-   أحمد محمد علي
-   فاطمة أحمد حسن
-   محمد سعد الدين
-   عائشة محمود
-   يوسف عبدالله

## Testing

Run the feature tests with:

```bash
php artisan test tests/Feature/AuthorTest.php
```

## Dependencies

-   Laravel Framework
-   Bootstrap 5
-   DataTables
-   SweetAlert2
-   Bootstrap Icons

## Browser Support

-   Modern browsers with JavaScript enabled
-   Responsive design for mobile and desktop
-   RTL (Right-to-Left) support for Arabic text
