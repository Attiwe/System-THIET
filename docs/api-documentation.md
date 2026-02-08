# API Documentation

## Base URL
```
http://your-domain.com/api
```

## API Version
All endpoints are prefixed with `/v1`

## Response Format

### Success Response
```json
{
  "success": true,
  "data": {},
  "message": "Success message"
}
```

### Error Response
```json
{
  "success": false,
  "message": "Error message"
}
```

## HTTP Status Codes
- `200` - Success
- `400` - Bad Request
- `404` - Not Found
- `500` - Internal Server Error

---

## Endpoints

### 1. Sliders

#### Get All Sliders
**GET** `/api/v1/sliders`

**Description:** Retrieve all active sliders with pagination (4 items per page)

**Response:**
```json
{
  "success": true,
  "data": {
    "data": [
      {
        "id": 1,
        "title": "Slider Title",
        "image": "http://domain.com/path/to/image.jpg",
        "link": "http://link.com",
        "status": "active"
      }
    ],
    "current_page": 1,
    "per_page": 4,
    "total": 10
  },
  "message": "The sliders fetched successfully"
}
```

---

### 2. About Institute

#### Get Institute Information
**GET** `/api/v1/about/institute`

**Description:** Retrieve information about the institute (vision, message, description, image)

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "vision": "Institute vision",
    "message": "Institute message",
    "description": "Institute description",
    "image": "http://domain.com/path/to/image.jpg"
  },
  "message": "The unit institutes fetched successfully"
}
```

---

### 3. Organization Structure

#### Get Organization Structure
**GET** `/api/v1/organization/structure`

**Description:** Retrieve the organizational structure of the institute

**Response:**
```json
{
  "success": true,
  "data": {},
  "message": "Success"
}
```

---

### 4. Institute Board Members

#### Get Institute Board Members
**GET** `/api/v1/institute/board/members`

**Description:** Retrieve all institute board members

**Response:**
```json
{
  "success": true,
  "data": {},
  "message": "Success"
}
```

---

### 5. Academic Councils

#### Get Academic Councils
**GET** `/api/v1/academic/councils`

**Description:** Retrieve all academic councils

**Response:**
```json
{
  "success": true,
  "data": {},
  "message": "Success"
}
```

---

### 6. Departments

#### Get Basic Sciences Department
**GET** `/api/v1/departments/basic-sciences`

**Description:** Retrieve information about the Basic Sciences department

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Basic Sciences",
    "description": "Department description",
    "image": "http://domain.com/path/to/image.jpg"
  },
  "message": "The Department fetched successfully"
}
```

#### Get Computer Engineering Department
**GET** `/api/v1/departments/computer-engineering`

**Description:** Retrieve information about the Computer Engineering department

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 4,
    "name": "Computer Engineering",
    "description": "Department description",
    "image": "http://domain.com/path/to/image.jpg"
  },
  "message": "The Department fetched successfully"
}
```

#### Get Construction and Building Engineering Department
**GET** `/api/v1/departments/construction-and-building-engineering`

**Description:** Retrieve information about the Construction and Building Engineering department

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 2,
    "name": "Construction and Building Engineering",
    "description": "Department description",
    "image": "http://domain.com/path/to/image.jpg"
  },
  "message": "The Department fetched successfully"
}
```

#### Get Chemical Engineering Department
**GET** `/api/v1/departments/chemical-engineering`

