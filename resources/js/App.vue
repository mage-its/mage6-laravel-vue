<template>
  <v-app>
    <v-toolbar color="#040b21">
      <!-- <v-appbar-nav-icon @click.stop="drawer = !drawer" class="hidden-md-and-up"></v-appbar-nav-icon>             -->
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" class="hidden-md-and-up" color="white"></v-app-bar-nav-icon>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn v-for="nav in navbar" :key="nav.text" class="text-caption yellow--text font-weight-medium" outlined text small route: :to="nav.href">{{ nav.text }}</v-btn>            
      </v-toolbar-items>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn class="skewright black--text font-weight-medium" small color="yellow" href="/register">Daftar</v-btn>
      </v-toolbar-items>
    </v-toolbar>

    <v-navigation-drawer
      v-model="drawer"
      temporary
      absolute
      width = "200"
      id = "drawer"
      color="#040b21"
    >
      <v-list>
        <v-list-item v-for="nav in navbar" :key="nav">
          <v-list-item-content>
            <v-list-item-title>
              <v-btn text route: :to="nav.href" class="yellow--text">
                {{nav.text}} 
              </v-btn>                                       
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <!-- <v-app-bar color="#040b21">
      <v-btn v-for="nav in navbar" :key="nav.text" class="yellow--text font-weight-medium" outlined text small>{{ nav.text }}</v-btn>    
      <v-spacer></v-spacer>
      <v-btn class="skewright black--text font-weight-medium" small color="yellow">Daftar</v-btn>
    </v-app-bar> -->
    <v-main>
      <router-view/>
    </v-main>
  </v-app>    
</template>

<script>
export default {
  name: 'App',
  data: () => ({
    navbar:[
      {
        text: "Home",
        href: "/"
      },
      {
        text: "Olimpiade",
        href: "/olimpiade"
      },
      {
        text: "Devcom",
        href: "/devcom"
      },
      {
        text: "Esport",
        href: "/esport"
      },
      {
        text: "Blog",
        href: "/blog"
      }      
    ],
    drawer : null,
    navdrawer: [
      {
        text: 'Olimpiade',      
        href: 'olimpiade'
      },
      {
        text: 'DevCompetition',
        href: 'devcom'              
      },
      {
        text: 'About',
        href: 'about'
      },
      {
        text: 'Kontak',
        href: 'kontak'
      },
      {
        text: 'Blog',
        href: 'blog'
      }      
      
      ]
  })
}
</script>

<style lang="scss" scoped>
.skewright{
      transform: skewX(-15deg) !important;
}
</style>
