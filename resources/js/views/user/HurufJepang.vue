<template>
  <v-container>
    <h5 class="text-center">Jenis Huruf Hiragana / Katakana</h5>
    <v-row>
        <v-col sm="12">
            <label>
                <v-radio value="h">
                <span>Hiragana</span>
            </label>
            <label class="right">
                <v-radio value="k">
                <span>Katakana</span>
            </label>
        </v-col>
    </v-row>
    <table>
        <thead>
            <th>A</th>
            <th>I</th>
            <th>U</th>
            <th>E</th>
            <th>O</th>
        </thead>
        <tbody>
            <template>
            <tr>
                <!-- <td><span class="hira blue-text">{{$item[0]->hiragana}}</span><span class="kata blue-text">{{$item[0]->katakana}}</span><br><span class="red-text">{{$item[0]->romaji}}</span> </td>
                <td><span class="hira blue-text">{{$item[1]->hiragana}}</span><span class="kata blue-text">{{$item[1]->katakana}}</span><br><span class="red-text">{{$item[1]->romaji}}</span> </td>
                <td><span class="hira blue-text">{{$item[2]->hiragana}}</span><span class="kata blue-text">{{$item[2]->katakana}}</span><br><span class="red-text">{{$item[2]->romaji}}</span> </td>
                <td><span class="hira blue-text">{{$item[3]->hiragana}}</span><span class="kata blue-text">{{$item[3]->katakana}}</span><br><span class="red-text">{{$item[3]->romaji}}</span> </td>
                <td><span class="hira blue-text">{{$item[4]->hiragana}}</span><span class="kata blue-text">{{$item[4]->katakana}}</span><br><span class="red-text">{{$item[4]->romaji}}</span> </td> -->
            </tr>
            </template>
        </tbody>
    </table>

    <!--<h5 class="center-align">Pilih Jenis Huruf yang mau anda test!</h5>
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col m6 s12">
                <h6>Pilih Jenis Huruf :</h6>
                <ul class="collection">
                    <li class="collection-item">
                        <label>
                            <input name="huruf" type="radio" value="h" checked>
                            <span>Hiragana</span>
                        </label>
                    </li>
                    <li class="collection-item">
                        <label>
                            <input name="huruf" type="radio" value="k">
                            <span>Katakana</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="col m6 s12">
                <h6>Pilih Durasi Waktu :</h6>
                <ul class="collection">
                    <li class="collection-item">
                        <label>
                            <input name="waktu" type="radio" value="5" checked>
                            <span>5 menit</span>
                        </label>
                    </li>
                    <li class="collection-item">
                        <label>
                            <input name="waktu" type="radio" value="10">
                            <span>10 menit</span>
                        </label>
                    </li>
                    <li class="collection-item">
                        <label>
                            <input name="waktu" type="radio" value="15">
                            <span>15 menit</span>
                        </label>
                    </li>
                    <li class="collection-item">
                        <label>
                            <input name="waktu" type="radio" value="20">
                            <span>20 menit</span>
                        </label>
                    </li>
                </ul>
                <button type="submit" class="btn col m12 s12">Next</button>
            </div>
        </div>
        </div>
    </form> -->
</v-container>
</template>

<script>
export default {
    data: ()=>({
        huruf: []
    }),
    mounted: function(){
        axios.get(`/api/huruf`).then(({data})=>{
            this.huruf=data
            console.log(this.huruf);
        })
    }
}
</script>

<style>

</style>
