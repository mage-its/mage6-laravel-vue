<template>    
    <div class="background--yellow">
            <vue-headful
            title="Devcom | MAGE6"
            description="Kompetisi pengembangan software maupun alat yang ditujukan untuk developer SMA/sederajat, mahasiswa dan umum"
            keyword="Kompetisi covid19, kompetisi tingkat nasional bersertifikat, kompetisi untuk sma"
            />                             
            <v-container>
                <v-row class="mt-7">
                    <v-col class="d-flex justify-center font-weight-bold text-md-h3 text-h4" cols="12">                                
                        Development                                
                    </v-col>
                </v-row>
                <v-row>
                    <v-col class="d-flex justify-center font-weight-bold text-md-h3 text-h4" cols="12">
                        Competition
                    </v-col>
                </v-row>
            </v-container>

            <v-container fluid class="banner--birutua mt-11">
                <v-row>
                    <v-col cols="12" class="py-0">
                        <div class="d-flex justify-center font-weight-bold text-md-h4 text-h5 text-center">"Embrace a New Normal Life"</div>
                    </v-col>
                </v-row>
            </v-container>                
            

            <v-container class="mt-7">                
                <v-row class="justify-center">
                    <v-cols cols="3">
                        <div class="d-flex flex-column align-end">
                            <v-img :src="require('../assets/Devcom/img_appdev.png')" contain max-width="250px"></v-img>
                            <div class="card--skewungutua mt-3 font-weight-bold">
                                <div class="card--skewleft">App Development</div>
                            </div>
                            <div class="card--skewungu mt-3 font-weight-bold mr-3">
                                <div class="card--skewleft">Mahasiswa</div>
                            </div>
                            <div class="card--skewungu mt-3 font-weight-bold mr-6">
                                <div class="card--skewleft">SMA</div>
                            </div>
                        </div>
                    </v-cols>
                    <v-cols cols="3" class="mt-7 mt-sm-0">
                        <div class="d-flex flex-column align-end">
                            <v-img :src="require('../assets/Devcom/img_iot.png')" contain max-width="250px"></v-img>
                            <div class="card--skewungutua mt-3 font-weight-bold">
                                <div class="card--skewleft">IOT</div>
                            </div>
                            <div class="card--skewungu mt-3 font-weight-bold mr-3">
                                <div class="card--skewleft">Umum</div>
                            </div>
                        </div>
                    </v-cols>
                </v-row>
            </v-container>

            <v-container fluid class="banner--birutua mt-11">
                <v-row>
                    <v-col cols="12" class="py-0">
                        <div class="d-flex justify-center font-weight-bold text-md-h4 text-h5 text-center">"Break Free"</div>
                    </v-col>
                </v-row>
            </v-container>

            <!-- Start GAMEDEV -->
            <v-container class="mt-7">                
                <v-row class="justify-center">
                    <v-cols cols="3">
                        <div class="d-flex flex-column align-end">
                            <v-img :src="require('../assets/Devcom/img_gamedev.png')" contain max-width="250px"></v-img>
                            <div class="card--skewungutua mt-3 font-weight-bold">
                                <div class="card--skewleft">Game Development</div>
                            </div>
                            <div class="card--skewungu mt-3 font-weight-bold mr-3">
                                <div class="card--skewleft">Mahasiswa</div>
                            </div>
                            <div class="card--skewungu mt-3 font-weight-bold mr-6">
                                <div class="card--skewleft">SMA</div>
                            </div>
                        </div>
                    </v-cols>                    
                </v-row>
            </v-container>
            <!-- End GAMEDEV -->

            <!-- Start Biaya Pendaftaran  -->
            <v-container class="mt-11">
                <v-row>
                    <v-col cols="12" class="d-flex justify-center">                        
                        <div>
                            <div class="d-flex flex-row">
                                <a href="/guidebook-devcomp" style="text-decoration: none; color:black"><div class="card--white font-weight-bold">Dowload Guide Book</div></a>
                                <a href="/posterdevcom" style="text-decoration: none; color:black"><div class="card--white font-weight-bold ml-3">Dowload Poster</div></a>
                            </div>
                            <div class="card--white--biaya font-weight-bold mt-3">Biaya Pendaftaran</div>
                        </div>
                    </v-col>
                </v-row>
                <v-row class="mt-3">
                    <v-col cols="12" class="d-flex justify-center">
                        <v-img class="gambar--biaya" :src="require('../assets/Devcom/img_biaya.png')" contain max-width="350px"></v-img>
                    </v-col>
                </v-row>
            </v-container>
            <!-- End Biaya Pendaftaran  -->                

            <!-- Start Timeline -->
            <v-container class="mt-7">
                <v-row class="mt-7">
                    <v-col cols="12" class="d-flex justify-center">
                        <div class="card--white text-h6 text-md-h4 font-weight-bold">Timeline Acara</div>
                    </v-col>                
                </v-row>
                <v-row>
                    <v-col cols="12">
                        <v-img class="img_timeline" :src="require('../assets/Devcom/img_timeline.png')" contain></v-img> 
                    </v-col>                   
                </v-row>
            </v-container>
            <!-- End Timeline -->                
        <Spacerbottom/>
        <Footer/>
    </div>

