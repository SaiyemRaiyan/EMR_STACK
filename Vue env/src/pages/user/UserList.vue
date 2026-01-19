<template>
  <div class="UserListPage">

    <!-- Patient List Container -->
    <div class="container">
      <!-- Enhanced Patient List Box -->
      <div class="patient-list-box">
        <!-- Background Design -->
        <div class="background-design">
          <div class="zigzag-pattern"></div>
          <div class="wave-pattern"></div>
        </div>
        <h2><i class="fas fa-users"></i> List of Patients</h2>
        <p>
          This screen displays patients records. Use the search box to find
          specific patients.
        </p>

        <div class="search-container">
          <input type="text" id="searchByName" placeholder="Search by Name" />
          <select id="searchById">
            <option value="">Search by Patient ID</option>
            <!-- Options will be dynamically populated -->
          </select>
          <button onclick="searchPatients()">
            <i class="fas fa-search"></i> Search
          </button>
          <button class="reset" onclick="resetSearch()">
            <i class="fas fa-redo"></i> Reset
          </button>
        </div>

        <table>
          <thead>
          <tr>
            <th>Patient ID</th>
            <th>EMR ID</th>
            <th>Name</th>
            <th>Father/Husband Name</th>
            <th>District</th>
            <th>Action</th>
            <th>Send</th>
          </tr>
          </thead>
          <tbody id="patientTableBody"></tbody>
        </table>
      </div>

    </div>

    <div class="modal-overlay confirmation-modal" id="confirmationModal">
      <div class="modal-content">
        <div class="modal-icon">
          <i class="fas fa-question-circle"></i>
        </div>
        <h3 class="modal-title">Are you sure?</h3>
        <p class="modal-message">
          You will send the patient to consultation room!
        </p>
        <div class="modal-buttons">
          <button class="modal-btn cancel-btn" onclick="cancelSend()">
            <i class="fas fa-times"></i> No, cancel!
          </button>
          <button class="modal-btn confirm-btn" onclick="confirmSend()">
            <i class="fas fa-paper-plane"></i> Yes, send!
          </button>
        </div>
      </div>
    </div>

    <!-- Success Modal -->
    <div class="modal-overlay success-modal" id="successModal">
      <div class="modal-content">
        <div class="modal-icon">
          <i class="fas fa-check-circle"></i>
        </div>
        <h3 class="modal-title">Successful!!</h3>
        <p class="modal-message">Patient has been sent.</p>
        <div class="modal-buttons">
          <button class="modal-btn ok-btn" onclick="closeSuccessModal()">
            <i class="fas fa-check"></i> OK
          </button>
        </div>
      </div>
    </div>

    <!-- Cancel Modal -->
    <div class="modal-overlay cancel-modal" id="cancelModal">
      <div class="modal-content">
        <div class="modal-icon">
          <i class="fas fa-times-circle"></i>
        </div>
        <h3 class="modal-title">Cancelled!!</h3>
        <p class="modal-message">Patient not sent.</p>
        <div class="modal-buttons">
          <button class="modal-btn ok-btn" onclick="closeCancelModal()">
            <i class="fas fa-check"></i> OK
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserList',

}
</script>

<style scoped>
@import "@/assets/scss/UserList.scss";
</style>