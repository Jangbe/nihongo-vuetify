<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="12" md="7">
                <h5 class="text-center">Hasil Test Huruf Jepang Anda</h5>
                <span>Benar {{ benar+'/'+jumlah_soal }} </span>
                <v-progress-linear color="green" class="lighten-4" :value="progress"> </v-progress-linear><br>
                <v-card>
                    <v-list-group  prepend-icon="mdi-briefcase-tick" value="true">
                        <template v-slot:activator><v-list-item-title>Jawaban Anda</v-list-item-title></template>
                        <v-list-item-group>
                            <template v-for="(result,i) in results">
                            <v-list-item dense :key="i">
                                <v-list-item-content>
                                    <v-list-item-title class="d-flex justify-space-between" :class="{'green--text':result.is_correct,'red--text':!result.is_correct}">
                                        <span>{{result.soal}}</span>
                                        <span>
                                            <span :class="{'font-italic':result.jawab==''}">{{result.jawab==''?'Tidak Diisi':result.jawab}}</span>
                                            <span>({{result.benar}})</span>
                                        </span>
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-divider :key="i+'l'" class="my-0"></v-divider>
                            </template>
                        </v-list-item-group>
                    </v-list-group>
                </v-card>
                <div class="d-flex justify-space-between mt-6">
                    <v-btn tile color="cyan" style="text-decoration:none" dark to="/">Kembali</v-btn>
                    <v-btn tile color="cyan" style="text-decoration:none" dark to="/huruf-jepang">Lagi</v-btn>
                </div>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data: ()=>({
        results: [],
        jumlah_soal: 0,
        benar: 0,
        progress: 0,
    }),
    mounted(){
        axios.get('/api/huruf/quizz/hasil-test').then(({data})=>{
            if(data.length<1)this.$router.push('/huruf-jepang/test');
            this.results=data.hasil
            this.jumlah_soal=data.jumlah_soal
            this.benar=data.benar
            this.progress=data.progress
        })
    },
}
</script>

<style>

</style>
