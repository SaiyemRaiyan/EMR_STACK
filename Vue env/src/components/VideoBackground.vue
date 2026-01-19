<template>
  <div class="video-background">
    <video autoplay muted loop playsinline id="bgVideo">
      <source src="@/assets/videos/bg.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <div class="video-overlay"></div>
  </div>
</template>

<script>
export default {
  name: 'VideoBackground',

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#bgVideo {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -1;
}

</style>