</template>

<script>
// import Navbar_sub from '../components/Navbar_sub'
import Spacerbottom from '../components/Spacerbottom.vue'
import Footer from '../components/Footer.vue'

export default {
    name: 'Devcom',
    components: { 
        Spacerbottom, Footer
     }
}
</script>

<style lang="scss">
.bg-blue{
    background-color: #040b21;
}
.background--yellow{
	background-color: #f5d300 !important;	
}
.banner--birutua{
    background-color: #1f1248;
    color: white;
}
.card--skewungutua{
    transform: skewX(-15deg) !important;    
    background-color: #1f1248;
    width: 75%;
    padding: 5px 0 5px 0;  
    color: #19a4b9;
    text-align: center;  
}
.card--skewungu{
    transform: skewX(-15deg) !important;    
    background-color: #481e7a;
    width: 75%;
    padding: 5px 0 5px 0;
    color: white;
    text-align: center;        
}
.card--skewleft{
    transform: skewX(15deg) !important;    
}
.card--white{
    padding: 15px;
    background-color: white;
    width: fit-content;       
    text-align: center;      
}
.card--white--biaya{
    padding: 15px;
    background-color: white;
    width: 100%; 
    text-align: center;      
}




.background_dev {
    color: rgb(255, 255, 0);
    /* background: url("../assets/img/Devcom/BG.png"); */
    /* width: 100%; */
}
.card_embrace {
    width: 100%;
}
.embrace {
    color: rgb(9, 251, 211) !important;
}
.free {
    color: rgb(255, 255, 0) !important;
}
.biaya {
    color: rgb(31, 18, 72) !important;
}
.embrace {
    max-width: 100%;
    height: auto;
}
@media (max-width: 600px) {
    .gambar--biaya{
        width: 167px;
    }


    .img_biaya {
        width: 250px;
    }
    .img_timeline {
        width: 300px;
    }
    .img_parallelogram {
        width: 130px;
        /* justify-content: center; */
    }
    .desc-dev {
        width: 120px;
        height: 30px; 
    }

    #app_dev {
        padding-right: 0px;
    }
    #app_mahasiswa {
        padding-right: 20px;
    }
    #app_sma {
        padding-right: 40px;
    }

    #iot_dev {
        margin-top: -35px;
        padding-left: 30px;
    }
    #iot_mahasiswa {
        margin-top: -65px;
        padding-left: 10px;
    }
    .desc {
        padding: 7px;
        font-size: 12px;
    }
    #mahasiswa{
        position: relative;
        left: -10px;
    }
    #sma{
        position: relative;
        left: -20px;
    }
    .card_biaya{
        width: fit-content;
    }
}
@media (min-width: 600px) {

    .end {
        align-content: center;
    }
    .img_biaya {
        width: 380px;
    }
    .img_timeline {
        width: 600px;
    }
    .img_parallelogram {
        width: 280px;
    }
    .desc-dev {
        width: 200px;
        height: 40px;
    }

    #app_dev {
        padding-right: 20px;
    }
    #app_mahasiswa {
        padding-right: 40px;
    }
    #app_sma {
        padding-right: 60px;
    }

    #iot_dev {
        margin-top: -55px;
        padding-left: 80px;
    }
    #iot_mahasiswa {
        margin-top: -65px;
        padding-left: 60px;
    }
    .desc {
        padding: 5px;
    }
    #mahasiswa{
        position: relative;
        left: -15px;
    }
    #sma{
        position: relative;
        left: -25px;
    }
    .card_biaya{
        width: fit-content;
    }

}
@media (min-width: 960px) {
    .embrace {
        max-width: 100%;
        height: auto;
    }
    .img_biaya {
        width: 400px;
    }
    .img_timeline {
        width: 700px;
    }
    .img_parallelogram {
        width: 400px;
    }
    .desc-dev {
        width: 250px;
        height: 60px;
    }
    #app_dev {
        padding-right: 20px;
    }
    #app_mahasiswa {
        padding-right: 50px;
    }
    #app_sma {
        padding-right: 80px;
    }

    #iot_dev {
        margin-top: -80px;
        padding-left: 150px;
    }
    #iot_mahasiswa {
        margin-top: -80px;
        padding-left: 130px;
    }
    .desc {
        padding: 10px;
    }
    .card_biaya{
        width: 315px;
    }

}
@media (min-width: 1264px) {
    .img_parallelogram {
        width: 400px;
    }

    .desc-dev {
        width: 250px;
        height: 60px;
    }
    .card_biaya{
        width: 315px;
    }
}
</style>