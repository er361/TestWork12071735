export default {
    namespaced: true,
    state: {
        lastPage: null,
        currentPage: 1,
    },
    mutations: {
        setLastPage(state, page) {
            state.lastPage = page
        },
        setCurrentPage(state, page) {
            state.currentPage = page
        }
    }
}