# TPS Application - Midterm Examination Project

## 2. Description / Overview

This project is a **Laravel-based Student Management System (TPS Application)** developed as part of the midterm examination. The application demonstrates version control collaboration using Git and GitHub, featuring a complete CRUD (Create, Read, Update, Delete) system for managing students, sections, and subjects. The project showcases collaborative development practices including repository initialization, branching, merging, and remote repository management.

## 3. Objectives

- Master Git version control and fundamental Git commands for repository management
- Implement collaborative workflows including branching, merging, and conflict resolution
- Develop a functional Laravel web application with MVC architecture
- Create and manage relational database structures with migrations
- Successfully integrate and manage remote repositories on GitHub
- Build a complete CRUD system for student, section, and subject management

## 4. Features / Functionality

- **Student Management**: Create, read, update, and delete student records
- **Section Management**: Organize and manage different sections
- **Subject Management**: Handle academic subjects and course offerings
- **Dashboard Interface**: User-friendly interface for data visualization and navigation
- **Database Integration**: MySQL database with proper relational structures
- **RESTful Controllers**: Separate controllers for Students, Sections, and Subjects
- **Database Migrations**: Version-controlled database schema management
- **Many-to-Many Relationships**: Section-Subject pivot table implementation
- **Database Seeders**: Automated data population for testing

## 5. Installation Instructions

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL Database
- Git
- Node.js & NPM

### Setup Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/bladdemerdelacruz-svg/midterm-collaboration.git
   cd midterm-collaboration
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database**
   - Create a MySQL database
   - Update `.env` file with database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed Database (Optional)**
   ```bash
   php artisan db:seed
   ```

7. **Compile Assets**
   ```bash
   npm run dev
   ```

8. **Start Development Server**
   ```bash
   php artisan serve
   ```

9. **Access Application**
   - Open browser: `http://localhost:8000`

## 6. Usage

### Application Usage

1. **Dashboard**: Navigate to the main dashboard to view system overview
2. **Students**: 
   - View all students in the system
   - Create new student records
   - Edit or delete existing students
3. **Sections**: 
   - Manage different class sections
   - Create, edit, or remove sections
4. **Subjects**: 
   - Manage course offerings
   - Assign subjects to sections

### Git Workflow

```bash
# Initialize repository
git init

# Configure user
git config --global user.name "your-name"
git config --global user.email "your-email@example.com"

# Add and commit files
git add .
git commit -m "Initial commit: File added"

# Connect to remote repository
git remote add origin https://github.com/username/repository.git
git branch -M main
git push -u origin main

# Create and work with branches
git checkout -b new-branch
git add .
git commit -m "Added new branch"

# Merge branches
git checkout main
git merge new-branch
git branch -d new-branch

# Sync with remote
git pull origin main
git push origin main
```

## 7. Screenshots or Code Snippets

### Project Structure
```
tpsApp/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── SectionController.php
│   │       ├── StudentController.php
│   │       └── SubjectController.php
│   ├── Models/
│   │   ├── Section.php
│   │   ├── Student.php
│   │   └── Subject.php
├── database/
│   ├── migrations/
│   │   ├── 2025_09_23_111823_create_sections_table.php
│   │   ├── 2025_09_23_111823_create_students_table.php
│   │   ├── 2025_09_24_041151_create_subjects_table.php
│   │   └── 2025_09_24_041900_create_section_subject_table.php
│   └── seeders/
├── resources/
│   └── views/
│       ├── dashboard.blade.php
│       ├── sections/
│       ├── students/
│       └── subjects/
└── routes/
    └── web.php
```

### Sample Controller Code
```php
// StudentController.php
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
    
    public function create()
    {
        return view('students.create');
    }
    
    public function store(Request $request)
    {
        // Validation and storage logic
    }
}
```

### Git Commands Executed
```bash
# Repository initialization
git init
git add .
git commit -m "Initial commit: File added"

# Remote repository setup
git remote add origin https://github.com/bladdemerdelacruz-svg/midterm-collaboration.git
git branch -M main
git push -u origin main

# Branch management
git checkout -b new-branch
git commit -m "Added new branch"
git checkout main
git merge new-branch
git branch -d new-branch

# Version control operations
git pull origin main
git reset --soft HEAD~1
```

## 8. Contributors

- **Bladdemer Delacruz**
  - Email: bladdemerdelacruz@gmail.com
  - GitHub: [bladdemerdelacruz-svg](https://github.com/bladdemerdelacruz-svg)
- **Jurycko Sermonia**
  - Email: juryckosermonia@gmail.com
  - GitHub: [Jurycko](https://github.com/Jurycko)

## 9. License

This project is developed for educational purposes as part of the midterm examination. All rights reserved.
