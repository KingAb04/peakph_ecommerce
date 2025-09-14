<?php
session_start();

// If already logged in, redirect to admin.php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PeakPH: Camping Gears and More</title>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Global Styles -->
  <link rel="stylesheet" href="Css/Global.css" />

  <!-- Google API -->
  <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body>
  <!-- HEADER -->
  <header>
    <div class="top-navbar">
      <div class="brand">
        <a href="index.php" class="logo-btn">
          <img src="Assets/Carousel_Picts/Logo.png" alt="Brand Logo" />
        </a>
      </div>

      <div class="search-wrapper">
        <i class="bi bi-search"></i>
        <input type="search" placeholder="Search..." />
      </div>

      <div class="top-icons">
        <button id="loginIcon" class="login-btn">
          <i class="bi bi-person"></i>
          <span>Login</span>
        </button>
        <i class="bi bi-cart">
          <span class="cart-count">0</span>
        </i>
      </div>
    </div>

    <!-- Bottom Navbar -->
    <div class="bottom-navbar">
      <nav>
        <a href="#shop">Shop</a>
        <a href="#product">Product</a>
        <a href="#contact">Contact Us</a>
        <a href="#deals" class="best-deals">Best Deals</a>
      </nav>
    </div>
  </header>

  <!-- HERO -->
  <div class="hero">
    <div class="slides" id="slides">
      <div class="slide deals-slide" id="mainBanner" style="background-image: url('Assets/Carousel_Picts/DeaksV2.png')">
        <a href="#shop" class="shop-btn">Shop Now</a>
      </div>
      <div class="slide" style="background-image: url('landing image/landing1.png')"></div>
      <div class="slide voucher-slide" style="background-image: url('Assets/Carousel_Picts/Vouchers.png')">
        <a href="#shop" class="shop-btn">Shop Now</a>
      </div>
      <div class="slide" style="background-image: url('landing image/landing2.jpg')"></div>
      <div class="slide" style="background-image: url('slider5.jpg')"></div>
    </div>
    
    <button class="arrow prev" onclick="moveSlide(-1)">‹</button>
    <button class="arrow next" onclick="moveSlide(1)">›</button>
  </div>

  <!-- MID CONTAINER -->
  <div class="mid-gallery">
    <button class="gallery-arrow prev">‹</button>
    <div class="gallery-track" id="gallery-track">
      <div class="gallery-item">
        <img src="Assets/Gallery_Images/TentSample.jpg" alt="Camping Tent" />
        <p>Camping Tent</p>
      </div>
      <div class="gallery-item">
        <img src="Assets/Gallery_Images/HikingBackpackSample.png" alt="Hiking Backpack" />
        <p>Hiking Backpack</p>
      </div>
      <div class="gallery-item">
        <img src="Assets/Gallery_Images/CookingGearSample.png" alt="Cooking Gear" />
        <p>Cooking Gear</p>
      </div>
      <div class="gallery-item">
        <img src="Assets/Gallery_Images/Survival Kit Sample.png" alt="Survival Kit" />
        <p>Survival Kit</p>
      </div>
      <div class="gallery-item">
        <img src="Assets/Gallery_Images/TravelBootsSample.png" alt="Travel Boots" />
        <p>Travel Boots</p>
      </div>
      <div class="gallery-item">
        <img src="Assets/Gallery_Images/Camping Stove Sample.png" alt="Camping Stove" />
        <p>Camping Stove</p>
      </div>
    </div>
    <button class="gallery-arrow next">›</button>
  </div>

  <!-- NEW ARRIVALS -->
  <section class="new-arrivals">
    <h2 style="color: white">New Arrivals</h2>
    <div class="arrivals-grid">
      <div class="arrival-card">
        <a href="Pages/ProductView.html" class="logo-btn">
          <img
            src="https://contents.mediadecathlon.com/p2598153/k$f245c5bc1b3ece77d99333fa582953a6/large-camping-folding-armchair-xl-quechua-8852993.jpg?f=768x0&format=auto"
            alt="Large Camping Folding Armchair" />
        </a>
        <p class="product-name">Large Camping Folding Armchair</p>
        <span class="price">₱1,690</span>
      </div>
      <div class="arrival-card">
        <img src="/GalleryImages/NewBackpack.jpg" alt="Explorer Backpack" />
        <p class="product-name">Explorer Backpack</p>
        <span class="price">₱2,199</span>
      </div>
      <div class="arrival-card">
        <img src="/GalleryImages/NewCookset.jpg" alt="Portable Cookset" />
        <p class="product-name">Portable Cookset</p>
        <span class="price">₱1,499</span>
      </div>
      <div class="arrival-card">
        <img src="/GalleryImages/NewBoots.jpg" alt="Trekking Boots" />
        <p class="product-name">Trekking Boots</p>
        <span class="price">₱2,899</span>
      </div>
    </div>
  </section>

  <!-- NEWSLETTER SIGNUP -->
  <section class="newsletter">
    <div class="newsletter-content">
      <h2>Join Our Adventure Club</h2>
      <p>Get exclusive deals, camping tips, and updates straight to your inbox.</p>
      <form class="newsletter-form">
        <input type="email" placeholder="Enter your email" required />
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </section>

  <!-- MAIN CATEGORIES -->
  <section class="Maincategory">
    <a href="/tents-tarpaulins" class="Maincategory-link">
      <div class="Maincategory" style="background-image: url('Assets/Main_Category/tent.jpg')"></div>
      <div class="Maincategory-title">Tents & Tarpaulins</div>
    </a>

    <a href="/Cooking Equipment" class="Maincategory-link">
      <div class="Maincategory" style="background-image: url('Assets/Main_Category/cooking.jpg')"></div>
      <div class="Maincategory-title">Cooking Equipment</div>
    </a>

    <a href="/Survival Equipment" class="Maincategory-link">
      <div class="Maincategory" style="background-image: url('Assets/Main_Category/equipment.jpg')"></div>
      <div class="Maincategory-title">Survival Equipment</div>
    </a>
  </section>

  <!-- LOGIN MODAL -->
  <div id="authModal" class="login-modal">
    <div class="login-card">
      <div class="login-left">
        <h2>Log In</h2>

        <?php if (isset($_GET['login']) && $_GET['login'] === 'failed'): ?>
          <p style="color: red;">Invalid email or password</p>
        <?php endif; ?>

        <p class="welcome-text">Welcome back! Please enter your details</p>

        <form id="emailLoginForm" method="POST" action="login.php">
          <label>Email</label>
          <input type="email" name="email" placeholder="Enter your email" required />

          <label>Password</label>
          <div class="password-field">
            <input type="password" name="password" placeholder="Enter your password" required />
            <i class="bi bi-eye"></i>
          </div>

          <a href="#" class="forgot-password">Forgot password?</a>
          <button type="submit" class="login-btn-main">Log in</button>

          <div class="or-divider"><span>Or Continue With</span></div>

          <div class="social-login">
            <button type="button" class="google-btn">
              <i class="bi bi-google"></i> Google
            </button>
            <button type="button" class="facebook-btn">
              <i class="bi bi-facebook"></i> Facebook
            </button>
          </div>
        </form>

        <p class="signup-text">
          Don't have an account? <a href="#">Sign up</a>
        </p>
      </div>

      <button class="close-btn" id="closeModal">
        <i class="bi bi-x-lg"></i>
      </button>

      <div class="login-right">
        <div class="overlay"></div>
      </div>
    </div>
  </div>

  <!-- CHATBOT -->
  <div id="chatbot-icon">💬</div>
  <div id="chatbot-container" class="hidden">
    <div id="chatbot-header">
      <span>Peak Bot</span>
      <button id="close-btn">&times;</button>
    </div>
    <div id="chatbot-body">
      <div id="chatbot-messages"></div>
    </div>
    <div id="chatbot-input-container">
      <input type="text" id="chatbot-input" placeholder="Type a message" />
      <button id="send-btn">Send</button>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-top">
      <div class="social-section">
        <p class="follow-text">Follow Us</p>
        <div class="social-icons">
          <a href="https://facebook.com/yourpage" target="_blank" rel="noopener"><i class="bi bi-facebook"></i></a>
          <a href="https://instagram.com/yourpage" target="_blank" rel="noopener"><i class="bi bi-instagram"></i></a>
          <a href="https://youtube.com/yourpage" target="_blank" rel="noopener"><i class="bi bi-youtube"></i></a>
          <a href="https://tiktok.com/@yourpage" target="_blank" rel="noopener"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>
    </div>

    <hr />

    <div class="footer-links">
      <div>
        <h4>CUSTOMER SERVICE</h4>
        <a href="#">Contact Us</a>
        <a href="#">Return and Exchange</a>
        <a href="#">Payment Methods</a>
      </div>
      <div>
        <h4>SHOP AT SCOUT AND SHOUT</h4>
        <a href="#">Our Stores</a>
        <a href="#">Delivery</a>
        <a href="#">Business Inquiries</a>
        <a href="#">Terms and Conditions</a>
        <a href="#">Privacy Policy</a>
      </div>
      <div>
        <h4>SERVICES</h4>
        <a href="#">Repairs</a>
        <a href="#">Buy Back</a>
        <a href="#">Click & Collect</a>
      </div>
      <div>
        <h4>ABOUT US</h4>
        <a href="#">Sustainability</a>
        <a href="#">Certificate of Registration</a>
      </div>
      <div>
        <h4>MORE</h4>
        <a href="#">Membership</a>
        <a href="#">Share Your Ideas</a>
        <a href="#">Product Recall</a>
      </div>
      <div>
        <h4>JOIN US</h4>
        <a href="#">climbers</a>
      </div>
    </div>

    <hr />

    <div class="footer-bottom">
      <small>© 2025 Peak. All rights reserved.</small>
    </div>
  </footer>

  <!-- SCRIPTS -->
  <script src="Js/JavaScript.js"></script>
  <script src="Js/chatbot.js"></script>
</body>
</html>
