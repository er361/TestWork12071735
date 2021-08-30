<template>
    <v-row>
        <v-col
                v-for="book in books"
                :key="book.id"
                class="d-flex child-flex"
                cols="4"
        >
            <Book :book="book.id === activeBookId ? activeBook : book"/>

        </v-col>
    </v-row>
</template>
<script>
    import Book from "@/components/Book"
    import {mapState} from "vuex";

    export default {
        name: 'BooksList',
        components: {Book},
        computed:{
            ...mapState('active',[
                'activeBook',
                'activeBookId'
            ]),
            books(){
                return this.$store.state.books
            }
        }
    }
</script>