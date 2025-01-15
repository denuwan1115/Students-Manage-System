<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.html'); // Redirect to login if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLog - Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Faculty+Glyphic&family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/stuSelect.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="images/Logo.png" class="navbar-brand-image img-fluid" alt="Logo">
                <span class="navbar-brand-text">EDULOG</span>
            </a>
    
            <div class="d-lg-none ms-auto me-3">
                <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample"
                    role="button" aria-controls="offcanvasExample">Member Login</a>
            </div>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="Home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="Home.html" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="stuSelect.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="contact.html">Contact Us</a>
                    </li>
                </ul>
    
                <div class="d-none d-lg-block ms-lg-3">
                    <a class="btn custom-btn custom-border-btn" href="login.html" role="button">Admin Login</a>
                </div>
            </div>
        </div>
    </nav>

<br><br>
    <div class="container">
        <div class="row">
    
            <div class="col-lg-16 col-150 ">

                <h1 class="cd-headline rotate-1 ">
                    <span>Welcome to STULOG You can</span>
                    <span class="cd-words-wrapper">
                        <b class="is-visible">Search</b>
                        <b>Modify</b>
                        <b>ViewAll</b>
                    </span>
                </h1>
            </div>
        </div>
    </div>


    <div class="container mt-5 text-center">
        <div class="texthead">
                    <p class="lead">Manage and track student records efficiently with this system.</p>
        </div>
    </div>
    <section class="section-bg-image">
        <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="#E6E3B3" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0">
            </path>
            <path fill="#E6E3B3" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z"
                stroke-width="0"></path>
            <path fill="#E6E3B3" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z"
                stroke-width="0"></path>
            <path fill="#E6E3B3" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z"
                stroke-width="0"></path>
            <path fill="#E6E3B3" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z"
                stroke-width="0"></path>
        </svg>
    
        <div class="container">
            <div class="row">
    
                <div class="col-lg-12 col-12">
                    <div class="section-bg-image-block">
                        <h2 class="mb-lg-3">Search Students</h2>
                        <p>Provide student's information (e.g., SID, Name, Email, City, Course, Guardian) to search.</p>
                        <form action="#" method="get" class="custom-form mt-lg-4 mt-2" role="form">
                            <div class="input-group input-group-lg">
                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Search by SID, Name, Email, City, Course, or Guardian" required>
                                <button type="submit" class="form-control">Search</button>
                            </div>
                        </form>
                        <div id="searchResults" class="mt-4"></div> <!-- Placeholder for search results -->
                    </div>
                </div>
                
    
            </div>
        </div>
    
        <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="#E6E3B3" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0">
            </path>
            <path fill="#E6E3B3" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z"
                stroke-width="0"></path>
            <path fill="#E6E3B3" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z"
                stroke-width="0"></path>
            <path fill="#E6E3B3" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z"
                stroke-width="0"></path>
            <path fill="#E6E3B3" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z"
                stroke-width="0"></path>
        </svg>
    </section>
    <br><br><br><div class="container mt-4 text-center">
        <h3>Select an Action</h3><br>
        <div class="row mt-6">
            <div class="col-md-6">
                <a href="Backend/viewStudents.html" class="btn btn-success btn-lg w-100">
                    View All Students
                </a>
            </div>

            <div class="col-md-6">
                <a href="Backend/addStudent.html" class="btn btn-warning btn-lg w-100">
                    Add/Update Student
                </a>
            </div>
        </div>
    </div>

     <div class="footersvg">                 
        <footer class="py-3 mt-5">
            <div class="container text-center">
                <p>© 2024 EduLog.ETF-G21.</p>
                <div class="d-none d-lg-block ms-lg-3">
                    <a class="btn custom-btn custom-border-btn" href="Backend/php/logout.php" role="button">Logout</a>
                </div>
            </div>
        </footer>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#183020" fill-opacity="1"
                d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
            </path>
        </svg>        
     </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $('form').on('submit', function (e) {
        e.preventDefault();

        var searchValue = $('#search').val(); // Get the input value

        $.ajax({
            url: 'Backend/php/searchStudent.php',
            method: 'GET',
            data: { searchValue: searchValue },
            success: function (response) {
                var data = JSON.parse(response);

                if (data.status === 'success') {
                    // Clear previous results
                    $('#searchResults').empty();

                    // Create a table for displaying the results
                    var resultsTable = `
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Nearest City</th>
                                    <th>Course</th>
                                    <th>Guardian</th>
                                    <th>Subjects</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;

                    data.students.forEach(function (student) {
                        resultsTable += `
                            <tr>
                                <td>${student.SID}</td>
                                <td>${student.FirstName}</td>
                                <td>${student.LastName}</td>
                                <td>${student.Email}</td>
                                <td>${student.NearCity}</td>
                                <td>${student.Course.join(', ')}</td>
                                <td>${student.Guardian}</td>
                                <td>${student.Subjects.join(', ')}</td>
                            </tr>
                        `;
                    });

                    resultsTable += `
                            </tbody>
                        </table>
                    `;

                    // Append the table to the #searchResults div
                    $('#searchResults').append(resultsTable);
                } else {
                    // Display an error message if no students are found
                    $('#searchResults').html(`<p class="text-danger">${data.message}</p>`);
                }
            },
            error: function () {
                $('#searchResults').html(`<p class="text-danger">Error occurred while searching for students.</p>`);
            }
        });
    });
        });
    </script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="JS/animated-headline.js"></script>

</body>

</html>