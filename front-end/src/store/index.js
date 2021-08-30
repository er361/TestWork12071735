import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";
import activeBookModule from "@/store/activeBookModule";
import paginatorModule from "@/store/paginatorModule";

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    state: {
        books: [],
        loading: {
            state: false,
            error: false,
            message: ''
        }
    },
    mutations: {
        loading(state, val) {
            state.loading = val;
        },
        setBooks(state, books) {
            state.books = books;
        },
        updateBook(state, updatedBook) {
            let bookIndex = state.books.findIndex(book => book.id === updatedBook.id);
            if (bookIndex > -1)
                state.books.splice(bookIndex, 1, updatedBook);
        },
        addBook({active}) {
            active.activeBook = {
                title: '',
                author: '',
                publisher: '',
                releaseYear: null,
                shortDesc: '',
            }
            active.activeBookId = -1;
        },
        setError(state, loading) {
            state.loading = loading
        },
    },
    actions: {
        async getBooks({commit}, page = 1) {
            try {
                commit('loading', {state: true})
                let {data: res} = await axios.get(`${process.env.VUE_APP_API_BASE_URL}/book?page=${page}`);
                commit('setBooks', res.data)

                commit('paginator/setCurrentPage',res.meta.current_page);
                commit('paginator/setLastPage',res.meta.last_page);

                commit('loading', {state: false, error: false})
            } catch (e) {
                commit('loading', {state: false, error: true, message: e.message})
            }
        },
        async updateBook({commit, state}) {
            try {
                commit('loading', {state: true})
                let activeBook = state.active.activeBook;
                let {data: res} = await axios.put(
                    `${process.env.VUE_APP_API_BASE_URL}/book/${activeBook.id}`,
                    activeBook,
                );
                commit('updateBook', res.data)
                commit('loading', {state: false, error: false})
            } catch (e) {
                commit('loading', {state: false, error: true, message: e.message})
            }
        },
        async addBook({commit, state, dispatch}) {
            try {
                commit('loading', {state: true})
                let activeBook = state.active.activeBook;
                await axios.post(
                    `${process.env.VUE_APP_API_BASE_URL}/book`,
                    activeBook,
                );
                dispatch('getBooks')
                commit('loading', {state: false, error: false})
            } catch (e) {
                commit('loading', {state: false, error: true, message: e.message})
            }
        },
        async deleteBook({commit,dispatch}, id) {
            try {
                commit('loading', {state: true})
                await axios.delete(`${process.env.VUE_APP_API_BASE_URL}/book/${id}`);
                dispatch('getBooks')
                commit('loading', {state: false, error: false})
            } catch (e) {
                commit('loading', {state: false, error: true, message: e.message})
            }
        },

    },
    modules: {
        active: activeBookModule,
        paginator: paginatorModule
    }
})
