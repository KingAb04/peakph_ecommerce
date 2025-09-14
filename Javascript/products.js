// Array of product objects
const products = [
  {
    name: "4-Person Dome Tent",
    image: "Assets/Products/tent.jpg",
    currentPrice: 120,
    originalPrice: 150,
    rating: 3.5,
    reviews: 45
  },
  {
    name: "50L Hiking Backpack",
    image: "Assets/Products/backpack.jpg",
    currentPrice: 85,
    originalPrice: 99,
    rating: 4,
    reviews: 30
  },
  {
    name: "Portable Camping Stove",
    image: "Assets/Products/stove.jpg",
    currentPrice: 45,
    originalPrice: 60,
    rating: 3.5,
    reviews: 18
  },
  {
    name: "Portable Camping Stove",
    image: "Assets/Products/stove.jpg",
    currentPrice: 45,
    originalPrice: 60,
    rating: 3.5,
    reviews: 18
  },
  {
    name: "Portable Camping Stove",
    image: "Assets/Products/stove.jpg",
    currentPrice: 45,
    originalPrice: 60,
    rating: 3.5,
    reviews: 18
  },
  {
    name: "Portable Camping Stove",
    image: "Assets/Products/stove.jpg",
    currentPrice: 45,
    originalPrice: 60,
    rating: 3.5,
    reviews: 18
  },
  {
    name: "Portable Camping Stove",
    image: "Assets/Products/stove.jpg",
    currentPrice: 45,
    originalPrice: 60,
    rating: 3.5,
    reviews: 18
  },
  
];

// Function to render stars based on rating
function renderStars(rating) {
  let starsHTML = '';
  for (let i = 1; i <= 5; i++) {
    if (i <= Math.floor(rating)) {
      starsHTML += '<i class="fa fa-star"></i>';
    } else if (i - rating < 1) {
      starsHTML += '<i class="fa fa-star-half"></i>';
    } else {
      starsHTML += '<i class="fa fa-star-o"></i>';
    }
  }
  return starsHTML;
}

// Function to generate product cards
function displayProducts() {
  const grid = document.getElementById('productsGrid');
  products.forEach(product => {
    const card = document.createElement('div');
    card.className = 'product-card';
    card.innerHTML = `
      <div class="product-image">
        <img src="${product.image}" alt="${product.name}">
      </div>
      <div class="product-info">
        <div class="product-rating">
          ${renderStars(product.rating)}
          <span class="count">(${product.reviews})</span>
        </div>
        <h3>${product.name}</h3>
        <div class="product-price">
          <span class="current-price">$${product.currentPrice}</span>
          <span class="original-price">$${product.originalPrice}</span>
        </div>
        <button class="add-to-cart"><i class="fa fa-cart-plus"></i>Add to Cart</button>
      </div>
    `;
    grid.appendChild(card);
  });
}

// Initialize
displayProducts();
