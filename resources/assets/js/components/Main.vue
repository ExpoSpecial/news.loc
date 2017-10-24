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
        <v-toolbar color="deep-orange" class="navigation-list">
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
        
        <v-container grid-list-md>
            <main>
                <v-layout row wrap>
                    <v-flex md9>
                        <router-view></router-view>
                    </v-flex>
                    <v-flex md3>
                        <div class="search-input">
                            <input type="search" placeholder="Поиск..." color="grey">
                        </div>
                        <v-btn class="search-btn" icon color="grey lighten-4">
                            <v-icon>search</v-icon>
                        </v-btn>
                        <h6>Категории</h6>
                        <hr color="grey">
                    </v-flex>
                </v-layout>
                
            </main>
        </v-container>
        <v-footer class="pa-3" color="deep-orange">
            <v-spacer></v-spacer>
            <div>© {{ new Date().getFullYear() }}</div>
        </v-footer>
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
<style lang="scss">
    .navigation-list {
        a {
            color: #fff !important;
            font-weight: bold;
        }
    }
    .search-input {
        display: inline-block;
        width: 98%;
        margin: 30px 0;
        input {
            padding: 10px 15px;
            background-color: #fff;
            color: #888;
            font-weight: bold;
            border-radius: 3px;
            width: 100%;
            border: 2px solid;
        }
    }
    .search-btn {
        margin-left: -50px;
    }
</style>
