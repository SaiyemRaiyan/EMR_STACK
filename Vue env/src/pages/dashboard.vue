<template>
  <!-- Dashboard Container -->
  <div class="dashboard-container">
    <!-- Dashboard Main Card -->
    <div class="dashboard-card">
      <!-- Background Design -->
      <div class="background-design">
        <div class="zigzag-pattern"></div>
        <div class="wave-pattern"></div>
      </div>

      <!-- Dashboard Header -->
      <div class="dashboard-header">
        <h3><i class="fas fa-home"></i> Dashboard Overview</h3>
        <p>Welcome to your healthcare management dashboard</p>
      </div>

      <!-- Dashboard Content -->
      <div class="dashboard-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
          <div class="welcome-box">
            <h4>
              <i class="fas fa-hand-sparkles"></i> Welcome to AGCRC EMR
              Dashboard
            </h4>
            <p>
              Welcome to the AGCRC Electronic Medical Record System. This
              platform allows healthcare professionals to efficiently manage
              patient records and provide quality care.
            </p>
            <p>
              Use the action buttons below to navigate through the system
              and perform essential tasks. Monitor your key metrics and stay
              updated with recent activities.
            </p>
          </div>

          <div class="welcome-box quick-info-box">
            <h4><i class="fas fa-info-circle"></i> Quick Information</h4>
            <ul class="quick-info-list">
              <li><i class="fas fa-clock"></i> System Status: Online</li>
              <li><i class="fas fa-database"></i> Total Records: 8,452</li>
              <li><i class="fas fa-users"></i> Active Staff: 42</li>
              <li>
                <i class="fas fa-calendar"></i> Today's Date:
                <span id="currentDate"></span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Statistics Section -->
        <div class="stats-section">
          <h4><i class="fas fa-chart-line"></i> Key Statistics</h4>
          <div class="stats-grid">
            <div class="stat-card" id="total-patients">
              <i class="fas fa-user-injured"></i>
              <h5>Total Patients</h5>
              <div class="stat-value">1,247</div>
              <div class="stat-trend positive">+12% this month</div>
            </div>
            <div class="stat-card" id="today-appointments">
              <i class="fas fa-calendar-check"></i>
              <h5>Today's Appointments</h5>
              <div class="stat-value">24</div>
              <div class="stat-trend positive">+3 from yesterday</div>
            </div>
            <div class="stat-card" id="pending-tests">
              <i class="fas fa-flask"></i>
              <h5>Pending Tests</h5>
              <div class="stat-value">18</div>
              <div class="stat-trend negative">-2 from last week</div>
            </div>
            <div class="stat-card" id="medical-staff">
              <i class="fas fa-user-md"></i>
              <h5>Medical Staff</h5>
              <div class="stat-value">42</div>
              <div class="stat-trend positive">+5 this year</div>
            </div>
          </div>
        </div>

        <!-- Quick Actions Section -->
        <div class="actions-section">
          <h4><i class="fas fa-bolt"></i> Quick Actions</h4>
          <div class="actions-grid">
            <a href="patients.html" class="action-btn">
              <i class="fas fa-user-injured"></i>
              Registered Patient List
            </a>
            <a href="registration.html" class="action-btn">
              <i class="fas fa-user-plus"></i>
              New Patient Registration
            </a>
            <a href="admin.html" class="action-btn">
              <i class="fas fa-stethoscope"></i>
              Consultation Room
            </a>
          </div>
        </div>

        <!-- Recent Activity -->
        <div class="activity-section">
          <h4><i class="fas fa-history"></i> Recent Activity</h4>
          <div class="activity-list">
            <div class="activity-item">
              <div class="activity-icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <div class="activity-details">
                <h5>New Patient Registration</h5>
                <p>Mr. James Kapondera registered in the system</p>
              </div>
              <div class="activity-time">10:30 AM</div>
            </div>
            <div class="activity-item">
              <div class="activity-icon">
                <i class="fas fa-file-medical"></i>
              </div>
              <div class="activity-details">
                <h5>Medical Report Updated</h5>
                <p>Miss Glory Bandarve's health status updated</p>
              </div>
              <div class="activity-time">09:15 AM</div>
            </div>
            <div class="activity-item">
              <div class="activity-icon">
                <i class="fas fa-prescription"></i>
              </div>
              <div class="activity-details">
                <h5>Prescription Created</h5>
                <p>New prescription issued for Mr. Maxwell Banda</p>
              </div>
              <div class="activity-time">Yesterday</div>
            </div>
            <div class="activity-item">
              <div class="activity-icon">
                <i class="fas fa-calendar-check"></i>
              </div>
              <div class="activity-details">
                <h5>Appointment Scheduled</h5>
                <p>
                  Follow-up appointment scheduled for Mrs. Sarah Johnson
                </p>
              </div>
              <div class="activity-time">Yesterday</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'DashboardComponent',

}
</script>

<style scoped>
@import "@/assets/scss/dashboard.scss";
</style>