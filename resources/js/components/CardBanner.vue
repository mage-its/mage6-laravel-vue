<template>
    <div class="bg-yellow">
        <v-container>
            <v-row class="mt-16 justify-center">
                <v-col cols="5" lg="6" class="d-flex justify-end">
                    <div class="d-flex align-center">
                        <v-img :src="require('../assets/question.png')" contain max-height="150" class="img-translate"></v-img>
                    </div>
                </v-col>                    
                <v-col cols="7" lg="6">                    
                        <v-sheet class="pa-3 shadow text-center" rounded color="#1f1248" max-width="550" width="100%">                            
                            <span class="font-weight-bold yellow--text">MAGE </span>
                            <span class="yellow--text text-caption text-md-body-2">
                            Adalah serangkaian acara dibidang IT yang diadakan oleh
                            Departemen Teknik Komputer - FTEIC ITS Surabaya sebagai
                            salah satu wadah bagi para pelajar dan akademisi untuk
                            menciptakan generasi muda yang lebih baik dalam kemajuan
                            teknologi, Terdapat enam cabang acara utama yaitu Olimpiade, 
                            DevCom, E-Sport, Workshop, Exhibition, dan Talkshow.                            
                            </span>                            
                        </v-sheet>                                                            
                </v-col>
            </v-row>
        </v-container>
    </div>    
</template>


<script>
export default {
    name: 'CardBanner',
    data: () => ({

    })
}
</script>

<style lang="scss" scoped>
    .shadow{        
        box-shadow: -15px 15px 0px 0px rgba(72,30,122,1) !important;
    }
    @media (max-width: 425px) {
        .img-translate{
            transform: translateX(50px);
        }
    }       
</style>