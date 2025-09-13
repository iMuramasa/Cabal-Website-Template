<?php
/**
 * Modals Component - Login, registration, and logout confirmation modals
 */
?>

<!-- LOGIN MODAL -->
<div id="login-modal" class="modal">
    <div class="modal__content">
        <button class="modal__close" onclick="closeModal('login')">
            <i class="fas fa-times"></i>
        </button>
        <div class="modal__header">
            <h2>Login to Account</h2>
            <p>Welcome back to Cabal Online</p>
        </div>
        <form class="form" id="login-form">
            <div class="form__field">
                <label class="form__label" for="login-user">Username or Email</label>
                <input class="form__input" id="login-user" type="text" placeholder="Enter username or email" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="login-pass">Password</label>
                <input class="form__input" id="login-pass" type="password" placeholder="Enter password" required>
            </div>
            <div class="form__footer" style="justify-content:space-between;">
                <div class="small">
                    Don't have an account?
                    <a href="#" onclick="switchModal('register');return false;" style="color:var(--accent);">Register</a>
                </div>
                <div>
                    <button type="submit" class="btn btn--primary">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- REGISTER MODAL -->
<div id="register-modal" class="modal">
    <div class="modal__content">
        <button class="modal__close" onclick="closeModal('register')">
            <i class="fas fa-times"></i>
        </button>
        <div class="modal__header">
            <h2>Create Account</h2>
            <p>Join the Cabal Online community</p>
        </div>
        <form class="form" id="reg-form">
            <div class="form__field">
                <label class="form__label" for="reg-user">Username</label>
                <input class="form__input" id="reg-user" type="text" placeholder="Choose a username" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="reg-email">Email</label>
                <input class="form__input" id="reg-email" type="email" placeholder="your@email.com" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="reg-pass">Password</label>
                <input class="form__input" id="reg-pass" type="password" placeholder="Minimum 6 characters" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="reg-pass-confirm">Confirm Password</label>
                <input class="form__input" id="reg-pass-confirm" type="password" placeholder="Repeat password" required>
            </div>
            <div class="form__footer" style="justify-content:space-between;">
                <div class="agreement-checkbox">
                    <label class="checkbox-label">
                        <input type="checkbox" id="agree" required class="checkbox-input">
                        <span class="checkbox-custom"></span>
                        <span class="checkbox-text">I agree with <a href="/?page=rules" target="_blank" style="color:var(--accent);">rules</a></span>
                    </label>
                </div>
                <div>
                    <button type="reset" class="btn btn--ghost">Reset</button>
                    <button type="submit" class="btn btn--primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- LOGOUT CONFIRMATION MODAL -->
<div id="logout-modal" class="modal">
    <div class="modal__content" style="max-width:400px;">
        <div class="modal__header">
            <h2>Logout Confirmation</h2>
            <p>Do you really want to logout?</p>
        </div>
        <div class="logout-confirmation">
            <div class="form__footer" style="justify-content:center;gap:16px;margin-top:24px;">
                <button type="button" class="btn btn--ghost" onclick="closeModal('logout')">Cancel</button>
                <button type="button" class="btn btn--danger" onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </div>
    </div>
</div>