<template>
    <v-card max-height="600">
        <cover :image-url="book.cover"/>
        <v-card-title style="min-height: 100px">
            {{book.title}}
        </v-card-title>

        <v-card-subtitle>
            <b>{{book.author}}</b>
            <p>{{book.publisher}}</p>
            <v-divider></v-divider>
            {{book.releaseYear}}
        </v-card-subtitle>

        <v-card-text style="min-height: 130px">
            <b>Short desc</b>
            <br>
            {{book.shortDesc}}
        </v-card-text>

        <v-card-actions>
            <v-row>
                <v-col>
                    <v-btn color="orange lighten-2" text
                           @click="selectBook(book.id)">
                        Edit
                    </v-btn>
                </v-col>
                <v-col>
                    <v-btn color="red"
                           text
                           @click="$store.dispatch('deleteBook',book.id)">
                        Delete
                    </v-btn>
                </v-col>
            </v-row>

        </v-card-actions>
    </v-card>

</template>
<script>
    import Cover from "@/components/Cover";
    import {mapActions} from "vuex";

    export default {
        name: 'Book',
        components: {Cover},
        props: {
            book: {
                id: Number,
                title: String,
                author: String,
                shortDesc: String,
                cover: String,
                releaseYear: Number,
            }
        },
        methods: {
            ...mapActions('active', [
                'selectBook'
            ])
        }
    }
</script>