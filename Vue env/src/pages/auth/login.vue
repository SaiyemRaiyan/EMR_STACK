<template>
  <div class="container">
    <!-- Instructions Panel -->
    <div class="instructions">
      <h3><i class="fas fa-info-circle"></i> Login Instructions</h3>
      <p>Please login to access patient's medical records and services.</p>

      <ul>
        <li>
          <i class="fas fa-check-circle" style="color: #4a8f4c"></i> Use your
          registered username and password
        </li>
        <li>
          <i class="fas fa-check-circle" style="color: #4a8f4c"></i> Keep your
          login credentials secure
        </li>
        <li>
          <i class="fas fa-check-circle" style="color: #4a8f4c"></i> Don't
          share your password with anyone
        </li>
      </ul>

      <div class="note-box">
        <p>
          <strong>Note:</strong> Login with Amader Gram username and password.
          If you forget your password, click on "Forgot your password" link
          below the login form.
        </p>
      </div>

      <p>For any login issues, please contact support team.</p>
    </div>

    <!-- Login Box -->
    <div class="login-box">
      <!-- Floating Icons Background -->
      <div class="floating-icons">
        <i
            class="fas fa-heartbeat"
            style="top: 10%; left: 20%; animation-delay: 0s"
        ></i>
        <i
            class="fas fa-stethoscope"
            style="top: 30%; left: 80%; animation-delay: 2s"
        ></i>
        <i
            class="fas fa-hospital"
            style="top: 70%; left: 15%; animation-delay: 4s"
        ></i>
        <i
            class="fas fa-pills"
            style="top: 50%; left: 70%; animation-delay: 1s"
        ></i>
        <i
            class="fas fa-user-md"
            style="top: 80%; left: 60%; animation-delay: 3s"
        ></i>
      </div>

      <h2><i class="fas fa-sign-in-alt"></i> Login</h2>

      <form action="#" method="POST">
        <div class="input-box">
          <input type="text" id="username" name="username" required />
          <label><i class="fas fa-user"></i> Username</label>
        </div>

        <div class="input-box">
          <input type="password" id="password" name="password" required />
          <label><i class="fas fa-lock"></i> Password</label>
        </div>

        <div class="forgot-pass">
          <a href="#"><i class="fas fa-key"></i> Forgot your password?</a>
        </div>

        <button type="submit" class="btn">
          <i class="fas fa-sign-in-alt"></i> Login
        </button>

        <!-- In the login form, replace the signup link with this: -->
        <div class="user-policy-container">
          <a
              href="Guidelines.html"
              class="policy-btn"
              id="policy-btn"
              download="AGCRC_User_Policy.pdf"
          >
            <i class="fas fa-file-download"></i>
            <span>User Policy</span>
          </a>
        </div>
      </form>
    </div>
  </div>
</template>

<script>

export default {
  name: 'LoginComponent',

  data() {
    return {

    }
  },
  mounted() {
  },

  methods: {

  }




}
</script>


<style scoped>
@import "@/assets/scss/login.scss";
</style>