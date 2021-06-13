<template>
    <div class="background--yellow">
        <vue-headful
            title="Esport | MAGE6"
            description="E-Sport Competition MAGE 6 adalah kompetisi yang mempertemukan talenta-talenta terbaik dalam dunia E-Sport yang diperuntukan bagi pelajar, mahasiswa dan umum"
            keyword="Kompetisi Esport untuk talenta terbaik dari pelajar, mahasiswa dan umum"
        />
        <v-container>
            <v-row class="mt-7">
                <v-col cols="12">
                    <div class="text-h4 text-md-h3 font-weight-bold text-center">
                        E-Sport
                    </div>
                </v-col>                
            </v-row>
            <v-row class="mt-7">
                <v-col md="6" class="d-flex justify-center justify-md-center">
                    <div class="d-flex flex-column align-end">                        
                        <v-img :src="require('../assets/Esport/esportheader.png')" max-width="250px"></v-img>                                                            
                        <div class="text-center mt-7 card--esportungu font-weight-bold">E-Sport</div>
                        <div class="text-center mt-3 card--esportbiru font-weight-bold mr-3">Umum</div>
                    </div>
                </v-col>                
                <v-col md="6" class="d-flex justify-center justify-md-end">
                    <div class="d-flex flex-column justify-space-between">
                        <p class="text-center text-sm-left header-text font-weight-bold">
                            E-Sport Competition MAGE 6 adalah kompetisi
                            yang mempertemukan talenta-talenta terbaik
                            dalam dunia E-Sport yang diperuntukan bagi pelajar, mahasiswa dan umum.
                            Perlombaan ini ter diri dari tiga kategori, yaitu DOTA 2, CSGO, Mobile                        
                            Legend (ML). Tahap penyisihan sampai final untuk
                            kategori DOTA 2, CSGO, dan Mobile Legend akan
                            dilakukan secara online.
                        </p>
                        <div class="d-flex flex-column align-center align-sm-start">
                            <a href="/posteresport" style="text-decoration: none"><div class="text-center mt-3 card--esportbiru--widthfit font-weight-bold">Download Poster</div></a>
                            <a href="/guidebook-esport" style="text-decoration: none"><div class="text-center mt-3 card--esportbiru--widthfit font-weight-bold">Download Guidebook</div></a>
                        </div>
                    </div>
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
            <v-row class="justify-center">
                <v-col sm="3" class="d-flex justify-center" v-for="item in biayadaftar" :key="item">
                    <div>
                        <v-img :src="require('../assets/Esport/'+item.gambar)" max-width="250px"></v-img>                        
                        <div class="card--ungutua text-center mt-5 white--text font-weight-bold mx-auto mx-sm-0">{{item.biaya}}</div>
                        <a href="/register" style="text-decoration: none"><div class="card--ungutua text-center mt-5 white--text font-weight-bold mx-auto mx-sm-0">Daftar</div></a>                        
                    </div>
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
    name: 'EsportPage',
    components: { 
        Spacerbottom, Footer
    },
    data:() => ({
        syarat: [
            {message: 'Calon peserta ditujukan untuk kalangan umum'}, 
            {message: 'Melakukan pendaftaran secara online'}, 
            {message: 'Melakukan pembayaran biaya pendaftaran sesuai nominal tertera pada saat pendaftaran'}
        ],
        biayadaftar:[
            {
                gambar: 'dotadetail.png',
                biaya: 'Rp. 120.000,-'
            },
            {
                gambar: 'mldetail.png',
                biaya: 'Rp. 100.000,-'
            },
            {
                gambar: 'csgodetail.png',
                biaya: 'Rp. 120.000,-'
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

</style>