<template>
    <v-app app>
        <navbar-app/>
        <v-main>
            <router-view></router-view>
        </v-main>
        <v-footer dark padless>
            <v-card class="flex" flat tile>
                <v-card-title style="background-color: #ee6e73">
                    <strong class="subheading">Please Support Me!</strong>

                    <v-spacer></v-spacer>

                    <v-btn v-for="icon in icons" :key="icon.name" class="mx-4" dark icon target="_blank" style="text-decoration: none" :href="icon.link">
                        <v-icon size="24px">
                            {{ icon.name }}
                        </v-icon>
                    </v-btn>
                </v-card-title>

                <v-card-text class="py-2 white--text text-center" style="background-color: rgba(223,105,110,1)">
                    <strong>&copy; {{ new Date().getFullYear() }} Nihongo, All right reserved</strong>
                </v-card-text>
            </v-card>
        </v-footer>
    </v-app>
</template>

<script>
export default{
    data () {
      return {
        items: [
          { title: 'Dashboard', icon: 'mdi-view-dashboard' },
          { title: 'Photos', icon: 'mdi-image' },
          { title: 'About', icon: 'mdi-help-box' },
        ],
        icons: [
            {name:'mdi-facebook',link:"https://web.facebook.com/devi.mulyana.796"},
            {name:'mdi-whatsapp',link:"https://wa.me/+628979394991"},
            {name:'mdi-instagram',link:"https://www.instagram.com/jangbe15?r=nametag"},
        ],
        right: null,
      }
    },
}
</script>
