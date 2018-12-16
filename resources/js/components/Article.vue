<template>
    <div id="articles" class="row services-list block-1-2 block-tab-full">

        <div v-for="article in articles" class="col-block service-item" data-aos="fade-up">
            <div class="service-icon">
                <i class="icon-paint-brush"></i>
            </div>
            <div class="service-text">
                <h3 class="h2">@{{ article.name }}</h3>
                <p><br/>
                    Precio:€<br/>
                    Disponibilidad:Kg<br/>
            </div>
        </div>

    </div> <!-- end services-list -->
</template>

<script>
    import {AxiosInstance as axios} from "axios";

    new Vue({
        el: '#articles',
        created: function() {
            this.getArticles();
        },
        data: {
            articles: [],
        },
        methods: {
            getArticles: function() {
                var urlArticles = 'articleVue';
                axios.get(urlArticles).then(response => {
                    this.articles = response.data
                });
            }
        }
    });
    // export default {
    //     name: 'articles',
    //     data() {
    //         return {
    //             articles: []
    //         }
    //     },
    //     // methods: {
    //     //     toggleCaptched(article) {
    //     //         article.captched = !article.captched
    //     //     }
    //     // },
    //     mounted() {
    //         this.$http.get('http://cacotas.azaharails.es/articleVue')
    //             .then(response => {
    //                 if(response.status === 200) {
    //                     this.articles = response.data.results.map(article => {
    //                         return {
    //                             name: article.name,
    //                             captched: false
    //                         }
    //                     })
    //                 }
    //             })
    //             .catch(error => {
    //                 console.console(error)
    //             })
    //     }
    // }
</script>

<style scoped>

</style>