<template>
    <div>
        <div class="background-block" :style="'background-image: url('+ this.background_url +');'">
            <v-layout align-center
                      column
                      justify-center fill-height>
                <div class="title-main-screen">
                    <h1 class="display-2 font-weight-medium">Поиск людей для путешествий</h1>
                </div>

                <div class="mt-4 social-buttons">
                    <v-btn color="#4a76a8">Войти через VK</v-btn>
                    <v-btn color="#3b5998">Войти через Facebook</v-btn>
                    <v-btn color="#f46f30">Войти через Instagram</v-btn>
                    <v-btn color="#ea4335">Войти через Google</v-btn>
                </div>
            </v-layout>
        </div>


        <router-view></router-view>
    </div>
</template>

<script>
    import { toJson } from 'unsplash-js'
    export default {
        data() {
            return {
                background_url: ''
            }
        },
        mounted() {
            this.getRandomImage()
        },
        methods: {
            getRandomImage() {
                window.Unsplash.photos.getRandomPhoto({query: 'adventure', orientation: 'landscape'})
                    .then(toJson)
                    .then(json => {
                        this.background_url = json.urls.full
                    });
            }
        }
    }
</script>

<style>
    .social-buttons {
        font: 16px 'Roboto';
    }

    .social-buttons .theme--light.v-btn {
        color: #fff;
    }

    .background-block {
        background-color: #000;
        height: 60vh;
        background-size: cover;
        position: relative;
        background-blend-mode: screen
    }
</style>