<template>
  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="logo">
      <button class="toggle-btn" id="toggleBtn">
        <i class="fas fa-chevron-left"></i>
      </button>
      <h2>EMR Admin</h2>
    </div>
    <ul class="nav-links">
      <li>
        <a href="Guidelines.html"><i class="fas fa-book-medical"></i> User Policy</a
        >
      </li>
      <li>
        <router-link :to="'/dashboard'"><i class="fas fa-home"></i> <span>Dashboard</span></router-link>
      </li>
      <li>
        <a href="#" class="patient-menu">
          <i class="fas fa-user-injured"></i> <span>Patients</span>
          <i class="fas fa-chevron-down dropdown-arrow"></i>
        </a>
        <ul class="submenu">
          <li>
            <a href="registration.html"
            ><i class="fas fa-plus-circle"></i>
              <span>Add patient (Form)</span></a
            >
          </li>
          <li>
            <a href="patients.html"
            ><i class="fas fa-search"></i> <span>Find patient</span></a
            >
          </li>
        </ul>
      </li>
      <li>
        <a href="admin.html"
        ><i class="fas fa-stethoscope"></i> <span>Consultations</span></a
        >
      </li>
      <li>
        <a href="laboratory.html"
        ><i class="fas fa-calendar-check"></i> <span>Laboratory</span></a
        >
      </li>
      <li>
        <a href="#"><i class="fas fa-pills"></i> <span>Drug</span></a>
      </li>
      <li>
        <a href="#"
        ><i class="fas fa-file-medical"></i> <span>Reports</span></a
        >
      </li>
      <li>
        <a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a>
      </li>
      <li>
        <a href="#" id="sidebarLogout"
        ><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a
        >
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'SideBar',

  methods: {

  }
}
</script>

<style scoped>

</style>
