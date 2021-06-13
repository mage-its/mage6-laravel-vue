<template>
  <div class="wrapperFooter">
    <!-- Kembali ke Dashboard -->
    <router-link to="/dashboard"><img src="../../assets/img/Game/magekuning.png"></router-link>
  </div>
</template>

<script>
export default {
  name: 'footer-mage'
}
</script>

<style scoped>
/* Footer */
.wrapperFooter{
  display: grid;
  position: relative;
  width: 100%;
  justify-content: center;
  align-items: center;
  padding-left: 30%;
  padding-right: 30%;
}
.wrapperFooter img{
  display: block;
  position: relative;
  width: 30vw;
  min-width: 150px;
  margin-left: auto;
  margin-right: auto;
  animation: fadeIn 4s ease-in;
}
@keyframes fadeIn{
  0%{
    opacity: 0;
    visibility: 0;
  }
  50%{
    opacity: 0;
    visibility: 0;
  }
  100%{
    opacity: 1;
    visibility: 1;
  }
}
</style>