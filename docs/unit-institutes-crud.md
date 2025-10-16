# Unit Institutes CRUD System Documentation

## Overview

This document describes the complete CRUD (Create, Read, Update, Delete) system for managing unit institutes (وحدات المعهد) in the application.

## Features

-   ✅ Create new unit institutes
-   ✅ View all unit institutes in a data table
-   ✅ Edit existing unit institutes
-   ✅ Delete unit institutes with confirmation
-   ✅ View individual unit institute details
-   ✅ Image upload functionality
-   ✅ Form validation
-   ✅ Arabic language support
-   ✅ Responsive design
-   ✅ SweetAlert confirmation dialogs

## Database Structure

### Unit Institutes Table

```sql
CREATE TABLE unit_institutes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vision TEXT NOT NULL,
    message TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Files Created

### 1. Model

-   `app/Models/UnitInstitutes.php` - Eloquent model with fillable fields

### 2. Controller

-   `app/Http/Controllers/Dashboard/UnitInstitutesController.php` - Handles all CRUD operations

### 3. Request Validation

-   `app/Http/Requests/dashboard/UnitInstitutesRequest.php` - Form validation rules

### 4. Views

-   `resources/views/pages/unit_institutes/index.blade.php` - Main listing page
-   `resources/views/pages/unit_institutes/_create.blade.php` - Create modal
-   `resources/views/pages/unit_institutes/_edit.blade.php` - Edit modal
-   `resources/views/pages/unit_institutes/_delete.blade.php` - Delete confirmation script
-   `resources/views/pages/unit_institutes/show.blade.php` - Individual unit institute details

### 5. Routes

-   Added to `routes/web.php`:
    ```php
    Route::resource('unit_institutes', UnitInstitutesController::class)->names('unit_institutes');
    ```

### 6. Navigation

-   Updated sidebar in `resources/views/layouts/main-sidebar.blade.php`

### 7. Database

-   Migration: `database/migrations/2025_08_07_055308_create_unit_institutes_table.php`
-   Seeder: `database/seeders/UnitInstitutesSeeder.php`
-   Factory: `database/factories/UnitInstitutesFactory.php`

### 8. Tests

-   Feature tests: `tests/Feature/UnitInstitutesTest.php`

## Usage

### Accessing the Unit Institutes Management

1. Navigate to the dashboard
2. Go to "الاعدادت الادريه" (Administrative Settings) section
3. Click on "وحدات المعهد" (Unit Institutes)

### Creating a New Unit Institute

1. Click the "إضافة وحدة معهد" (Add Unit Institute) button
2. Fill in the required fields:
    - **Vision** (required): The vision statement of the unit institute
    - **Message** (required): The message/description of the unit institute
    - **Image** (required): Image file representing the unit institute
3. Click "حفظ وحدة المعهد" (Save Unit Institute)

### Editing a Unit Institute

1. In the unit institutes table, click the dropdown menu for the desired unit institute
2. Click "تعديل" (Edit)
3. Modify the fields as needed
4. Click "تحديث وحدة المعهد" (Update Unit Institute)

### Deleting a Unit Institute

1. In the unit institutes table, click the dropdown menu for the desired unit institute
2. Click "حذف" (Delete)
3. Confirm the deletion in the popup dialog

### Viewing Unit Institute Details

1. Click on a unit institute's name in the table
2. This will show the detailed view with all unit institute information

## Validation Rules

### Create/Update Validation

-   **vision**: Required, string, maximum 2000 characters
-   **message**: Required, string, maximum 2000 characters
-   **image**: Required for create, optional for update, must be image file (jpeg, png, jpg, gif, webp), maximum 2MB

### Error Messages (Arabic)

-   Vision is required: "الرؤية مطلوبة"
-   Vision must be string: "الرؤية يجب أن تكون نص"
-   Vision too long: "الرؤية يجب ألا تتجاوز 2000 حرف"
-   Message is required: "الرسالة مطلوبة"
-   Message must be string: "الرسالة يجب أن تكون نص"
-   Message too long: "الرسالة يجب ألا تتجاوز 2000 حرف"
-   Image is required: "الصورة مطلوبة"
-   Image must be image: "يجب أن يكون الملف صورة"
-   Image invalid format: "نوع الصورة يجب أن يكون: jpeg, png, jpg, gif, webp"
-   Image too large: "حجم الصورة يجب ألا يتجاوز 2 ميجابايت"

## API Endpoints

| Method    | URL                          | Description                 |
| --------- | ---------------------------- | --------------------------- |
| GET       | `/unit_institutes`           | List all unit institutes    |
| GET       | `/unit_institutes/create`    | Show create form            |
| POST      | `/unit_institutes`           | Store new unit institute    |
| GET       | `/unit_institutes/{id}`      | Show unit institute details |
| GET       | `/unit_institutes/{id}/edit` | Show edit form              |
| PUT/PATCH | `/unit_institutes/{id}`      | Update unit institute       |
| DELETE    | `/unit_institutes/{id}`      | Delete unit institute       |

## Sample Data

The system includes a seeder with 3 sample unit institutes in Arabic:

1. **Vision**: "أن نكون رائدين في تقديم خدمات تعليمية وتدريبية متميزة..."
2. **Vision**: "أن نكون مركزاً متميزاً للبحث العلمي والابتكار في مجال الهندسة..."
3. **Vision**: "أن نكون بيت خبرة في مجال الهندسة والتكنولوجيا..."

## Testing

Run the feature tests with:

```bash
php artisan test tests/Feature/UnitInstitutesTest.php
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

