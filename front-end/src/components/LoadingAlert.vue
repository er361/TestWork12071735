<template>
    <v-container>
        <v-progress-linear
                :active="loading.state"
                :indeterminate="loading.state"
                color="deep-purple accent-4"
        ></v-progress-linear>
        <v-alert
                v-if="loading.error"
                v-model="retry"
                border="left"
                close-text="Close Alert"
                color="deep-purple accent-4"
                dark
                dismissible
        >
            {{loading.message}}
        </v-alert>
        <div class="text-center">
            <v-btn
                    v-if="!retry"
                    color="deep-purple accent-4"
                    dark
                    @click="retryLoading"
            >
                Повторить загрузку
            </v-btn>
        </div>
    </v-container>

</template>
<script>
    import {mapActions, mapState} from "vuex";

    export default {
        name: 'LoadingAlert',
        data() {
            return {
                retry: true
            }
        },
        methods: {
            ...mapActions([
                'getBooks'
            ]),
            retryLoading() {
                this.retry = true
                this.getBooks();
            }
        },
        computed: {
            ...mapState([
                'loading'
            ])
        }
    }
</script>