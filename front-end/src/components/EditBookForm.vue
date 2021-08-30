<template>
    <v-form
            ref="form"
    >
        <v-text-field
                v-model="title"
                :counter="255"
                label="Title"
        ></v-text-field>
        <v-text-field
                v-model="author"
                :counter="255"
                label="Author"
        ></v-text-field>
        <v-text-field
                v-model="publisher"
                :counter="255"
                label="Publisher"
        ></v-text-field>

        <v-text-field
                v-model="releaseYear"
                type="number"
                :counter="4"
                label="Release year"
        ></v-text-field>

        <v-textarea
                outlined
                v-model="shortDesc"
                label="Short desc"
        ></v-textarea>

        <v-btn
                v-if="activeBookId > 0"
                color="success"
                class="mr-4"
                @click="updateBook"
        >
            <span>
                Сохранить
            </span>
        </v-btn>
        <v-btn v-else
            @click="$store.dispatch('addBook')">
            <span >
                Добавить
            </span>
        </v-btn>
    </v-form>
</template>
<script>


    import {mapActions, mapMutations, mapState} from "vuex";

    export default {
        name: 'editBookForm',
        computed: {
            ...mapState('active', [
                'activeBook',
                'activeBookId'
            ]),
            title: {
                get() {
                    return this.activeBook.title
                },
                set(title) {
                    this.setTitle(title)
                }
            },
            author: {
                get() {
                    return this.activeBook.author
                },
                set(author) {
                    this.setAuthor(author)
                }
            },
            publisher: {
                get() {
                    return this.activeBook.publisher
                },
                set(publisher) {
                    this.setPublisher(publisher)
                }
            },
            shortDesc: {
                get() {
                    return this.activeBook.shortDesc
                },
                set(desc) {
                    this.setShortDesc(desc)
                }
            },
            releaseYear: {
                get() {
                    return this.activeBook.releaseYear
                },
                set(year) {
                    this.setReleaseYear(year)
                }
            },
        },
        methods: {
            ...mapMutations('active', [
                'setTitle',
                'setAuthor',
                'setPublisher',
                'setShortDesc',
                'setReleaseYear',
            ]),
            ...mapActions([
                'updateBook'
            ])
        },
    }
</script>