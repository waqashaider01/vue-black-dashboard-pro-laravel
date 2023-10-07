import qs from 'qs';
import axios from 'axios';
import Jsona from 'jsona';

const url = process.env.VUE_APP_API_BASE_URL;
const jsona = new Jsona();

function list(params) {
  const options = {
    params: params,
    paramsSerializer: function (params) {
      return qs.stringify(params, {encode: false});
    }
  };

  return axios.get(`${url}/items`, options)
    .then(response => {
      return {
        list: jsona.deserialize(response.data),
        meta: response.data.meta
      };
    });
}

function get(id) {
  const options = {
    headers: {
      'Accept': 'application/vnd.api+json',
      'Content-Type': 'application/vnd.api+json',
    }
  };

  return axios.get(`${url}/items/${id}?include=category,tags`, options)
    .then(response => {
      let item = jsona.deserialize(response.data);
      delete item.links;
      return item;
    });
}

function add(item) {

  const payload = jsona.serialize({
    stuff: item,
    includeNames: ['categories']
  });

  const options = {
    headers: {
      'Accept': 'application/vnd.api+json',
      'Content-Type': 'application/vnd.api+json',
    }
  };

  return axios.post(`${url}/items?include=category,tags`, payload, options)
    .then(response => {
      return jsona.deserialize(response.data);
    });
}

function update(item) {
  const payload = jsona.serialize({
    stuff: item,
    includeNames: []
  });

  const options = {
    headers: {
      'Accept': 'application/vnd.api+json',
      'Content-Type': 'application/vnd.api+json',
    }
  };

  return axios.patch(`${url}/items/${item.id}`, payload, options)
    .then(response => {
      return jsona.deserialize(response.data);
    });
}

function destroy(id) {
  const options = {
    headers: {
      'Accept': 'application/vnd.api+json',
      'Content-Type': 'application/vnd.api+json',
    }
  };

  return axios.delete(`${url}/items/${id}`, options);
}

function upload(item, image) {

  const bodyFormData = new FormData();
  bodyFormData.append('attachment', image);

  return axios.post(`${url}/uploads/items/${item.id}/image`, bodyFormData)
    .then(response => {
      return response.data.url;
    });
}

export default {
  list,
  get,
  add,
  update,
  destroy,
  upload
};

