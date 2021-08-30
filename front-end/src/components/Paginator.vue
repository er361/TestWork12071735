<template>
    <div class="text-center">
        <v-pagination
                v-model="page"
                :length="lastPage"
                :total-visible="7"
        ></v-pagination>
    </div>
</template>
<script>
    import {mapState} from "vuex";

    export default {
        name: 'Paginator',
        computed:{
            ...mapState('paginator',[
                'lastPage',
                'currentPage'
            ]),
            page:{
                get(){
                    return this.currentPage
                },
                set(page){
                    this.$store.dispatch('getBooks',page)
                }
            },
        }
    }
</script>