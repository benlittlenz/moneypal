import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
    tags: []
}

//getters
export const getters = {
    tags: state => state.tags,
}

// mutations
export const mutations = {
    [types.FETCH_TAGS](state, { tags }) {
        state.tags = tags
    },
    [types.CREATE_TAG](state, { data }) {
        state.tags.data.push({ data })
    },

    // [types.UPDATE_CATEGORY] (state, data ) {
    //     console.log('state', state)
    //     console.log('data', data)
    //     // state.categories.data = data

    //     // console.log("cat id: ", state.category.data.id)
    //     // console.log("data id: ", data.id)
    //     state.categories.data = state.categories.data.map(category => {
    //         if (category.id === data.id) {
    //           return Object.assign({}, category, data)
    //         }
    //         return category
    //       })
    // }
}

// actions
export const actions = {
    async fetchTags({ commit }) {
        try {
            const { data } = await axios.get('/api/tags')
            console.log(data)

            commit(types.FETCH_TAGS, { tags: data })
        } catch (e) {
            console.log("ERROR", e)
        }
    },
    async createTag({ commit }, { data }) {
        console.log("DATA", data)
        commit(types.CREATE_TAG, { data })

        return await axios.post('/api/tags', data)
    },

    // async updateCategory({ commit }, payload) {
    //     const categoryID = payload.id
    //     console.log("ID: ", categoryID)
    //     console.log(payload)
    //     commit(types.UPDATE_CATEGORY, payload)
    //     return await axios.patch(`/api/categories/${categoryID}`, payload.data)
    // },
}