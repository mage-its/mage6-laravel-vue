<template>
    <div class="bg-yellow">
    <v-container>        
        <v-row class="mt-16 justify-center">            
            <v-col lg="6" class="d-flex justify-lg-center justify-center">
                <div>
                    <div class="text-h4 font-weight-bold">Esport</div>
                    <v-card class="skew d-flex align-center mt-5" width="100%" max-width="250" max-height="275" color="#040b21">                        
                        <v-container>
                            <v-row>
                                <v-col cols="12" class="d-flex justify-center">
                                    <v-img class="skewback" contain :src="require('../assets/image/esport.png')" max-width="200">                                    
                                    </v-img>
                                </v-col>
                            </v-row>
                        </v-container>                        
                    </v-card>
                </div>
            </v-col>
            <v-col lg="6" class="d-flex flex-column justify-end align-start">                
                <v-container>
                    <v-row>
                        <v-col cols="12">
                            <v-card class="skewonly" color="#040b21" width="100%">
                                <v-card-text class="white--text">
                                    E-Sport Competition MAGE 6 adalah kompetisi yang mempertemukan talenta-talenta terbaik dalam dunia E-Sport yang diperuntukan bagi pelajar, mahasiswa dan umum.
                                </v-card-text>    
                            </v-card>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="4" v-for="img in images" :key="img.src">
                            <v-card class="skewesport" width="100%" height="50%">                                                                                                            
                                <div class="d-flex flex-column justify-center" style="height: 100%; width:100%">
                                    <v-img class="skewesportback" :src="require('../assets/image/' + img.src)" max-height="80%" contain max-width="100%"></v-img>                                                                                                            
                                </div>
                            </v-card>
                            <v-btn class="white--text mt-5 font-weight-bold" color="#040b21" width="100%" small href="/register">
                                Daftar
                            </v-btn>
                            <v-btn class="white--text mt-2 text-caption font-weight-bold" color="#040b21" width="100%" small route: to="/esport">
                                Info Page
                            </v-btn>
                        </v-col>                        
                    </v-row>
                </v-container>
            </v-col>                        
        </v-row>        
    </v-container>
    </div>
</template>

<script>
export default {
    name: 'Esport',
    data: () => ({
        images: [
        {
            src: "dotahome.png"
        },
        {
            src: "mlhome.png"
        },
        {
            src: "csgohome.png"
        }
        
        ]
    })
}
</script>