### Vision (الرؤية)

-   **Type**: Text
-   **Required**: Yes
-   **Max Length**: 2000 characters
-   **Description**: The long-term vision and goals of the unit institute

### Message (الرسالة)

-   **Type**: Text
-   **Required**: Yes
-   **Max Length**: 2000 characters
-   **Description**: The mission statement and core values of the unit institute

### Image (الصورة)

-   **Type**: File Upload
-   **Required**: Yes (for create), Optional (for update)
-   **Formats**: JPEG, PNG, JPG, GIF, WEBP
-   **Max Size**: 2MB
-   **Description**: Visual representation of the unit institute

## File Storage

-   **Storage Disk**: `unit_institutes`
-   **Storage Path**: `storage/app/unit_institutes/`
-   **Public Access**: `public/image/unit_institutes/`
-   **File Naming**: UUID-based unique filenames

## Image Handling

### Upload Process

1. File validation (type, size)
2. Generate unique filename using UUID
3. Store in `unit_institutes` disk
4. Save filename to database

### Display

-   Thumbnail view in data table (60x60px)
-   Full-size view in detail page
-   Clickable links to view full image

### Update Process

1. If new image uploaded:
    - Delete old image file
    - Upload and store new image
    - Update database record
2. If no new image:
    - Keep existing image
    - Update other fields only

## Related Models

This UnitInstitutes model can be related to other models in the system:

-   **Units**: Unit institutes can be associated with specific units
-   **Institutes**: Unit institutes belong to institutes
-   **Faculty Members**: Unit institutes can have associated faculty

## Future Enhancements

Potential improvements for the UnitInstitutes CRUD system:

1. **Multiple Images**: Support for multiple images per unit institute
2. **Image Gallery**: Create an image gallery view
3. **Image Cropping**: Add image cropping functionality
4. **Relationships**: Establish relationships with Units and Institutes models
5. **Search Enhancement**: Add advanced search and filtering options
6. **Export Functionality**: Add CSV/Excel export capabilities
7. **Bulk Operations**: Add bulk edit and delete functionality
8. **Rich Text Editor**: Add WYSIWYG editor for vision and message fields
9. **SEO Fields**: Add meta description and keywords fields
10. **Status Management**: Add active/inactive status for unit institutes
