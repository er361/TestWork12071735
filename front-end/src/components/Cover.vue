<template>
    <v-img
            :src="imageUrl"
            aspect-ratio="1"
            class="grey lighten-2"
            @error="error = true"
            max-height="200"
    >
        <template v-slot:placeholder>
            <v-row
                    class="fill-height ma-0"
                    align="center"
                    justify="center"
            >
                <v-progress-circular
                        v-if="!error"
                        indeterminate
                        color="grey lighten-5"
                ></v-progress-circular>
                <v-icon v-if="error">
                    mdi-image-broken-variant
                </v-icon>
            </v-row>
        </template>
    </v-img>
</template>
<script>
    export default {
        name: 'cover',
        props: ['imageUrl'],
        data() {
            return {
                error: false
            }
        }
    }
</script>