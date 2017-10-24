<template>
    <v-container>
        <h4>Последние новости</h4>
        <hr color="grey">
        <v-container fluid grid-list-md class="grey lighten-4">
            <v-layout row wrap>
                <v-flex
                        v-bind="{ [`xs12 sm6 md4`]: true }"
                        v-for="card in cards"
                        :key="card.title"
                >
                    <v-card>
                        <v-card-media
                                :src="card.thumbnail"
                                height="200px"
                        >
                            <v-container fill-height fluid>
                                <v-layout fill-height>
                                    <v-flex xs12 align-end flexbox>
                                        <span class="headline white--text" v-text="card.title"></span>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card-media>
                        <v-card-actions class="white">
                            <v-spacer></v-spacer>
                            <v-btn icon>
                                <v-icon>favorite</v-icon>
                            </v-btn>
                            <v-btn icon 
                                flat
                                :key="card.title"
                                router
                                :to="card.slug"
                            >
                                <v-icon>arrow_forward</v-icon>
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </v-container>
</template>
<script>
    export default {
        data () {
            return {
                cards: []
            }
        },
        created () {
            axios.get('lists')
                .then(response => {
                    this.cards = response.data;
                });
        }
    }
</script>


