<template>
<v-container>
    <v-row justify="center">
        <v-col sm="12" md="10">
            <h4 class="text-center font-weight-bold mt-3">Test Jenis Huruf {{jenis_huruf}}</h4>
            <v-row>
                <v-col cols="12" class="d-flex justify-content-end pb-1">
                    <span class="green text-center white--text" style="padding: 2px 4px; border-radius:3px">{{text_waktu}}</span>
                </v-col>
                <v-col cols="12" class="py-0 my-0">
                    <v-progress-linear color="green" class="lighten-4" :value="progress"> </v-progress-linear>
                </v-col>
                <v-col cols="12" md="7">
                    <v-card>
                        <v-card-text class="text-center red--text">
                            <h1>{{soal.soal}}</h1>
                        </v-card-text>
                        <v-card-text>
                            <v-text-field v-model="soal.jawab" @keyup="jawabSoal()" ref="auto" autofocus color="green"></v-text-field>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="red" class="lighten-2 white--text" :to="`/huruf-jepang/test/${parseInt(no)-1}`" style="text-decoration:none" tile :disabled="!prev">Sebelumnya</v-btn>
                            <v-spacer></v-spacer>
                            <v-btn color="red" class="lighten-2 white--text" :to="`/huruf-jepang/test/${typeof no=='undefined'?2:parseInt(no)+1}`" style="text-decoration:none" tile :disabled="!next">Selanjutnya</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
                <v-col cols="12" md="5">
                    <v-card>
                        <v-card-text class="text-center">Nomer</v-card-text>
                        <v-card-text>
                            <v-row>
                                <v-col cols="3" v-for="(s,i) in semua_soal" :key="s.id">
                                    <v-btn active-class="red lighten-2 white--text dark" :to="`/huruf-jepang/test/${i+1}`" style="text-decoration: none">
                                        <span v-if="s.jawab==''" class="red--text">{{i+1}}</span>
                                        <span v-else class="green--text">{{i+1}}</span>
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="red" tile dark class="lighten-2" @click.stop="selesai()">Selesai</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-container>
</template>

<script>
export default {
    props: ['no'],
    data: ()=>({
        soal: [],
        semua_soal: [],
        jumlah: 0,
        jenis_huruf: '',
        waktu: '',
        text_waktu:'',
        progress: 0,
        prev: false,
        next: true,
        firstNo: '',
    }),
    watch: {
        no: function(){
            this.getSoal();
        }
    },
    async mounted(){
        try{
            await this.getSoal();
            setInterval(()=>{
                let now = this.$moment();
                let expired = this.$moment(this.waktu)
                let time=expired.diff(now);
                var minute = new Date(time).getMinutes()
                var second = new Date(time).getSeconds()
                this.text_waktu=minute+':'+second
                if(time<1){
                    axios.post('/api/huruf/quizz/selesai').then(response=>{
                        this.$router.push('/huruf-jepang/hasil-test');
                    });
                }
            },1000);
        }catch(e){
            console.log(e);
        }
    },
    methods: {
        async getSoal(){
            try{
                this.prev=typeof this.no!='undefined'&&this.no>1;
                let data = await axios.get('/api/huruf/quizz/'+this.no)
                data=data.data;
                if(data.length<1)this.$router.push('/huruf-jepang');
                this.jenis_huruf=data.jenis_huruf
                this.semua_soal=data.semua_soal
                this.soal=data.soal
                this.jumlah=data.jumlah
                this.waktu=data.waktu
                this.progress=data.progress
                this.next=typeof this.no=='undefined'||this.jumlah>this.no;
            }catch(e){
                console.log(e);
            }
        },
        jawabSoal: function(){
            let no = typeof this.no=='undefined'?1:this.no;
            axios.post(`/api/huruf/quizz/jawab/${no}`,this.soal);
        },
        selesai: function(){
            this.$swal({
                title: 'Apakah kamu yakin?',
                text: "Test akan segera diselesaikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, selesaikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('/api/huruf/quizz/selesai').then(response=>{
                        this.$router.push('/huruf-jepang/hasil-test');
                    });
                }
            })
        }
    }
}
</script>

<style>

</style>
