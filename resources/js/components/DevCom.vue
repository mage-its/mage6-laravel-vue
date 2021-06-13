<template>
    <div class="bg-yellow">
        <v-container>
            <v-row class="mt-16">
                <v-col cols="12">
                    <div class="text-h4 font-weight-bold">Development Competition</div>
                </v-col>                
            </v-row>
            <v-row class="d-flex justify-center">
                <v-col lg="4" sm="4" class="d-flex justify-center flex-column align-center" v-for="item in ecosystem" :key="item">
                    <v-card class="skew d-flex align-center" max-width="250" width="100%" max-height="275" height="100%" color="#040b21">                        
                        <v-container>
                            <v-row>
                                <v-col cols="12" class="d-flex justify-center">
                                    <v-img class="skewback" contain :src="require('../assets/image/' + item.image)" max-width="200" max-height="200">                                    
                                    </v-img>
                                </v-col>
                            </v-row>
                        </v-container>                        
                    </v-card>                    
                    <v-card class="mt-10 skewright" color="#040b21" width="200">
                        <v-card-text class="white--text text-subtitle-2 text-center font-weight-bold">
                            {{ item.text }}
                        </v-card-text>
                    </v-card>
                    <v-btn class="mt-5" width="200" color="#040b21">
                        <div class="white--text font-weight-bold">
                        <v-btn text class="white--text" href="/register" small> Daftar </v-btn>
                        </div>
                    </v-btn>
                </v-col>                
            </v-row>
            <v-row class="mt-5">
                <v-col cols="12" class="d-flex justify-center">
                    <v-btn class="white--text text-center" color="#040b21" medium width="50%" route: to="/devcom">Devcom Page</v-btn>
                </v-col>
            </v-row>            
        </v-container>
    </div>
</template>

<script>
export default {
    name: 'DevCom',
    data: () => ({
        ecosystem: [
        {
            text: "App Dev",
            image: 'app.png',            
        },
        {
            text: "Game Dev",
            image: 'game.png'
        },
        {
            text: "Iot",
            image: 'iot.png'
        }
        ],        
    })
}
</script>

<style lang="scss" scoped>

</style>