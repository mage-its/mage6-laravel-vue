<template>
  <div class="bg-yellow">
      <v-container>          
          <v-row class="mt-16">
              <v-col cols="1" lg="3" class="d-flex justify-center align-center">
                  <v-img class="carouselnav" :src="require('../assets/image/left.png')" @click="counter--" max-width="30px"></v-img>
              </v-col>
              <v-col cols="10" lg="6">
                  <div class="text-h4 font-weight-bold">Dokumentasi</div>                  
                  <v-carousel :show-arrows="false" class="carousel mt-lg-16" v-model="counter" hide-delimiters continuous height=400>
                      <v-carousel-item v-for="img in images" :key="img" :src="require('../assets/image/' + img)">                          
                      </v-carousel-item>
                  </v-carousel>
              </v-col>
              <v-col cols="1" lg="3" class="d-flex justify-center align-center">
                  <v-img class="carouselnav" :src="require('../assets/image/right.png')" @click="counter++" max-width="30px"></v-img>
              </v-col>
          </v-row>
      </v-container>
  </div>
</template>

<script>
export default {
    name: 'Carousel',
    data: () => ({
        images: ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg"],
        counter: 0
    })
}
</script>

<style lang="scss" scoped>
    @media (max-width: 600px) {
        // .carousel{
        //     width: 258px !important;
        //     height: 175px !important;
        // }
        .carouselnav{
            width: 15px;
        }
    }
    @media (min-width: 600px) {
        // .carousel{
        //     width: 258px !important;
        //     height: 175px !important;
        // }
    }
    @media (min-width: 960px) {
        // .carousel{
        //     width: 413px !important;
        //     height: 281px !important;
        // }
    }
    @media (min-width: 1264px) {
        // .carousel{
        //     width: 588px !important;
        //     height: 400px !important;
        // }
    }
</style>