<template>
    <v-container>
    <v-row justify="center">
        <v-col sm="12" md="10">
        <h5 class="text-center">Jenis Huruf Hiragana / Katakana</h5>
        <v-radio-group v-model="opsi" row v-on:change="ganti()">
            <v-radio label="Hiragana" value="h" ></v-radio>
            <v-spacer></v-spacer>
            <v-radio label="Katakana" value="k" ></v-radio>
        </v-radio-group>
        <v-card class="mb-3">
            <v-simple-table>
                <template v-slot:default>
                    <tbody>
                        <tr class="text-center font-weight-bold">
                            <td>A</td>
                            <td>I</td>
                            <td>U</td>
                            <td>E</td>
                            <td>O</td>
                        </tr>
                        <tr v-for="(i,b) in huruf" :key="b" class="text-center">
                            <td v-for="(a,c) in i" :key="c">
                                <span v-text="a.hiragana" v-if="hiragana" class="text-info"></span>
                                <span v-text="a.katakana" v-else-if="katakana" class="text-info"></span><br>
                                <span v-text="a.romaji" class="romaji text-danger"></span>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-card>
        <h5 class="text-center my-4">Pilih Jenis Huruf yang mau anda test!</h5>
        <v-form action="" method="post">
            <v-row>
                <v-col md="6" sm="12">
                    <v-card class="mb-4" tile>
                    <v-list-group  prepend-icon="mdi-syllabary-hiragana" value="true">
                        <template v-slot:activator><v-list-item-title>Pilih Jenis Huruf</v-list-item-title></template>
                        <v-divider class="my-0"></v-divider>
                        <v-list-item-group>
                            <v-list-item dense>
                                <v-list-item-content>
                                    <v-list-item-title>
                                        <v-radio-group v-model="form.jenis_huruf" class="my-0" hide-details="auto">
                                            <v-radio label="Hiragana" value="hiragana"></v-radio>
                                        </v-radio-group>
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-divider class="my-0"></v-divider>
                            <v-list-item dense>
                                <v-list-item-content>
                                    <v-list-item-title>
                                        <v-radio-group v-model="form.jenis_huruf" class="my-0" hide-details="auto">
                                            <v-radio label="Katakana" value="katakana"></v-radio>
                                        </v-radio-group>
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-item-group>
                    </v-list-group>
                    </v-card>
                </v-col>
                <v-col md="6" sm="12">
                    <v-card class="mb-4" tile>
                    <v-list-group  prepend-icon="mdi-clock" value="true">
                        <template v-slot:activator><v-list-item-title>Pilih Durasi Waktu</v-list-item-title></template>
                        <v-divider class="my-0"></v-divider>
                        <v-list-item-group>
                            <template v-for="w in waktu">
                            <v-list-item dense :key="w">
                                <v-list-item-content>
                                    <v-list-item-title>
                                        <v-radio-group v-model="form.waktu" class="my-0" hide-details="auto">
                                            <v-radio :label="`${w} Menit`" :value="w"></v-radio>
                                        </v-radio-group>
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-divider :key="w+'l'" class="my-0"></v-divider>
                            </template>
                        </v-list-item-group>
                    </v-list-group>
                    </v-card>
                    <v-btn class="col-12" color="info" @click.stop="submit()">Next</v-btn>
                </v-col>
            </v-row>
        </v-form>
        </v-col>
    </v-row>
    </v-container>
</template>

<script>
export default {
    data: ()=>({
        huruf: [],
        waktu: [5,10,15,20],
        opsi: 'h',
        hiragana: true,
        katakana: false,
        form: {
            jenis_huruf: "hiragana",
            waktu: 5,
        }
    }),
    mounted: function(){
        axios.get(`/api/huruf`).then(({data})=>{
            if(data.is_test)this.$router.push('/huruf-jepang/test/1');
            let temp=[],temp2=[];
            for(let i = 1; i <= 5; i++){
                temp.push({id:"",hiragana:"",katakana:"",romaji:"",index:0});
            };
            temp2.push(...temp);
            data.huruf.forEach(v=>{
                temp[v.index-1]=v;
                if(v.index==5){
                    this.huruf.push(temp);
                    temp=[];
                    temp.push(...temp2);
                }
            })
        })
    },
    methods: {
        ganti(){
            this.hiragana=!this.hiragana;
            this.katakana=!this.katakana;
        },
        submit(){
            axios.post(`/api/huruf/quizz`,this.form).then(response=>{
                this.$router.push('/huruf-jepang/test');
            });
        }
    }
}
</script>

<style>
    .v-label{
        top: 4px;
    }
</style>
