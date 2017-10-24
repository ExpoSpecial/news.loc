<template>
    <v-app>
        <v-navigation-drawer temporary v-model="sideNav">
            <v-list>
                <v-list-tile
                        v-for="item in menuItems"
                        :key="item.title"
                        router
                        :to="item.link">
                    <v-list-tile-content>{{ item.title }}</v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar>
            <v-toolbar-side-icon
                    @click.native.stop="sideNav = !sideNav"
                    class="hidden-sm-and-up"></v-toolbar-side-icon>
            <v-toolbar-title>NEWS</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-xs-only">
                <v-btn
                        flat
                        v-for="item in menuItems"
                        :key="item.title"
                        router
                        :to="item.link">{{ item.title }}</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-container>
            <main>
                <router-view></router-view>
            </main>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        data () {
            return {
                sideNav: false,
                menuItems: [
                    {title: 'Главная', link: '/'},
                    {title: 'Портфолио', link: '/portfolio'},
                    {title: 'О нас', link: '/about-us'},
                    {title: 'Контакты', link: '/contact'}
                ]
            }
        }
    }
</script>