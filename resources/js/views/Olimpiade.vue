<template>
    <div class="background--yellow">
        <vue-headful
            title="Olimpiade | MAGE6"
            description="Olimpiade MAGE6 adalah olimpiade yang bergerak dalam komputer ditujukkan untuk pelajar SMA/sederajat"
            keywords="Olimpiade komputer tingkat nasional SMA SMK Sederajat, Sertifikat olimpiade nasional untuk SNMPTN, Olimpiade online pandemi covid19, Olimpiade covid19"            
        />
        <v-container>
            <v-row class="mt-7">
                <v-col cols="12">
                    <div class="text-h4 text-md-h3 font-weight-bold text-center">                        
                        Olimpiade                        
                    </div>
                </v-col>                
            </v-row>
            <v-row class="mt-7">
                <v-col md="6" class="d-flex justify-center justify-md-center">
                    <div class="d-flex flex-column align-end">
                        <v-img :src="require('../assets/Olimpiade/olimheader.png')" max-width="250px"></v-img>                                    
                        <div class="text-center mt-7 card--esportungu font-weight-bold"><div class="card--skewleft">Olimpiade</div></div>
                        <div class="text-center mt-3 card--esportbiru font-weight-bold mr-3"><div class="card--skewleft">Pelajar</div></div>
                    </div>
                </v-col>                
                <v-col md="6" class="d-flex justify-center justify-md-end">
                    <div class="d-flex flex-column justify-space-between">
                        <p class="text-center text-sm-left header-text font-weight-bold">
                            Olimpiade ini merupakan sebuah inovasi yang 
                            terbilang baru dalam pelaksanaan MAGE 6.
                            Olimpiade ini bergerak dalam bidang komputer yang 
                            dirancang untuk pelajar SMA/sederajat, untuk
                            menguji kemampuan siswa/i Indonesia dalam
                            menyelesaikan soal-soal terkait logika, 
                            pemrograman, dan fisika.
                        </p>
                        <div class="d-flex flex-column align-center align-sm-start">
                            <div>
                                <a href="/register" style="text-decoration: none"><div class="card-header--ungutua text-center mt-5 font-weight-bold mx-auto mx-sm-0">Daftar</div></a>
                                <div class="d-flex mt-3">
                                    <a href="/posterolim" style="text-decoration: none"><div class="text-center card--esportbiru--widthfit font-weight-bold"><div class="card--skewleft">Download Poster</div></div></a>
                                    <a href="/guidebook-olim" style="text-decoration: none"><div class="text-center card--esportbiru--widthfit font-weight-bold ml-3"><div class="card--skewleft">Download Guidebook</div></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </v-col>
            </v-row>
        </v-container>

        <v-container>
            <v-row class="mt-7">
                <v-col cols="12" class="d-flex justify-center">
                    <div class="card--white text-h5 text-sm-h4 text-md-h3 font-weight-bold">Total Hadiah</div>
                </v-col>
                <v-col cols="12" class="d-flex justify-center">
                    <div class="text-h4 text-sm-h3 text-md-h2 font-weight-black">RP 6.000.000,-</div>
                </v-col>
                <v-col cols="12" class="d-flex justify-center">
                    <div class="text-h6 text-sm-h5 text-md-h4 font-weight-black">&</div>
                </v-col>
                <v-col cols="12" class="d-flex justify-center">
                    <div class="text-h6 text-sm-h5 text-md-h4 font-weight-black">Freepass Teknik Komputer ITS*</div>
                </v-col>                                
            </v-row>
        </v-container>

        <v-container>
            <v-row class="mt-7">
                <v-col cols="12" class="d-flex justify-center justify-sm-end">
                    <div class="card--white text-h6 text-md-h4 font-weight-bold">Ketentuan & Syarat</div>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" class="d-flex justify-end">
                    <ul class="header-text font-weight-bold" style="list-style:none">
                        <li class="d-flex justify-end" v-for="text in syarat" :key="text.message">                            
                            <span class="text-right">{{text.message}}</span>                            
                            <span> <v-icon dark color="black" class="ml-5">mdi-window-close</v-icon></span>
                        </li>                        
                    </ul>
                </v-col>
            </v-row>
        </v-container>

        <v-container>
            <v-row class="mt-7">
                <v-col cols="12" class="d-flex justify-center">
                    <div class="card--white text-h6 text-md-h4 font-weight-bold">Biaya Pendaftaran</div>
                </v-col>                
            </v-row>
            <v-row class="justify-center flex-column-reverse flex-sm-row">
                <v-col sm="2" class="d-flex justify-center mx-0 mx-sm-7" v-for="item in biayadaftar" :key="item">                    
                    <v-img :src="require('../assets/Olimpiade/'+item.gambar)" max-width="200px"></v-img>                                                                    
                </v-col>                
            </v-row>
        </v-container>

        <Spacerbottom/>
        <Footer/>
    </div>
</template>

<script>
// import Navbar_sub from '../components/Navbar_sub'
import Spacerbottom from '../components/Spacerbottom.vue'
import Footer from '../components/Footer.vue'

export default {
    name: 'Olimpiade',
    components: { 
        Spacerbottom, Footer
    },
    data:() => ({
        syarat: [
            {message: 'Calon peserta merupakan siswa/i SMA / SMK / Sederajat'}, 
            {message: 'Satu tim terdiri dari maksimal 3 orang dari sekolah yang sama'}, 
            {message: 'Satu tim boleh terdiri dari campuran siswa/i kelas 10,11,12 atau dari tingkat yang sama'},
            {message: 'Melakukan pendaftaran secara online'},
            {message: 'Melakukan pembayaran biaya pendaftaran sesuai nominal tertera pada saat pendaftaran'}
        ],
        biayadaftar:[
            {
                gambar: 'gel3.png',                
            },
            {
                gambar: 'gel2.png',                
            },
            {
                gambar: 'gel1.png',                
            },
            {
                gambar: 'gel4.png',                
            }
        ]
    })
}
</script>

<style lang="scss" scoped>
.bg-blue{
    background-color: #040b21;
  }
.background--yellow{
	background-color: #f5d300 !important;	
}
.skewright{
      transform: skewX(-15deg) !important;
}
.card--esportungu{
    transform: skewX(-15deg) !important;    
    background-color: #1f1248;
    width: 75%;
    padding: 5px 0 5px 0;  
    color: #19a4b9;  
}
.card--esportbiru{
    transform: skewX(-15deg) !important;    
    background-color: #481e7a;
    width: 75%;
    padding: 5px 0 5px 0;
    color: white;        
}
.card--esportbiru--widthfit{
    transform: skewX(-15deg) !important;    
    background-color: #481e7a;
    width: fit-content;
    padding: 5px 10px 5px 10px;
    color: white;        
}
.card--skewleft{
    transform: skewX(15deg) !important;    
}
.card--white{
    padding: 5px 10px 5px 10px;
    background-color: white;
    width: fit-content;
}
.card--ungutua{
    padding: 5px 10px 5px 10px;
    background-color: #1f1248;
    width: 75%;    
}
.header-text{
    line-height: 2;
}

.card-header--ungutua{    
    background-color: #1f1248;
    width: fit-content;
    padding: 5px 0px 5px 0px;
    width: 40%;  
    color: #19a4b9;  
}

</style>