**Description:** Retrieve information about the Chemical Engineering department

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 3,
    "name": "Chemical Engineering",
    "description": "Department description",
    "image": "http://domain.com/path/to/image.jpg"
  },
  "message": "The Department fetched successfully"
}
```

---

### 7. Department Heads

#### Get Basic Sciences Department Head
**GET** `/api/v1/department-heads/basic-sciences`

**Description:** Retrieve the head of the Basic Sciences department

**Response:**
```json
{
  "success": true,
  "data": {},
  "message": "Success"
}
```

#### Get Computer Engineering Department Head
**GET** `/api/v1/department-heads/computer-engineering`

**Description:** Retrieve the head of the Computer Engineering department

#### Get Construction and Building Engineering Department Head
**GET** `/api/v1/department-heads/construction-and-building-engineering`

**Description:** Retrieve the head of the Construction and Building Engineering department

#### Get Chemical Engineering Department Head
**GET** `/api/v1/department-heads/chemical-engineering`

**Description:** Retrieve the head of the Chemical Engineering department

---

### 8. Department Plans (خطط البحث)

#### Get Basic Sciences Department Plan
**GET** `/api/v1/department-plans/basic-sciences`

**Description:** Retrieve the research plan for Basic Sciences department

**Response:**
```json
{
  "success": true,
  "data": {
    "department_name": "Basic Sciences",
    "research_plan": "http://domain.com/storage/department_plans/file.pdf"
  },
  "message": "The department plan fetched successfully"
}
```

#### Get Computer Engineering Department Plan
**GET** `/api/v1/department-plans/computer-engineering`

**Description:** Retrieve the research plan for Computer Engineering department

#### Get Construction and Building Engineering Department Plan
**GET** `/api/v1/department-plans/construction-and-building-engineering`

**Description:** Retrieve the research plan for Construction and Building Engineering department

#### Get Chemical Engineering Department Plan
**GET** `/api/v1/department-plans/chemical-engineering`

**Description:** Retrieve the research plan for Chemical Engineering department

---

### 9. Department Regulations (اللائحة الداخلية)

#### Get Basic Sciences Department Regulations
**GET** `/api/v1/department-regulations/basic-sciences`

**Description:** Retrieve the internal regulations for Basic Sciences department

**Response:**
```json
{
  "success": true,
  "data": {
    "department_name": "Basic Sciences",
    "regulations": "http://domain.com/storage/department_regulations/file.pdf"
  },
  "message": "Success"
}
```

#### Get Computer Engineering Department Regulations
**GET** `/api/v1/department-regulations/computer-engineering`

#### Get Construction and Building Engineering Department Regulations
**GET** `/api/v1/department-regulations/construction-and-building-engineering`

#### Get Chemical Engineering Department Regulations
**GET** `/api/v1/department-regulations/chemical-engineering`

---

### 10. Department Books (كتاب القسم)

#### Get Basic Sciences Department Books
**GET** `/api/v1/department-books/basic-sciences`

**Description:** Retrieve books for Basic Sciences department

#### Get Computer Engineering Department Books
**GET** `/api/v1/department-books/computer-engineering`

#### Get Construction and Building Engineering Department Books
**GET** `/api/v1/department-books/construction-and-building-engineering`

#### Get Chemical Engineering Department Books
**GET** `/api/v1/department-books/chemical-engineering`

---

### 11. Department Courses (المقررات الدراسية)

#### Get Basic Sciences Department Courses
**GET** `/api/v1/department-courses/basic-sciences`

**Description:** Retrieve courses for Basic Sciences department

#### Get Computer Engineering Department Courses
**GET** `/api/v1/department-courses/computer-engineering`

#### Get Construction and Building Engineering Department Courses
**GET** `/api/v1/department-courses/construction-and-building-engineering`

#### Get Chemical Engineering Department Courses
**GET** `/api/v1/department-courses/chemical-engineering`

---

### 12. Department Council (مجلس القسم)

#### Get Basic Sciences Department Council
**GET** `/api/v1/department-council/basic-sciences`

**Description:** Retrieve council members for Basic Sciences department

#### Get Computer Engineering Department Council
**GET** `/api/v1/department-council/computer-engineering`

#### Get Construction and Building Engineering Department Council
**GET** `/api/v1/department-council/construction-and-building-engineering`

#### Get Chemical Engineering Department Council
**GET** `/api/v1/department-council/chemical-engineering`

---

### 13. Faculty Members

#### Get Basic Sciences Faculty Members
**GET** `/api/v1/faculty-members/basic-sciences`

**Description:** Retrieve faculty members for Basic Sciences department

#### Get Computer Engineering Faculty Members
**GET** `/api/v1/faculty-members/computer-engineering`

#### Get Construction and Building Engineering Faculty Members
**GET** `/api/v1/faculty-members/construction-and-building-engineering`

#### Get Chemical Engineering Faculty Members
**GET** `/api/v1/faculty-members/chemical-engineering`

---

### 14. Institute Requirements

#### Get Basic Sciences Institute Requirements
**GET** `/api/v1/institute-requirements/basic-sciences`

**Description:** Retrieve institute requirements for Basic Sciences department

#### Get Computer Engineering Institute Requirements
**GET** `/api/v1/institute-requirements/computer-engineering`

#### Get Construction and Building Engineering Institute Requirements
**GET** `/api/v1/institute-requirements/construction-and-building-engineering`

#### Get Chemical Engineering Institute Requirements
**GET** `/api/v1/institute-requirements/chemical-engineering`

---

### 15. Labs

#### Get Basic Sciences Labs
**GET** `/api/v1/labs/basic-sciences`

**Description:** Retrieve labs for Basic Sciences department

#### Get Computer Engineering Labs
**GET** `/api/v1/labs/computer-engineering`

#### Get Construction and Building Engineering Labs
**GET** `/api/v1/labs/construction-and-building-engineering`

#### Get Chemical Engineering Labs
**GET** `/api/v1/labs/chemical-engineering`

---

### 16. Class Trainings

#### Get Basic Sciences Class Trainings
**GET** `/api/v1/class-trainings/basic-sciences`

**Description:** Retrieve class trainings for Basic Sciences department

#### Get Computer Engineering Class Trainings
**GET** `/api/v1/class-trainings/computer-engineering`

#### Get Construction and Building Engineering Class Trainings
**GET** `/api/v1/class-trainings/construction-and-building-engineering`

#### Get Chemical Engineering Class Trainings
**GET** `/api/v1/class-trainings/chemical-engineering`

---

### 17. Scientific Trips

#### Get Basic Sciences Scientific Trips
**GET** `/api/v1/scientific-trips/basic-sciences`

**Description:** Retrieve scientific trips for Basic Sciences department

#### Get Computer Engineering Scientific Trips
**GET** `/api/v1/scientific-trips/computer-engineering`

#### Get Construction and Building Engineering Scientific Trips
**GET** `/api/v1/scientific-trips/construction-and-building-engineering`

#### Get Chemical Engineering Scientific Trips
**GET** `/api/v1/scientific-trips/chemical-engineering`

---

### 18. Research Projects

#### Get Basic Sciences Research Projects
**GET** `/api/v1/research-projects/basic-sciences`

**Description:** Retrieve research projects for Basic Sciences department

#### Get Computer Engineering Research Projects
**GET** `/api/v1/research-projects/computer-engineering`

#### Get Construction and Building Engineering Research Projects
**GET** `/api/v1/research-projects/construction-and-building-engineering`

#### Get Chemical Engineering Research Projects
**GET** `/api/v1/research-projects/chemical-engineering`

---

### 19. Student Projects

#### Get Basic Sciences Student Projects
**GET** `/api/v1/student-projects/basic-sciences`

**Description:** Retrieve student projects for Basic Sciences department

#### Get Computer Engineering Student Projects
**GET** `/api/v1/student-projects/computer-engineering`

#### Get Construction and Building Engineering Student Projects
**GET** `/api/v1/student-projects/construction-and-building-engineering`

#### Get Chemical Engineering Student Projects
**GET** `/api/v1/student-projects/chemical-engineering`

---

### 20. Master's and Doctoral Theses

#### Get All Master's and Doctoral Theses
**GET** `/api/v1/masteris-doctoral-theses`

**Description:** Retrieve all master's and doctoral theses

#### Get Basic Sciences Master's and Doctoral Theses
**GET** `/api/v1/masteris-doctoral-theses/basic-sciences`

**Description:** Retrieve master's and doctoral theses for Basic Sciences department

#### Get Computer Engineering Master's and Doctoral Theses
**GET** `/api/v1/masteris-doctoral-theses/computer-engineering`

#### Get Construction and Building Engineering Master's and Doctoral Theses
**GET** `/api/v1/masteris-doctoral-theses/construction-and-building-engineering`

#### Get Chemical Engineering Master's and Doctoral Theses
**GET** `/api/v1/masteris-doctoral-theses/chemical-engineering`

---

### 21. Publishing Awards

#### Get All Publishing Awards
**GET** `/api/v1/publishing-awards`

**Description:** Retrieve all publishing awards

**Response:**
```json
{
  "success": true,
  "data": {},
  "message": "Success"
}
```

---

## Department IDs Reference

- **Basic Sciences**: ID = 1
- **Construction and Building Engineering**: ID = 2
- **Chemical Engineering**: ID = 3
- **Computer Engineering**: ID = 4

---

## Error Handling

### Example Error Response
```json
{
  "success": false,
  "message": "Department not found"
}
```

### Common Error Messages
- `"Department not found"` - When department ID doesn't exist
- `"Unit institutes not found"` - When institute data is not available
- `"Department plan not found data not found"` - When department plan doesn't exist

---

## Notes

1. All endpoints return JSON responses
2. All endpoints use GET method (read-only API)
3. Image URLs are returned as full URLs using `asset()` helper
4. File URLs (PDFs, documents) are returned as full URLs pointing to storage
5. Pagination is used for sliders endpoint (4 items per page)
6. All department-specific endpoints follow the same pattern with department slug in the URL

---

## Example Usage

### Using cURL
```bash
curl -X GET http://your-domain.com/api/v1/sliders
```

### Using JavaScript (Fetch)
```javascript
fetch('http://your-domain.com/api/v1/sliders')
  .then(response => response.json())
  .then(data => console.log(data));
```

### Using JavaScript (Axios)
```javascript
axios.get('http://your-domain.com/api/v1/sliders')
  .then(response => console.log(response.data))
  .catch(error => console.error(error));
```

---

## Last Updated
Documentation generated based on API routes in `routes/api.php`

