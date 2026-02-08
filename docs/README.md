# API Documentation Index

This directory contains the API documentation for the Future Engineer project.

## Available Documentation

### API Documentation
- **[API Documentation (English)](api-documentation.md)** - Complete API documentation in English
- **[توثيق API (العربية)](api-documentation-ar.md)** - توثيق API كامل باللغة العربية
- **[OpenAPI Specification (YAML)](api-specification.yaml)** - OpenAPI 3.0 specification file for Swagger/Postman

### Other Documentation
- [Author CRUD](author-crud.md)
- [Organization Structure](organization-structure.md)
- [Publishing CRUD](publishing-crud.md)
- [Unit Institutes CRUD](unit-institutes-crud.md)
- [Unit Objectives](unit-objectives.md)

## Quick Start

1. For English documentation, see [api-documentation.md](api-documentation.md)
2. For Arabic documentation, see [api-documentation-ar.md](api-documentation-ar.md)
3. For OpenAPI/Swagger specification, see [api-specification.yaml](api-specification.yaml)

## Using the YAML File

The `api-specification.yaml` file can be used with:
- **Swagger UI**: Import the file to visualize and test the API
- **Postman**: Import the OpenAPI specification to create a collection
- **Code Generation**: Use tools like OpenAPI Generator to generate client SDKs
- **API Testing Tools**: Use with tools like Insomnia, Bruno, etc.

### Import to Swagger UI
1. Go to https://editor.swagger.io/
2. Click "File" → "Import file"
3. Select `api-specification.yaml`
4. View and test the API documentation

### Import to Postman
1. Open Postman
2. Click "Import"
3. Select "File" and choose `api-specification.yaml`
4. The collection will be created automatically

## API Base URL

```
http://your-domain.com/api/v1
```

## Features

- All endpoints are documented
- Request/Response examples included
- Error handling documented
- Department-specific endpoints explained
- Both English and Arabic versions available
- OpenAPI 3.0 specification (YAML) for tool integration

