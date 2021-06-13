<template>
  <div class="wrapperLoader">
    <span class="loader" :class="{hidden: isLoaderHidden}"><img src="../../assets/img/Game/mageputih1.png"></span>
  </div>
</template>

<script>
export default {
  name: 'loader',
  data() {
    return {
      isLoaderHidden: undefined
    }
  },
  mounted() {
    this.isLoaderHidden = true;
  }
}
</script>

<style scoped>
/* Loader */
.wrapperLoader img{
  position: fixed;
  top: 50%;
  left: 50%;
  height: 50px;
  width: 50px;
  margin-top: -25px;
  margin-left: -25px;
}
.loader:before{
  content: "";
  box-sizing: border-box;
  position: fixed;
  top: 50%;
  left: 50%;
  height: 100px;
  width: 100px;
  margin-top: -50px;
  margin-left: -50px;
  border-radius: 50%;
  border-top: 5px solid white;
  border-right: solid transparent;
  animation: spinner 0.7s ease infinite;
}
.loader.hidden{
  animation: fadeOut 1s;
  animation-fill-mode: forwards;
}
@keyframes spinner{
  to{
    transform: rotate(360deg);
  }
}
@keyframes fadeOut{
    100%{
        opacity: 0;
        visibility: hidden;
    }
}
</style>