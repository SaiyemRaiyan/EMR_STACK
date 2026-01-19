<template>
  <div class="user-info-container">
    <div class="user-dropdown">
      <div class="user-dropdown-btn">
        <i class="fas fa-user-md"></i>
        <span class="user-name" id="userName">Dr. Patrick Mvuma</span>
        <i class="fas fa-chevron-down"></i>
      </div>
      <div class="user-dropdown-content">
        <a href="#" id="logoutBtn">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PageUserInfo',

}
</script>

<style scoped>
</style>
