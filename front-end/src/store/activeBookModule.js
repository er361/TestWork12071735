export default {
    namespaced: true,
    state: {
        activeBook: {
            title: '',
            author: '',
            publisher: '',
            releaseYear: null,
            shortDesc: '',
        },
        activeBookId: null,
    },
    mutations: {
        activeBook(state, book) {
            state.activeBook = book;
        },
        setActiveBookId(state, id) {
            state.activeBookId = id
        },
        setTitle(state, title) {
            state.activeBook.title = title
        },
        setAuthor(state, author) {
            state.activeBook.author = author
        },
        setPublisher(state, publisher) {
            state.activeBook.publisher = publisher
        },
        setShortDesc(state, desc) {
            state.activeBook.shortDesc = desc
        },
        setReleaseYear(state, year) {
            state.activeBook.releaseYear = year
        },

    },
    actions: {
        selectBook({commit, rootState}, id) {
            commit('setActiveBookId', id)
            let activeBook = rootState.books.find(book => book.id === id);
            let copyActiveBook = Object.assign({}, activeBook);
            commit('activeBook', copyActiveBook)
        },
    }
}