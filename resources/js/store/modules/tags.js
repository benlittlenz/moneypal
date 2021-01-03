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

    [types.UPDATE_TAG] (state, data ) {
        console.log('state', state)
        console.log('data', data)
        // state.categories.data = data

        // console.log("cat id: ", state.category.data.id)
        // console.log("data id: ", data.id)
        state.tags.data = state.tags.data.map(tag => {
            if (tag.id === data.id) {
              return Object.assign({}, tag, data)
            }
            return tag
          })
    }
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

    async updateTag({ commit }, payload) {
        const tagID = payload.id
        console.log("ID: ", tagID)
        console.log(payload)
        commit(types.UPDATE_TAG, payload)
        return await axios.patch(`/api/tags/${tagID}`, payload.data)
    },
}