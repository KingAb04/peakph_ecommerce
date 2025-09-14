let currentIndex = 0;
const slides = document.querySelectorAll(".slide");
const slidesContainer = document.getElementById("slides");
const totalSlides = slides.length;
let autoSlideInterval;

// ===== Hero Section Slider =====
function moveSlide(direction) {
  currentIndex += direction;
  if (currentIndex < 0) currentIndex = totalSlides - 1;
  if (currentIndex >= totalSlides) currentIndex = 0;
  updateSlidePosition();
}

function updateSlidePosition() {
  slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function startAutoSlide() {
  autoSlideInterval = setInterval(() => moveSlide(1), 5000);
}

function stopAutoSlide() {
  clearInterval(autoSlideInterval);
}

document.addEventListener("DOMContentLoaded", () => {
  startAutoSlide();
  const hero = document.querySelector(".hero");
  hero?.addEventListener("mouseenter", stopAutoSlide);
  hero?.addEventListener("mouseleave", startAutoSlide);
});

// ===== Mid Gallery Section =====
document.addEventListener("DOMContentLoaded", () => {
  let galleryIndex = 0;
  const galleryTrack = document.getElementById("gallery-track");
  const galleryItems = document.querySelectorAll(".gallery-item");

  function getItemWidth() {
    return galleryItems[0].offsetWidth + 10;
  }

  function getVisibleItems() {
    return Math.floor(document.querySelector(".mid-gallery").offsetWidth / getItemWidth());
  }

  function moveGallery(direction) {
    const maxIndex = galleryItems.length - getVisibleItems();
    galleryIndex += direction;
    if (galleryIndex < 0) galleryIndex = 0;
    if (galleryIndex > maxIndex) galleryIndex = maxIndex;
    galleryTrack.style.transform = `translateX(-${galleryIndex * getItemWidth()}px)`;
  }

  document.querySelector(".gallery-arrow.prev")?.addEventListener("click", () => moveGallery(-1));
  document.querySelector(".gallery-arrow.next")?.addEventListener("click", () => moveGallery(1));

  setInterval(() => {
    const maxIndex = galleryItems.length - getVisibleItems();
    galleryIndex = (galleryIndex < maxIndex) ? galleryIndex + 1 : 0;
    galleryTrack.style.transform = `translateX(-${galleryIndex * getItemWidth()}px)`;
  }, 3000);
});

// ===== Modal Manager (Login & Signup) =====
const ModalManager = (() => {
  const loginModal = document.getElementById("authModal");
  const signupModal = document.getElementById("signupModal");
  const loginIcon = document.getElementById("loginIcon");
  const closeLogin = document.getElementById("closeModal");
  const closeSignup = document.getElementById("closeSignup");
  const toSignup = document.querySelector('.login-left p.signup-text a');
  const toLogin = document.getElementById("toLogin");
  const loginError = loginModal?.querySelector(".login-error");
  const signupAlert = document.getElementById("signupAlert");

  const openModal = (modal) => modal.style.display = "flex";
  const closeModal = (modal) => {
    modal.style.display = "none";
    modal.querySelectorAll("input").forEach(input => input.value = "");
    if (modal === loginModal && loginError) loginError.textContent = "";
    if (modal === signupModal && signupAlert) signupAlert.textContent = "";
  };

  const init = () => {
    loginIcon?.addEventListener("click", () => openModal(loginModal));
    closeLogin?.addEventListener("click", () => closeModal(loginModal));
    closeSignup?.addEventListener("click", () => closeModal(signupModal));

    toSignup?.addEventListener("click", (e) => { e.preventDefault(); closeModal(loginModal); openModal(signupModal); });
    toLogin?.addEventListener("click", (e) => { e.preventDefault(); closeModal(signupModal); openModal(loginModal); });

    [loginModal, signupModal].forEach(modal => {
      modal?.addEventListener("click", (e) => { if (e.target === modal) closeModal(modal); });
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") [loginModal, signupModal].forEach(modal => modal?.style.display === "flex" && closeModal(modal));
    });

    // Signup form submission
    const signupForm = document.getElementById("signupForm");
    signupForm?.addEventListener("submit", (e) => {
      e.preventDefault();
      signupAlert.textContent = "";
      const formData = new FormData(signupForm);

      fetch("register.php", { method: "POST", body: formData })
        .then(res => res.json())
        .then(data => {
          signupAlert.style.color = data.success ? "green" : "red";
          signupAlert.textContent = data.message;
          if (data.success) {
            setTimeout(() => { closeModal(signupModal); location.reload(); }, 1500);
          }
        })
        .catch(err => {
          signupAlert.style.color = "red";
          signupAlert.textContent = "An error occurred. Try again.";
          console.error(err);
        });
    });
  };

  return { init };
})();

document.addEventListener("DOMContentLoaded", () => ModalManager.init());

// ===== Other UI Elements =====
document.querySelectorAll('.password-field i').forEach(eyeIcon => {
  eyeIcon.addEventListener('click', () => {
    const input = eyeIcon.previousElementSibling;
    if (input.type === 'password') {
      input.type = 'text';
      eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
      input.type = 'password';
      eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
    }
  });
});

// ===== Mega Menus =====
const setupMegaMenu = (linkSelector, menuId) => {
  document.querySelector(linkSelector)?.addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById(menuId).style.display = 'flex';
  });
};

setupMegaMenu('a[href="/tents-tarpaulins"]', 'tentMenu');
setupMegaMenu('a[href="/Cooking Equipment"]', 'cookingMenu');
setupMegaMenu('a[href="/Survival Equipment"]', 'survivalMenu');

function showSubMenu(menuId, category) {
  document.querySelectorAll(`#${menuId} .mega-right`).forEach(el => el.classList.add('hidden'));
  document.getElementById(category + '-sub')?.classList.remove('hidden');
}

function closeMegaMenu(menuId) {
  document.getElementById(menuId).style.display = 'none';
}

document.querySelectorAll('.mega-menu').forEach(menu => {
  menu.addEventListener('click', e => { if (e.target === menu) menu.style.display = 'none'; });
});

// ===== Toast Notification =====
document.addEventListener('DOMContentLoaded', () => {
  const toast = document.getElementById('toast');
  if (!toast) return;
  toast.classList.add('show');
  setTimeout(() => { toast.classList.add('hide'); toast.classList.remove('show'); }, 3000);
  toast.addEventListener('transitionend', () => { if (toast.classList.contains('hide')) toast.remove(); });
});
