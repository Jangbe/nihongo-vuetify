<template>
    <nav>
        <!-- <v-system-bar color="#ee6e73"></v-system-bar> -->

        <v-app-bar color="#ee6e73" dark prominent >
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

            <v-toolbar-title><h1>日本語</h1></v-toolbar-title>
        </v-app-bar>

        <v-navigation-drawer v-model="drawer" absolute bottom temporary>
        <v-list nav dense >
            <v-list-item-group v-model="group" active-class="deep-purple--text text--accent-4" >
                <v-list-item v-for="item in navbars" :key="item.title" :to="item.link" style="text-decoration: none">
                    <v-list-item-icon>
                        <v-icon>{{item.icon}}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>{{item.title}}</v-list-item-title>
                </v-list-item>
            </v-list-item-group>
        </v-list>
        </v-navigation-drawer>
    </nav>
</template>

<script>
  export default {
    data: () => ({
      drawer: false,
      group: null,
      navbars: [
          {title: "Beranda",                 icon: "mdi-view-dashboard"    , link: "/"},
          {title: "Kosakata & Pola Kalimat", icon: "mdi-book"              , link: "/bab"},
          {title: "Quizz",                   icon: "mdi-facebook-messenger", link: "/quizz"},
          {title: "Huruf Jepang",            icon: "mdi-syllabary-hiragana", link: "/huruf-jepang"},
      ]
    }),

    watch: {
      group () {
        this.drawer = false
      },
    },
  }
</script>
