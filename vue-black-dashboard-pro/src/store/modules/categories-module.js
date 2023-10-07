import service from '@/store/services/categories-service';

const state = {
  list: {},
  category: {},
  meta: {},
};

const mutations = {
  SET_LIST: (state, list) => {
    state.list = list;
  },
  SET_RESOURCE: (state, category) => {
    state.category = category;
  },
  SET_META: (state, meta) => {
    state.meta = meta;
  }
};

const actions = {
  list({commit, dispatch}, params) {
    return service.list(params)
      .then(({list, meta}) => {
        commit('SET_LIST', list);
        commit('SET_META', meta);
      });
  },

  get({commit, dispatch}, params) {
    return service.get(params)
      .then((role) => { commit('SET_RESOURCE', role); });
  },

  add({commit, dispatch}, params) {
    return service.add(params)
      .then((category) => { commit('SET_RESOURCE', category); });
  },

  update({commit, dispatch}, params) {
    return service.update(params)
      .then((category) => { commit('SET_RESOURCE', category); });
  },

  destroy({commit, dispatch}, params) {
    return service.destroy(params);
  },
};

const getters = {
  list: state => state.list,
  listTotal: state => state.meta.page.total,
  category: state => state.category,
  dropdown: (state) => {
    return state.list.map(category => ({
      id: category.id,
      name: category.name
    }));
  }
};

const categories = {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};

export default categories;
