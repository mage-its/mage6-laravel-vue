<template>
  <div id="start" class="bg">
    <!-- Loader -->
    <loader/>
    <!-- Teks Cerita -->
    <div class="wrapperStart">
      <h2>
        Cerita sejauh ini...
      </h2>
      <p class="mt-9">
        Bumi semakin tua. Kiamat bisa datang kapan saja dengan kondisi bumi dan manusianya yang terus mengeksploitasi bumi. Kekacuan semakin merajalela. Kamu sudah lelah dengan keadaan ini. Dengan kepintaran dan bantuan teknologi, kamu mencari apakah ada planet lain pengganti bumi. Namun pencarian ini tidak mudah. Kamu harus mencari dengan benar karena tidak semua planet layak untuk ditinggali. Selain itu ada oknum tertentu yang terus menghalangimu untuk membuktikan bahwa kehidupan diluar bumi sangatlah mungkin. Apakah kamu akan berhasil menemukan planet yang layak?
      </p>      
      <div class="mt-16">
          <router-link to="/mainmenu"><img :src="backImage" class="backButton" @mouseenter="backImage = assets.back2" @mouseleave="backImage = assets.back1"></router-link>
          <router-link to="/gamenetwork"><img :src="startImage" class="startButton" @mouseenter="startImage = assets.start2" @mouseleave="startImage = assets.start1"></router-link>
      </div>
    </div>
    <!-- Footer -->
    <footer-mage/>
  </div>
</template>

<script>
import Loader from '../penyisihanolim/Loader.vue';
import FooterMage from '../penyisihanolim/Footer.vue';

export default {
  name: 'start',
  components: {
    Loader, FooterMage
  },
  data() {
    return {
      assets: {
        back1: require('../../assets/img/Game/exit1.png'),
        back2: require('../../assets/img/Game/exit2.png'),
        start1: require('../../assets/img/Game/next1.png'),
        start2: require('../../assets/img/Game/next2.png'),
      },
      backImage: undefined,
      startImage: undefined
    }
  },
  beforeMount() {
    // document.body.classList.remove('bg1');
    // document.body.classList.add('bg');
  },
  created() {
    this.backImage = this.assets.back1;
    this.startImage = this.assets.start1;
  }
}
</script>

<style scoped>
/* Teks Cerita */
.wrapperStart{
  display: grid;
  width: 100%;
  justify-content: center;
  align-items: center;
  padding: 5% 15% 10% 15%
}
.wrapperStart h2{
  color: white;
  position: relative;
  /* font-family: airstrike; */
  font-size: calc(20px + 0.5vw);
  text-align: center;
  animation: fadeInUp 1s ease-in;
}
.wrapperStart p{
  color: white;
  position: relative;
  /* font-family: rubik-medium; */
  font-size: calc(10px + 0.5vw);
  text-align: justify;
  animation: fadeIn 2s ease-in;
}
.wrapperStart div{
  display: grid;
  position: relative;
  grid-template-columns: 1fr 1fr;
  animation: fadeIn 2s ease-in;
}
.startButton{
  position: relative;
  width: 10vw;
  min-width: 70px;
  cursor: pointer;
  float: right;
}
.backButton{
  position: relative;
  width: 10vw;
  min-width: 70px;
  cursor: pointer;
  float: left;
}
@keyframes fadeInUp{
  0%{
    opacity: 0;
    visibility: 0;
    transform: translateY(100%)
  }
  100%{
    opacity: 1;
    visibility: 1;
  }
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
.bg{
    display: grid;
    grid-template-rows: 1fr;
    background: url('../../assets/img/Game/bg.png') no-repeat top center;
    background-size: cover;
}
</style>