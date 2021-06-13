<template>
  <div>
    <vue-headful
      title="MAGE6 | Leading The Future with an Industrial Vision for a Better World of Technology"
      description="MAGE Adalah serangkaian acara dibidang IT yang diadakan oleh Departemen Teknik Komputer - FTEIC ITS Surabaya sebagai salah satu wadah bagi para pelajar dan akademisi untuk menciptakan generasi muda yang lebih baik dalam kemajuan teknologi."
      keywords="Kompetisi IT untuk pelajar, mahasiswa dan umum"      
    />
    <Header/>
    <Spacer/>
    <Theme/>
    <CardBanner/>
    <DevCom/>
    <Olim/>
    <Esport/>
    <Carousel/>
    <!-- <CarouselResponsive/> -->
    <Spacerbottom/>
    <Footer/>

  </div>
</template>

<script>
// @ is an alias to /src
import Header from '../components/Header.vue'
import Spacer from '../components/Spacer.vue'
import Theme from '../components/Theme.vue'
import CardBanner from '../components/CardBanner.vue'
import DevCom from '../components/DevCom.vue'
import Olim from '../components/Olim.vue'
import Esport from '../components/Esport.vue'
import Carousel from '../components/Carousel.vue'
// import CarouselResponsive from '../components/CarouselResponsive.vue'
import Spacerbottom from '../components/Spacerbottom.vue'
import Footer from '../components/Footer.vue'

export default {
  name: 'Home',
  components: {
    Header,
    Theme,
    Spacer,
    CardBanner,
    DevCom,
    Olim,
    Esport,
    Carousel,
    // CarouselResponsive,
    Spacerbottom,
    Footer
  }
}
</script>

<style lang="scss">
  *{
    box-sizing: border-box;
  }

  .bg-blue{
    background-color: #040b21;
  }
  .bg-yellow{
    background-color: #f5d300;
  }
  .skew{
    transform: skewX(5deg) !important;
    box-shadow: -15px 15px 0px 0px rgba(255,255,255,1) !important;
  }

  .skewonly{
    transform: skewX(5deg) !important;
  }

  .skewback{
      transform: skewX(-5deg) !important;
  }

  .skewright{
      transform: skewX(-15deg) !important;
  }

  .skewesport{
    transform: skewX(5deg) !important;
    box-shadow: -15px 15px 0px 0px black !important;
  }

  .skewesportback{
    transform: skewX(-5deg) !important;
  }
</style>
