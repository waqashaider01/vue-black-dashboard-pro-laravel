import service from '@/store/services/items-service';

const state = {
  list: {},
  item: {},
  meta: {},
  url: null
};

const mutations = {
  SET_LIST: (state, list) => {
    state.list = list;
  },
  SET_RESOURCE: (state, item) => {
    state.item = item;
  },
  SET_META: (state, meta) => {
    state.meta = meta;
  },
  SET_URL: (state, url) => {
    state.url = url;
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
      .then((item) => { commit('SET_RESOURCE', item); });
  },

  add({commit, dispatch}, params) {
    return service.add(params)
      .then((item) => { commit('SET_RESOURCE', item); });
  },

  update({commit, dispatch}, params) {
    return service.update(params)
      .then((item) => { commit('SET_RESOURCE', item); });
  },

  destroy({commit, dispatch}, params) {
    return service.destroy(params);
  },

  upload({commit, dispatch}, {item, image}) {
    return service.upload(item, image)
      .then((url) => {
        commit('SET_URL', url);
      });
  }
};

const getters = {
  list: state => state.list,
  listTotal: state => state.meta.page.total,
  item: state => state.item,
  url: state => state.url
};

const items = {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};

export default items;
