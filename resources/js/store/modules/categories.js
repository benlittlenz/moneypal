import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
    categories: []
}

//getters
export const getters = {
    categories: state => state.categories,
}

// mutations
export const mutations = {
    [types.FETCH_CATEGORIES](state, { categories }) {
        state.categories = categories
    },
    [types.CREATE_CATEGORY](state, { data }) {
        state.categories.data.push({ data })
    },

    [types.UPDATE_CATEGORY] (state, data ) {
        console.log('state', state)
        console.log('data', data)
        // state.categories.data = data

        // console.log("cat id: ", state.category.data.id)
        // console.log("data id: ", data.id)
        state.categories.data = state.categories.data.map(category => {
            if (category.id === data.id) {
              return Object.assign({}, category, data)
            }
            return category
          })
    }
}

// actions
export const actions = {
    async fetchCategories({ commit }) {
        try {
            const { data } = await axios.get('/api/categories')
            console.log(data)

            commit(types.FETCH_CATEGORIES, { categories: data })
        } catch (e) {
            console.log("ERROR", e)
            //commit(types.FETCH_USER_FAILURE)
        }
    },
    async createCategory({ commit }, { data }) {
        console.log("DATA", data)
        commit(types.CREATE_CATEGORY, { data })

        return await axios.post('/api/categories', data)
    },

    async updateCategory({ commit }, payload) {
        const categoryID = payload.id
        console.log("ID: ", categoryID)
        console.log(payload)
        commit(types.UPDATE_CATEGORY, payload)
        return await axios.patch(`/api/categories/${categoryID}`, payload.data)
    },
}