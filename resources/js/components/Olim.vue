<template>
    <div class="bg-yellow">
    <v-container>        
        <v-row class="mt-16 justify-center">            
            <v-col lg="6" class="d-flex justify-center">
                <div>
                    <div class="text-h4 font-weight-bold">Olimpiade</div>
                    <v-card class="skew d-flex align-center mt-5" width="100%" max-width="250" max-height="275" color="#040b21">                        
                        <v-container>
                            <v-row>
                                <v-col cols="12" class="d-flex justify-center">
                                    <v-img class="skewback" contain :src="require('../assets/image/brain.png')" max-width="200">                                    
                                    </v-img>
                                </v-col>
                            </v-row>
                        </v-container>                        
                    </v-card>
                </div>
            </v-col>
            <v-col lg="6" class="d-flex flex-column justify-center align-center">
                <v-card class="skewonly" color="#040b21" width="50%">
                    <v-card-text class="white--text text-justify">
                        Olimpiade yang  bergerak dalam bidang komputer yang dirancang <span style="font-weight: bold">untuk pelajar SMA/sederajat</span>
                    </v-card-text>    
                </v-card>
                <v-btn class="white--text mt-5" color="#040b21" width="50%" href="/register">
                    Daftar
                </v-btn>
                <v-btn class="white--text mt-5" color="#040b21" width="50%" route: to="/olimpiade">
                    Olim Page
                </v-btn>
            </v-col>                        
        </v-row>        
    </v-container>
    </div>
</template>

<script>
export default {
    name: 'Olim',
    data: () => ({

    })
}
</script>