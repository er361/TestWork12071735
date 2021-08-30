<template>
    <v-container>
        <v-row>
            <v-col md="3">
                <v-btn @click="addBook">Добавить новую книгу</v-btn>
                <editBookForm v-if="$store.state.active.activeBookId"/>

            </v-col>
            <v-divider vertical mx-5></v-divider>
            <v-col md="7">
                <LoadingAlert/>

                <BooksList :books="books"/>
                <br>
                <Paginator :page="page"/>
            </v-col>
        </v-row>



    </v-container>
</template>

<script>

    import {mapActions, mapMutations, mapState} from "vuex";
    import BooksList from "@/components/BooksList";
    import EditBookForm from "@/components/EditBookForm";
    import LoadingAlert from "@/components/LoadingAlert";
    import Paginator from "@/components/Paginator";

    export default {
        name: 'PageContent',
        components: {Paginator, LoadingAlert, EditBookForm, BooksList},
        created() {
            this.getBooks();
        },
        data: () => ({
            page: 1
        }),
        computed: {
            ...mapState([
                'books'
            ])
        },
        methods: {
            ...mapActions([
                'getBooks'
            ]),
            ...mapMutations([
                'addBook'
            ])
        }
    }
</script>
