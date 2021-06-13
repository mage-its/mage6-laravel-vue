<template>
  <div class="bg-yellow">
      <v-container>          
          <v-row class="mt-16">
              <v-col cols="3" class="d-flex justify-center align-center">
                  <v-img :src="require('../assets/image/left.png')" @click="counter--" max-width="30px" width="20vw"></v-img>
              </v-col>
              <v-col cols="6">
                  <div class="text-h4 font-weight-bold">Dokumentasi</div>
                  <v-carousel :show-arrows="false" class="carousel mt-16" v-model="counter" hide-delimiters continuous height="400">
                      <v-carousel-item v-for="img in images" :key="img" :src="require('../assets/image/' + img)">                          
                      </v-carousel-item>
                  </v-carousel>
              </v-col>
              <v-col cols="3" class="d-flex justify-center align-center">
                  <v-img :src="require('../assets/image/right.png')" @click="counter++" max-width="30px"></v-img>
              </v-col>
          </v-row>
      </v-container>
  </div>
</template>

<script>
export default {
    name: 'Carousel2',
    data: () => ({
        images: ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg"],
        counter: 0
    })
}
</script>

<style lang="scss" scoped>
    @media (max-width: 600px) {
        .carousel{
            height: 200px !important;
        }
    }
</style>