<template>
  <div id="home" class="bg1">
    <!-- Loader -->
    <loader/>
    <!-- Logo Judul -->
    <div class="wrapperLogo">
      <img src="../../assets/img/Game/logoolimpiade.png" class="logo1">
    </div>
    <!-- Tombol -->
    <div class="wrapperMain">
      <router-link to="/gamestart"><img :src="playImage" class="playButton" @mouseenter="playImage = assets.play2" @mouseleave="playImage = assets.play1"></router-link>
      <img :src="rulesImage" class="rulesButton" @mouseenter="rulesImage = assets.rules2" @mouseleave="rulesImage = assets.rules1" @click="activeModal">
    </div>
    <!-- Modal Peraturan -->
    <div class="rulesModal-bg" :class="{bgActive: isModalActive, bgInactive: !isModalActive}">
      <div class="rulesModal">
        <h2>Peraturan Olimpiade</h2>
        <p class="mt-9">
          <ol>
            <li>Waktu pengerjaan soal adalah 120 menit atau 2 jam</li>
            <li>Peserta dilarang bertanya apapun mengenai soal kepada panitia</li>
            <li>Peserta dilarang meretas website MAGE 6</li>
            <li>Peserta yang terlambat dalam mengerjakan soal tidak akan mendapatkan tambahan waktu</li>
            <li>Peserta hanya diperbolehkan bekerja sama dengan anggota tim</li>
            <li>Jika terjadi kesalahan yang disebabkan oleh sistem maka peseta berhak mendapatkan tambahan waktu</li>
            <li>Format jawaban yang diterima adalah sebagai berikut :
              <ul>
                <li>Angka desimal menggunakan titik. Contoh: 2.5</li>
                <li>Isian tidak menggunakan spasi</li>
              </ul>
            </li>
            <li>Jika menemukan kendala teknis hubungi 082230469774 - adhisti</li>            
          </ol>
        </p>
        <img class="mt-7" :src="exitImage" @mouseenter="exitImage = assets.exit2" @mouseleave="exitImage = assets.exit1" @click="inactiveModal">
      </div>
    </div>
    <!-- Footer -->
    <footer-mage/>
  </div>
</template>

<script>
// @ is an alias to /src
import Loader from '../penyisihanolim/Loader.vue';
import FooterMage from '../penyisihanolim/Footer.vue';

export default {
  name: 'MainMenu',
  components: {
    Loader, FooterMage
  },
  data() {
    return {
      assets: {
        play1: require('../../assets/img/Game/play1.png'),
        play2: require('../../assets/img/Game/play2.png'),
        rules1: require('../../assets/img/Game/rules1.png'),
        rules2: require('../../assets/img/Game/rules2.png'),
        exit1: require('../../assets/img/Game/exit1.png'),
        exit2: require('../../assets/img/Game/exit2.png')
      },
      playImage: undefined,
      rulesImage: undefined,
      exitImage: undefined,
      isModalActive: false
    }
  },
  methods: {
    activeModal() {
      this.isModalActive = true;
    },
    inactiveModal() {
      this.isModalActive = false;
    }
  },
  beforeMount() {
    // document.body.classList.remove('bg');
    // document.body.classList.add('bg1');
  },
  created() {
    this.playImage = this.assets.play1;
    this.rulesImage = this.assets.rules1;
    this.exitImage = this.assets.exit1;
  }
}
</script>

<style scoped>
/* Logo Judul */
.wrapperLogo{
  display: grid;
  width: 100%;
  justify-content: center;
  align-items: center;
  text-align: center;
  padding: 15% 0% 10% 0;
}
.logo1{
  display: block;
  position: relative;
  max-width: 600px;
  width: 100%;
  animation: fadeInUp 1s ease-in;
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

/* Tombol */
.wrapperMain{
  display: grid;
  grid-template-rows: 1fr 1fr;
  grid-row-gap: 50px;
  position: relative;
  width: 100%;
  justify-content: center;
  align-items: center;
  text-align: center;
  padding: 0% 0% 20% 0;
  transition: 0.5s;
}
.playButton{
  position: relative;
  /* width: 35vw; */
  min-width: 200px;
  cursor: pointer;
  animation: fadeIn 2s ease-in;
}
.rulesButton{
  position: relative;
  width: 10vw;
  min-width: 50px;
  margin-left: auto;
  margin-right: auto;
  margin-top: auto;
  margin-bottom: auto;
  cursor: pointer;
  animation: fadeIn 2s ease-in;
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

/* Modal Peraturan */
.rulesModal-bg{
  position: fixed;
  background: none;
  width: 100%;
  height: 100vh;
  top: -10%;
  left: 0;
  transform: translate(0, -50%);
  display: flex;
  justify-content: center;
  align-items: center;
  visibility: hidden;
  transition: visibility 0.5s, opacity 0.5s;
}
.rulesModal{
  display: grid;
  grid-template-rows: 1fr;
  position: relative;
  background-color: rgba(0, 0, 0, 0.8);
  padding: 40px 40px 40px 40px;
  width: 80vw;
  height: 70vh;
  justify-content: center;
  align-items: center;
  overflow: auto;
  white-space: pre-line;
}
.rulesModal h2{
  display: inline-block;
  position: relative;
  opacity: 1;
  color: white;
  text-align: center;
  /* font-family: rubik-regular; */
  font-size: calc(16px + 0.5vw);
}
.rulesModal p{
  display: inline-block;
  position: relative;
  opacity: 1;
  color: white;
  text-align: justify;
  /* font-family: rubik-regular; */
  font-size: calc(8px + 0.5vw);
}
.rulesModal img{
  display: block;
  width: 10vw;
  min-width: 65px;
  opacity: 1;
  position: relative;
  cursor: pointer;
  margin-left: auto;
  margin-right: auto;
  padding-bottom: 40px;
}
.rulesModalButton{
  background: none;
  border: none;
}
.bgActive{
  visibility: visible;
  top: 50%;
  opacity: 1;
  transition: 0.5s;
}
.bgInactive{
  visibility: hidden;
  top: -50%;
  opacity: 0;
  transition: 0.5s;
}

.bg1{
    display: grid;
    grid-template-rows: 1fr;
    background: url('../../assets/img/Game/bg1.png') no-repeat top center;
    background-size: cover;
}
</style>
