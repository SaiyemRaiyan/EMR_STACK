<template>
  <div id="mainBody">
    <div class="loginPage">
      <!-- Page Header -->
      <div class="form-header">
        <div class="header-container">
          <div class="logo-title-container">
            <img src="@/assets/images/logo.png" alt="AGCRC Logo" class="header-logo" />
            <h1 class="agcrc-title">AMADER GRAM CANCER CARE & RESEARCH CENTER</h1>
          </div>
          <div class="emr-badge">
            <h2 class="emr-system">
              <i class="fas fa-shield-alt"></i> Electronic Medical Record (EMR)
              System
            </h2>
          </div>
        </div>
      </div>
      <!-- 3D Bubbles Background -->
      <div class="animated-bg" id="animated-bg"></div>
      <!-- Main Container -->
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AuthLayout',

  data() {
    return {

    }
  },

  mounted() {
    this.createBubbles()
  },

  beforeUnmount() {
    // Cleanup bubbles
    if (this.$refs.animatedBg) {
      this.$refs.animatedBg.innerHTML = ''
    }
  },

  methods: {
    createBubbles() {
      const animatedBg = this.$refs.animatedBg
      if (!animatedBg) return

      const bubbleCount = 15
      animatedBg.innerHTML = '' // clear existing bubbles

      for (let i = 0; i < bubbleCount; i++) {
        const bubble = document.createElement('span')
        const size = Math.random() * 100 + 50
        const posX = Math.random() * 100
        const delay = Math.random() * 15
        const duration = Math.random() * 20 + 10

        bubble.style.width = bubble.style.height = `${size}px`
        bubble.style.left = `${posX}%`
        bubble.style.bottom = `-${size}px`
        bubble.style.animationDelay = `${delay}s`
        bubble.style.animationDuration = `${duration}s`
        bubble.style.opacity = Math.random() * 0.5 + 0.1
        bubble.style.background = `rgba(210, 255, 210, ${Math.random() * 0.3 + 0.2})`
        bubble.style.position = 'absolute'
        bubble.style.borderRadius = '50%'
        bubble.style.pointerEvents = 'none'

        animatedBg.appendChild(bubble)
      }
    }
  }


}
</script>

<style scoped>
</style>
