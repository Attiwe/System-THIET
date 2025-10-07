# Publishing CRUD System Documentation

## Overview

This document describes the complete CRUD (Create, Read, Update, Delete) system for managing publishing houses (دور النشر) in the application.

## Features

-   ✅ Create new publishing houses
-   ✅ View all publishing houses in a data table
-   ✅ Edit existing publishing houses
-   ✅ Delete publishing houses with confirmation
-   ✅ View individual publishing house details
-   ✅ Form validation
-   ✅ Arabic language support
-   ✅ Responsive design
-   ✅ SweetAlert confirmation dialogs

## Database Structure

### Publishings Table

```sql
CREATE TABLE publishings (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    publishing_name VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    publishing_description VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Files Created

### 1. Model

-   `app/Models/Publishing.php` - Eloquent model with fillable fields

### 2. Controller

-   `app/Http/Controllers/Dashboard/PublishingController.php` - Handles all CRUD operations

### 3. Request Validation

-   `app/Http/Requests/dashboard/PublishingRequest.php` - Form validation rules

### 4. Views

-   `resources/views/pages/publishings/index.blade.php` - Main listing page
-   `resources/views/pages/publishings/_create.blade.php` - Create modal
-   `resources/views/pages/publishings/_edit.blade.php` - Edit modal
-   `resources/views/pages/publishings/_delete.blade.php` - Delete confirmation script
-   `resources/views/pages/publishings/show.blade.php` - Individual publishing house details

### 5. Routes

-   Added to `routes/web.php`:
    ```php
    Route::resource('publishings', PublishingController::class)->names('publishings');
    ```

### 6. Navigation

-   Updated sidebar in `resources/views/layouts/main-sidebar.blade.php`

### 7. Database

-   Migration: `database/migrations/2025_10_07_042550_create_publishings_table.php`
-   Seeder: `database/seeders/PublishingSeeder.php`
-   Factory: `database/factories/PublishingFactory.php`

### 8. Tests

-   Feature tests: `tests/Feature/PublishingTest.php`

## Usage

### Accessing the Publishing Houses Management

1. Navigate to the dashboard
2. Go to "المكتبه" (Library) section
3. Click on "دور النشر" (Publishing Houses)

### Creating a New Publishing House

1. Click the "إضافة دار نشر" (Add Publishing House) button
2. Fill in the required fields:
    - **Publishing Name** (required): Name of the publishing house
    - **Phone** (required): Contact phone number
    - **Description** (optional): Description of the publishing house
3. Click "حفظ دار النشر" (Save Publishing House)

### Editing a Publishing House

1. In the publishing houses table, click the dropdown menu for the desired publishing house
2. Click "تعديل" (Edit)
3. Modify the fields as needed
4. Click "تحديث دار النشر" (Update Publishing House)

### Deleting a Publishing House

1. In the publishing houses table, click the dropdown menu for the desired publishing house
2. Click "حذف" (Delete)
3. Confirm the deletion in the popup dialog

### Viewing Publishing House Details

1. Click on a publishing house's name in the table
2. This will show the detailed view with all publishing house information

## Validation Rules

### Create/Update Validation

-   **publishing_name**: Required, string, maximum 255 characters
-   **phone**: Required, string, maximum 20 characters
-   **publishing_description**: Optional, string, maximum 1000 characters

### Error Messages (Arabic)

-   Publishing name is required: "اسم دار النشر مطلوب"
-   Publishing name must be string: "اسم دار النشر يجب أن يكون نص"
-   Publishing name too long: "اسم دار النشر يجب ألا يتجاوز 255 حرف"
-   Phone is required: "رقم الهاتف مطلوب"
-   Phone must be string: "رقم الهاتف يجب أن يكون نص"
-   Phone too long: "رقم الهاتف يجب ألا يتجاوز 20 حرف"
-   Description must be string: "وصف دار النشر يجب أن يكون نص"
-   Description too long: "وصف دار النشر يجب ألا يتجاوز 1000 حرف"

## API Endpoints

| Method    | URL                      | Description                   |
| --------- | ------------------------ | ----------------------------- |
| GET       | `/publishings`           | List all publishing houses    |
| GET       | `/publishings/create`    | Show create form              |
| POST      | `/publishings`           | Store new publishing house    |
| GET       | `/publishings/{id}`      | Show publishing house details |
| GET       | `/publishings/{id}/edit` | Show edit form                |
| PUT/PATCH | `/publishings/{id}`      | Update publishing house       |
| DELETE    | `/publishings/{id}`      | Delete publishing house       |

## Sample Data

The system includes a seeder with 6 sample publishing houses in Arabic:

-   دار الشروق للنشر والتوزيع
-   مكتبة الأسرة
-   دار المعارف
-   دار نهضة مصر
-   دار الكتب العلمية
-   مؤسسة هنداوي للتعليم والثقافة

## Testing

Run the feature tests with:

```bash
php artisan test tests/Feature/PublishingTest.php
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

## Field Descriptions

### Publishing Name (اسم دار النشر)

-   **Type**: String
-   **Required**: Yes
-   **Max Length**: 255 characters
-   **Description**: The official name of the publishing house

### Phone (رقم الهاتف)

-   **Type**: String
-   **Required**: Yes
-   **Max Length**: 20 characters
-   **Description**: Contact phone number for the publishing house
-   **Format**: Can include country codes, area codes, and formatting

### Publishing Description (وصف دار النشر)

-   **Type**: String
-   **Required**: No
-   **Max Length**: 1000 characters
-   **Description**: Optional description about the publishing house's specialization, history, or services

## Related Models

This Publishing model can be related to other models in the system:

-   **Authors**: Publishing houses can have relationships with authors
-   **Books**: Publishing houses can publish multiple books
-   **Articles**: Publishing houses can be associated with articles

## Future Enhancements

Potential improvements for the Publishing CRUD system:

1. **File Upload**: Add logo/image upload functionality
2. **Address Fields**: Add address, city, country fields
3. **Website/Email**: Add website URL and email contact fields
4. **Relationships**: Establish relationships with Authors and Books models
5. **Search Enhancement**: Add advanced search and filtering options
6. **Export Functionality**: Add CSV/Excel export capabilities
7. **Bulk Operations**: Add bulk edit and delete functionality
