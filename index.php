<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PeakPH: Camping Gears and More</title>

  <!-- =============================== FONTS & ICONS =============================== -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- =============================== GLOBAL STYLES =============================== -->
  <link rel="stylesheet" href="Assets/Css/Global.css" />

  <!-- =============================== GOOGLE API =============================== -->
  <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body>
  <!-- =============================== HEADER =============================== -->
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
        <?php if (isset($_SESSION["user"])): ?>
          <div class="user-info">
            <span><?php echo htmlspecialchars($_SESSION["user"]); ?></span>
            <a href="logout.php">Logout</a>
          </div>
        <?php else: ?>
          <button id="loginIcon" class="login-btn">
            <i class="bi bi-person"></i>
            <span>Login</span>
          </button>
        <?php endif; ?>

        <i class="bi bi-cart"><span class="cart-count">0</span></i>
      </div>
    </div>

    <div class="bottom-navbar">
      <nav>
        <a href="#shop">Shop</a>
        <a href="#product">Product</a>
        <a href="#contact">Contact Us</a>
        <a href="#deals" class="best-deals">Best Deals</a>
      </nav>
    </div>
  </header>

  <!-- =============================== HERO =============================== -->
  <div class="hero">
    <div class="slides" id="slides">
      <div class="slide deals-slide" style="background-image: url('Assets/Carousel_Picts/DeaksV2.png')">
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

  <!-- =============================== MID CONTAINER =============================== -->
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
      <div class="gallery-item">
        <img src="" alt="Camping Stove" />
        <p>Camping Stove</p>
      </div>
      <div class="gallery-item">
        <img src="" alt="Camping Stove" />
        <p>Camping Stove</p>
      </div>
    </div>
    <button class="gallery-arrow next">›</button>
  </div>

  <!-- =============================== NEW ARRIVALS =============================== -->
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

  <!-- =============================== NEWSLETTER SIGNUP =============================== -->
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

  <!-- =============================== MAIN CATEGORIES =============================== -->
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

  <!-- Login Modal -->
  <div id="authModal" class="login-modal <?php echo $showLoginModal ? 'active' : ''; ?>">

    <div class="login-card">
      <div class="login-left">
        <h2>Log In</h2>
        <p class="welcome-text">Welcome back! Please enter your details</p>

        <form id="emailLoginForm" method="POST" action="index.php">
          <input type="hidden" name="login" value="1">

          <!-- ERROR MESSAGE -->
          <?php if (!empty($error)) : ?>
            <div id="loginError" class="login-error">
              <?php echo htmlspecialchars($error); ?>
            </div>
          <?php endif; ?>


          <label>Email</label>
          <input type="email" name="email" placeholder="Enter your email" required />

          <label>Password</label>
          <div class="password-field">
            <input type="password" name="password" placeholder="Enter your password" required />
            <i class="bi bi-eye toggle-password"></i>
          </div>

          <a href="#" class="forgot-password">Forgot password?</a>
          <button type="submit" class="login-btn-main">Log In</button>
        </form>

        </form>

        <p class="signup-text">
          Don't have an account?
          <a href="#" id="toSignup">Sign up </a>
        </p>
      </div>

      <div class="login-right">
        <div class="overlay"><img src="Assets/Carousel_Picts/loginpict.jpg"
            alt="Login Image"
            style="width: 100%; height: 100%; object-fit: cover;" /></div>
      </div>

      <button class="close-btn" id="closeModal">&times;</button>
    </div>
  </div>

  <!-- Signup Modal -->
  <div id="signupModal" class="login-modal">
    <div class="login-card">
      <div class="login-left">
        <h2>Sign Up</h2>
        <p class="welcome-text">Create your account</p>

        <form id="signupForm" method="POST">
          <div id="signupAlert" style="color:red; margin-bottom:10px;"></div>

          <label for="username">Username</label>
          <input type="text" name="username" id="username" required />

          <label for="email">Email</label>
          <input type="email" name="email" id="email" required />

          <label for="password">Password</label>
          <div class="password-field">
            <input type="password" name="password" id="password" required />
            <i class="bi bi-eye-slash toggle-password"></i>
          </div>

          <button type="submit" class="login-btn-main">Sign Up</button>
        </form>


        <p class="signup-text">
          Already have an account?
          <a href="#" id="toLogin">Login </a>
        </p>
      </div>

      <div class="login-right">
        <div class="overlay"><img src="Assets/Carousel_Picts/loginpict.jpg"
            alt="Login Image"
            style="width: 100%; height: 100%; object-fit: cover;" /></div>
      </div>

      <button class="close-btn" id="closeSignup">&times;</button>
    </div>
  </div>


  <!-- =============================== MEGA MENUS =============================== -->
  <!-- =============================== TENTS & TARPAULINS =============================== -->
  <div id="tentMenu" class="mega-menu">
    <div class="mega-content">
      <div class="mega-left">
        <h3>Main Categories</h3>
        <ul>
          <li onclick="showSubMenu('tent')">Tent</li>
          <li onclick="showSubMenu('big-tent')">Big Tent</li>
          <li onclick="showSubMenu('tarpaulin')">Tarpaulin</li>
        </ul>
      </div>

      <div class="mega-right" id="tent-sub">
        <h3>Tents</h3>
        <ul>
          <li>2-Person Tent</li>
          <li>4-Person Tent</li>
          <li>Camping Tent</li>
        </ul>
      </div>

      <div class="mega-right hidden" id="big-tent-sub">
        <h3>Big Tents</h3>
        <ul>
          <li>Party Tent</li>
          <li>Event Tent</li>
          <li>Large Camping Tent</li>
        </ul>
      </div>

      <div class="mega-right hidden" id="tarpaulin-sub">
        <h3>Tarpaulins</h3>
        <ul>
          <li>Waterproof Tarp</li>
          <li>Heavy Duty Tarp</li>
          <li>UV Resistant Tarp</li>
        </ul>
      </div>
    </div>
    <button class="close-mega" onclick="closeMegaMenu('tentMenu')">✕</button>
  </div>

  <!-- =============================== COOKING EQUIPMENT =============================== -->
  <div id="cookingMenu" class="mega-menu">
    <div class="mega-content">
      <div class="mega-left">
        <h3>Main Categories</h3>
        <ul>
          <li onclick="showCookingSub('stove')">Stoves</li>
          <li onclick="showCookingSub('cookware')">Cookware</li>
          <li onclick="showCookingSub('utensils')">Utensils</li>
        </ul>
      </div>

      <div class="mega-right" id="stove-sub">
        <h3>Stoves</h3>
        <ul>
          <li>Portable Gas Stove</li>
          <li>Backpacking Stove</li>
          <li>Wood Burning Stove</li>
        </ul>
      </div>

      <div class="mega-right hidden" id="cookware-sub">
        <h3>Cookware</h3>
        <ul>
          <li>Cooking Pots</li>
          <li>Pans</li>
          <li>Kettle</li>
        </ul>
      </div>

      <div class="mega-right hidden" id="utensils-sub">
        <h3>Utensils</h3>
        <ul>
          <li>Camping Spoon & Fork</li>
          <li>Multi-tool</li>
          <li>Knives</li>
        </ul>
      </div>
    </div>
    <button class="close-mega" onclick="closeMegaMenu('cookingMenu')">✕</button>
  </div>

  <!-- =============================== SURVIVAL EQUIPMENT =============================== -->
  <div id="survivalMenu" class="mega-menu">
    <div class="mega-content">
      <div class="mega-left">
        <h3>Main Categories</h3>
        <ul>
          <li onclick="showSurvivalSub('fire')">Fire Starters</li>
          <li onclick="showSurvivalSub('tools')">Tools</li>
          <li onclick="showSurvivalSub('firstaid')">First Aid</li>
        </ul>
      </div>

      <div class="mega-right" id="fire-sub">
        <h3>Fire Starters</h3>
        <ul>
          <li>Matches</li>
          <li>Ferro Rod</li>
          <li>Fire Striker</li>
        </ul>
      </div>

      <div class="mega-right hidden" id="tools-sub">
        <h3>Tools</h3>
        <ul>
          <li>Survival Knife</li>
          <li>Hatchet</li>
          <li>Multi-tool</li>
        </ul>
      </div>

      <div class="mega-right hidden" id="firstaid-sub">
        <h3>First Aid</h3>
        <ul>
          <li>First Aid Kit</li>
          <li>Emergency Blanket</li>
          <li>Medical Supplies</li>
        </ul>
      </div>
    </div>
    <button class="close-mega" onclick="closeMegaMenu('survivalMenu')">✕</button>
  </div>

  <!-- =============================== CHATBOT =============================== -->
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

  <!-- =============================== FOOTER =============================== -->
  <footer class="site-footer">
    <div class="footer-top">
      <div class="social-section">
        <p class="follow-text">Follow Us</p>
        <div class="social-icons">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
          <a href="#"><i class="bi bi-tiktok"></i></a>
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
    </div>

    <hr />
    <div class="footer-bottom">
      <small>© 2025 Peak. All rights reserved.</small>
    </div>
  </footer>


  <!-- =============================== SCRIPTS =============================== -->
  <script src="Javascript/JavaScript.js"></script>
  <script src="Javascript/chatbot.js"></script>

</body>

</html>