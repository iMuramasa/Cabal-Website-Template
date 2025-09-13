// Main JavaScript functionality for Cabal Online website

// Modal functions
function openModal(modalId) {
    const modal = document.getElementById(modalId + '-modal');
    if (modal) {
        modal.classList.add('modal--active');
        document.body.classList.add('modal-open');
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId + '-modal');
    if (modal) {
        modal.classList.remove('modal--active');
        document.body.classList.remove('modal-open');
    }
}

function switchModal(newModalId) {
    document.querySelectorAll('.modal').forEach(modal => {
        modal.classList.remove('modal--active');
    });
    setTimeout(() => openModal(newModalId), 100);
}

// Demo login function
function demoLogin() {
    showLoginAnimation();
    setTimeout(() => {
        submitLogin('DemoPlayer', 'demo123');
    }, 1000);
}

// Login animation
function showLoginAnimation() {
    const modal = document.querySelector('.modal--active .modal__content');
    if (modal) {
        modal.style.opacity = '1';
        modal.style.transform = 'scale(1)';
        modal.style.boxShadow = '0 8px 32px rgba(212, 169, 51, 0.3)';
        modal.innerHTML = `
            <div style="text-align:center;padding:40px;background:linear-gradient(180deg,var(--panel),rgba(15,23,32,0.95));border-radius:12px;">
                <div class="loading-spinner"></div>
                <h3 style="margin:20px 0 10px;color:var(--accent-2);text-shadow:0 2px 10px rgba(212, 169, 51, 0.3);">Logging in...</h3>
                <p style="color:var(--muted);">Welcome to Cabal Online!</p>
            </div>
        `;
    }
}

// Submit login data
function submitLogin(username, password) {
    fetch('includes/auth.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=login&username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const modal = document.querySelector('.modal--active .modal__content');
            if (modal) {
                modal.style.boxShadow = '0 8px 32px rgba(42, 168, 79, 0.3)';
                modal.innerHTML = `
                    <div style="text-align:center;padding:40px;background:linear-gradient(180deg,var(--panel),rgba(15,23,32,0.95));border-radius:12px;">
                        <i class="fas fa-check-circle" style="font-size:48px;color:var(--success);margin-bottom:16px;text-shadow:0 2px 10px rgba(42, 168, 79, 0.3);"></i>
                        <h3 style="margin:0 0 10px;color:var(--success);text-shadow:0 2px 10px rgba(42, 168, 79, 0.2);">Login successful!</h3>
                        <p style="color:var(--muted);">Redirecting to cabinet...</p>
                    </div>
                `;
            }
            
            setTimeout(() => {
                document.body.classList.remove('modal-open');
                document.querySelectorAll('.modal').forEach(modal => {
                    modal.classList.remove('modal--active');
                });
                window.location.href = data.redirect;
            }, 1500);
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Login error occurred');
    });
}

// Logout function
function logout() {
    openModal('logout');
}

