<template>
  <div id="mainBody">
    <div class="dashboardPage">
      <!-- Video Background -->
      <VideoBackground />
      <!-- Sidebar -->
      <SideBar />
      <!-- Main Content -->
      <div class="main-content" id="mainContent">
        <!-- User Info Dropdown - Positioned at top right of page -->
        <PageUserInfo />
        <!-- Page Header -->
        <PageHeader />

        <router-view></router-view>

        <!-- Footer -->
        <div class="footer">
          <p><i class="fas fa-copyright"></i> Design and Developed by AGCRC</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SideBar from "@/components/Sidebar.vue";
import VideoBackground from "@/components/VideoBackground.vue";
import PageHeader from "@/components/PageHeader.vue";
import PageUserInfo from "@/components/PageUserInfo.vue";

export default {
  name: 'AuthLayout',
  components: {PageUserInfo, PageHeader, VideoBackground, SideBar},

}
</script>

<style scoped>
</style>
