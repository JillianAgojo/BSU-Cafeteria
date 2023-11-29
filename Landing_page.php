<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BSU CAFETERIA</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0; /* Remove default margin to ensure full width */
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }

        /* Navigation Bar */
        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            font-size: 16px;
            font-weight: bold;
            color: #343a40;
            padding: 8px 15px;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #dc3545;
        }

        /* Home Section */
        #home {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            background: url('Batangas-State-University.jpg') center/cover no-repeat;
        }

        #carouselExample {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .carousel-inner {
            height: 100%;
        }

        .carousel-item {
            height: 100%;
        }

        .carousel-caption {
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
        }

        #home h1,
        #home p {
            color: #dc3545;
        }

        .btn-get-started {
            background-color: #dc3545;
            color: #ffffff;
            padding: 15px 30px;
            font-size: 1.2em;
            border-radius: 8px;
            display: inline-block;
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* About Us Section */
        #about-us {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .about-us-photo {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        /* Features Container */
        #features {
            background-color: #ffffff;
            padding: 50px 0;
        }

        .feature-container {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: box-shadow 0.3s ease, background-color 0.3s ease, color 0.3s ease;
        }

        .feature-container:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }

        /* Contacts Section */
        #contacts {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        /* Footer Section */
        #footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        /* Responsive Images */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        #contacts {
    background-color: #f8f9fa;
    padding: 80px 0;
}

.contact-info h2,
.contact-form h2 {
    color: #212529;
}

.contact-info ul {
    list-style: none;
    padding: 0;
}

.contact-info li {
    margin-bottom: 10px;
}

.contact-form .form-group {
    margin-bottom: 20px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

.contact-form button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.contact-form button:hover {
    background-color: #0056b3;
}

    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="BSU logo.png" alt="Logo" height="40" class="mr-2">
                Batangas State University - Lipa Campus
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Section with Image Slider -->
    <section id="home">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
<div class="carousel-item active">
    <img src="slider-image1.jpg" class="d-block w-100" alt="Slide 1">
    <div class="carousel-caption d-none d-md-block">
        <h1 class="display-4">BSU CAFETERIA</h1>
        <p class="lead">"Fueling Minds, Nourishing Souls: Where Every Bite Tells a Delicious Story!"</p>
        <a href="login.php" class="btn btn-primary btn-lg btn-get-started">Get Started</a>
    </div>
</div>

<!-- Slide 2 -->
<div class="carousel-item">
    <img src="LIPA LAYOUT 1.jpg" class="d-block w-100" alt="Slide 2">
    <div class="carousel-caption d-none d-md-block">
        <h1 class="display-4">BSU CAFETERIA</h1>
        <p class="lead">"Fueling Minds, Nourishing Souls: Where Every Bite Tells a Delicious Story!"</p>
        <a href="login.php" class="btn btn-primary btn-lg btn-get-started">Get Started</a>
    </div>
</div>


            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

<!-- About Us Section - Two Column Layout -->
<section id="about-us" class="two-column-container">
    <div class="container">
        <div class="row">
            <!-- Left Column - Text -->
            <div class="col-md-6">
                <h2 class="text-center mb-4">About BSU Cafeteria</h2>
                <p>Welcome to BSU Cafeteria, where delicious meals meet a vibrant campus atmosphere. As the heart of the campus dining experience, we take pride in providing a diverse menu that caters to the tastes and preferences of our students, faculty, and staff.</p>

                <p>At BSU Cafeteria, we are committed to offering high-quality, nutritious, and flavorful meals to fuel the minds and bodies of our university community. Our dedicated team of chefs and staff work tirelessly to create a welcoming and enjoyable dining environment for everyone.</p>
            </div>

            <!-- Right Column - Image -->
            <div class="col-md-6">
                <img src="final layout of cafeteria.jpg" alt="BSU Cafeteria Photo" class="about-us-photo img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Discover BSU Cafeteria Section -->
<section id="discover" style="background-image: url('Cafeteria Layout.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; color: red; text-align: center; padding: 100px 0;">
    <div class="container">
        <h1 class="display-4">Discover BSU Cafeteria</h1>
    </div>
</section>

<!-- Features Container -->
<section id="features" class="bg-light py-5">
    <div class="container">
        <!-- Heading -->
        <h2 class="text-center mb-4">Our Features</h2>

        <!-- Feature Cards -->
        <div class="row">
            <!-- Feature 1 -->
            <div class="col-lg-4 mb-4">
                <div class="feature-container text-center p-4 feature-hover">
                    <!-- Icon -->
                    <i class="fas fa-utensils fa-3x mb-3 text-primary"></i>
                    <!-- Feature Title -->
                    <h3>Locally Inspired Daily Specials</h3>
                    <!-- Feature Description -->
                    <p>
                        <!-- Justification of Content -->
                        Experience the unique flavors of our region with our Locally Inspired Daily Specials.
                        Our chefs craft daily specials that highlight the best seasonal and local ingredients,
                        ensuring a fresh and authentic dining experience.
                    </p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-lg-4 mb-4">
                <div class="feature-container text-center p-4 feature-hover">
                    <i class="fas fa-carrot fa-3x mb-3 text-success"></i>
                    <h3>Healthy Dining Options</h3>
                    <p>
                        Prioritizing your well-being, BSU Cafeteria offers a range of healthy dining options.
                        From nutrient-packed salads to wholesome grain bowls, our menu includes choices that
                        cater to a balanced and nutritious diet.
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-lg-4 mb-4">
                <div class="feature-container text-center p-4 feature-hover">
                    <i class="fas fa-clock fa-3x mb-3 text-info"></i>
                    <h3>Fast, Efficient, and Friendly Service</h3>
                    <p>
                        Experience the best of both worlds - exceptional food and unparalleled service.
                        At BSU Cafeteria, we take pride in delivering not only the most mouthwatering dishes
                        but also ensuring a fast, efficient, and friendly service.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>









    <!-- Footer Section -->
    <footer id="footer">
        <div class="container">
            <p>&copy; 2023 Reserved All Rights, BSU Cafeteria - Lipa Campus.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>