// Confirm logout
function confirmLogout() {
    const modal = document.querySelector('#logout-modal .modal__content');
    if (modal) {
        modal.innerHTML = `
            <div style="text-align:center;padding:40px;background:linear-gradient(180deg,var(--panel),rgba(15,23,32,0.95));border-radius:12px;">
                <div class="loading-spinner"></div>
                <h3 style="margin:20px 0 10px;color:var(--danger);text-shadow:0 2px 10px rgba(224, 75, 75, 0.3);">Logging out...</h3>
                <p style="color:var(--muted);">Goodbye!</p>
            </div>
        `;
    }
    
    setTimeout(() => {
        fetch('includes/auth.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=logout'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }, 1000);
}

// Registration animation
function showRegisterAnimation() {
    const modal = document.querySelector('.modal--active .modal__content');
    if (modal) {
        modal.style.boxShadow = '0 8px 32px rgba(212, 169, 51, 0.3)';
        modal.innerHTML = `
            <div style="text-align:center;padding:40px;background:linear-gradient(180deg,var(--panel),rgba(15,23,32,0.95));border-radius:12px;">
                <div class="loading-spinner"></div>
                <h3 style="margin:20px 0 10px;color:var(--accent-2);text-shadow:0 2px 10px rgba(212, 169, 51, 0.3);">Creating account...</h3>
                <p style="color:var(--muted);">Welcome to Cabal Online!</p>
            </div>
        `;
    }
}

// Submit registration data
function submitRegistration(username, email, password) {
    setTimeout(() => {
        const modal = document.querySelector('.modal--active .modal__content');
        if (modal) {
            modal.style.boxShadow = '0 8px 32px rgba(42, 168, 79, 0.3)';
            modal.innerHTML = `
                <div style="text-align:center;padding:40px;background:linear-gradient(180deg,var(--panel),rgba(15,23,32,0.95));border-radius:12px;">
                    <i class="fas fa-user-check" style="font-size:48px;color:var(--success);margin-bottom:16px;text-shadow:0 2px 10px rgba(42, 168, 79, 0.3);"></i>
                    <h3 style="margin:0 0 10px;color:var(--success);text-shadow:0 2px 10px rgba(42, 168, 79, 0.2);">Account created!</h3>
                    <p style="color:var(--muted);">You can now login</p>
                </div>
            `;
        }
        
        setTimeout(() => {
            closeModal('register');
            setTimeout(() => {
                openModal('login');
                const loginUser = document.getElementById('login-user');
                if (loginUser) loginUser.value = username;
            }, 200);
        }, 2000);
    }, 1000);
}

// DOM initialization
document.addEventListener('DOMContentLoaded', function() {
    // Close modal on background click
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal')) {
            e.target.classList.remove('modal--active');
            document.body.classList.remove('modal-open');
        }
    });
    
    // User menu
    const userToggle = document.getElementById('user-toggle');
    const userDropdown = document.getElementById('user-dropdown');
    
    if (userToggle && userDropdown) {
        userToggle.addEventListener('click', function(e) {
            e.preventDefault();
            userDropdown.classList.toggle('user-menu__dropdown--active');
        });
        
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.user-menu')) {
                userDropdown.classList.remove('user-menu__dropdown--active');
            }
        });
    }
    
    // Cabinet navigation
    const cabinetNavItems = document.querySelectorAll('.cabinet-nav__item');
    const cabinetSections = document.querySelectorAll('.cabinet__section');
    
    cabinetNavItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            
            cabinetNavItems.forEach(nav => nav.classList.remove('cabinet-nav__item--active'));
            this.classList.add('cabinet-nav__item--active');
            
            cabinetSections.forEach(section => section.classList.remove('cabinet__section--active'));
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.classList.add('cabinet__section--active');
            }
        });
    });
    
    // Rules navigation
    const rulesNavLinks = document.querySelectorAll('.rules-nav-link');
    const ruleSections = document.querySelectorAll('.rule-section');
    
    rulesNavLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            
            rulesNavLinks.forEach(nav => nav.classList.remove('rules-nav-link--active'));
            this.classList.add('rules-nav-link--active');
            
            ruleSections.forEach(section => section.classList.remove('rule-section--active'));
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.classList.add('rule-section--active');
            }
        });
    });
    
    // Login form
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('login-user').value;
            const password = document.getElementById('login-pass').value;
            
            if (username && password) {
                showLoginAnimation();
                setTimeout(() => {
                    submitLogin(username, password);
                }, 1000);
            } else {
                alert('Please fill in all fields');
            }
        });
    }
    
    // Registration form
    const registerForm = document.getElementById('reg-form');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('reg-user').value;
            const email = document.getElementById('reg-email').value;
            const password = document.getElementById('reg-pass').value;
            const confirmPassword = document.getElementById('reg-pass-confirm').value;
            
            if (username && email && password && confirmPassword) {
                if (password === confirmPassword) {
                    showRegisterAnimation();
                    setTimeout(() => {
                        submitRegistration(username, email, password);
                    }, 1500);
                } else {
                    alert('Passwords do not match');
                }
            } else {
                alert('Please fill in all fields');
            }
        });
    }
});
