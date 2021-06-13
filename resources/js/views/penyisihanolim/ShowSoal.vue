<template>
<div>
    <v-container class="mt-5">
        <v-row>
            <v-col cols="3" sm="4" md="4" class="d-flex align-center">
                <v-btn text class="px-0" route: to="/gamenetwork"><v-icon dark color="black">mdi-arrow-left</v-icon></v-btn>
            </v-col>            
            <v-col cols="9" sm="4" md="4" class="d-flex align-center flex-column">
                <div class="text-h5 text-center">Soal Nomor {{ soalnumber }}</div>
                <div class="text-h5 text-center">[ Kategori {{ this.soaldetail.difficulty }} ]</div>
                <div class="text-h5 text-center">[ Mata Pelajaran {{ this.soaldetail.jenis_soal }}]</div>
            </v-col>
            <v-col cols="12" sm="4" md="4" class="text-center">
                <v-card color="rgba(0,0,0,.06)" class="mx-auto ml-sm-auto mr-sm-0 py-1" width="200px">
                    <div class="text-center">Timer</div>
                    <div v-bind="timerCount">                    
                        {{ timerHour }} : {{ timerMinute }} : {{ timerSecond }}
                    </div>
                    <br>                
                    <div>
                        Score
                    </div>                    
                    <div>
                        {{ this.score.score }}
                    </div>
                </v-card>
            </v-col>
        </v-row>

        <!-- START POP UP KONDISI BENAR -->
        <v-dialog
        v-model="correct_after_submit"        
        max-width="350px"                
        >
            <v-card>
                <v-card-title>
                    <div class="green--text"> Selamat Jawaban Anda Benar </div>
                </v-card-title>                
                <v-card-text>
                    Silahkan lanjutkan perjalanan pembangunan pesawat ini. Semoga berhasil.
                    <v-icon>mdi-emoticon-excited-outline</v-icon>                
                </v-card-text>            

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn text color="green darken-1" route: to= '/gamenetwork'>Kembali</v-btn>
                </v-card-actions>

            </v-card>
        </v-dialog>
        <!-- END POP UP KONDISI BENAR -->

        <v-row v-if="answered" class="justify-center">
            <v-col cols="10" sm="4">
                <v-alert type="success" dense text class="text-center">                    
                    Selamat Jawaban Anda Benar, Silahkan lanjutkan perjalanan pembangunan pesawat ini. Semoga berhasil.                    
                </v-alert>
            </v-col>            
        </v-row>

        <v-row v-if="wrong" class="justify-center">
            <v-col cols="10" sm="4">
                <v-alert type="error" dense text class="text-center">
                    Maaf jawaban anda masih salah
                </v-alert>
            </v-col>            
        </v-row>        

        <v-row class="mt-9">            
            <v-col cols="12" md="6" class="d-flex justify-center">                
                <img :src="require('../../../../public/olim/' + this.soaldetail.image_soal)" style="max-width: 85vh; object-fit: contain">
            </v-col>
            <v-col cols="12" md="6" class="d-flex flex-column justify-center align-center mt-11 mt-sm-0">                                                 
                <div style="width: 75%">
                    <div>{{ this.soaldetail.text_soal }}</div>                    
                    <v-form class="mt-3">
                        <input type="hidden" name="_token" :value="csrf">
                        <v-textarea                        
                        v-if="!answered"
                        label="Jawaban"
                        filled
                        rows="1"
                        row-height="15"
                        color="#040b21"
                        v-model="jawaban"                
                        >                                         
                        </v-textarea>  
                        <v-textarea                        
                        v-if="answered"
                        label="Jawaban"
                        filled
                        rows="1"
                        row-height="15"
                        color="#040b21"
                        disabled                        
                        :value="this.soaldetail.last_answer"
                        >                                                                                         
                        </v-textarea>                                                                                               
                        <v-btn v-if="!answered" class="mt-11" small @click="submitjawaban">Submit</v-btn>                                                                
                    </v-form>                                                                                  
                </div>                
            </v-col>
        </v-row>
    </v-container>
    <Footer class="mt-13"/>
</div>    
</template>

<script>
const axios = require('axios');
import Footer from '../../components/Footer.vue'
export default {
    name: 'ShowSoal',
    components: {
        Footer
    },
    data:() => ({
        jawaban: '',
        timerCount: '',
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        answered: false,
        soalnumber: '',
        soaldetail: '',
        correct_after_submit: false,
        wrong: false,
        score: ''
    }),

    methods:{
        submitjawaban(){
            if(this.jawaban !==  ''){
                // console.log(this.jawaban);
                axios.put('/submitanswer',{
                    jawaban : this.jawaban,                    
                    no_soal : this.$route.params.nodeid,
                    hash_connecting: this.$route.params.connecting
                })
                .then(res => {
                    console.log(res.data);
                    if(res.data.correct === 1){
                        this.correct_after_submit = true;
                        this.wrong = false;
                    }
                    else{
                        this.correct_after_submit = false;
                        this.wrong = true;
                    }
                    // console.log(res.data);
                })
                .catch(err => {
                    console.error(err); 
                })         
            }                        
        },
        getSoal(){
            axios.get('/getsoal/' + this.$route.params.nodeid)
            .then((response) => {
                console.log(response.data);
                if(response.data.closed === 1){
                    return this.$router.push("/closed");
                }
                else if(response.data.soal_locked === 1){
                    return this.$router.push("/gamenetwork");
                }
                
                this.soaldetail = response.data.usersoal;
                this.score = response.data.userscore;
                this.timerCount = response.data.timediff;
                if(this.soaldetail.correct === 1){
                    this.answered = true;
                }
            })
        },
        // countDownTimer() {
        //     if(this.timerCount > 0) {
        //         setTimeout(() => {                    
        //             this.timerHour = Math.floor((this.timerCount % (60 * 60 * 24)) / (60 * 60));
        //             this.timerMinute = Math.floor((this.timerCount % (60 * 60)) / (60));                                           
        //             this.timerSecond = Math.floor((this.timerCount % (60))); 
        //             this.timerCount--;                        
        //             this.timerCount()
        //         }, 1000)
        //     }
        // }
    },

    watch: {

        timerCount: {
            handler(value) {

                if (value >= 0) {
                    setTimeout(() => {    
                        this.timerHour = Math.floor((value % (60 * 60 * 24)) / (60 * 60));
                        this.timerMinute = Math.floor((value % (60 * 60)) / (60));                                           
                        this.timerSecond = Math.floor((value % (60))); 
                        this.timerCount--;                        
                    }, 1000);
                }
                else{
                    this.$router.push('/closed');                                        
                    // window.location.href="/closed";
                    window.location.reload();                    
                }

            },
            // immediate: true // This ensures the watcher is triggered upon creation
        },        

    },

    created(){
        this.soalnumber = this.$route.params.nodeid     
        this.getSoal();   
        
    }
}
</script>

<style lang="scss">
.bg-blue{
    background-color: #040b21;
  }
.bg-yellow{
    background-color: #f5d300 !important;	
}
</style>