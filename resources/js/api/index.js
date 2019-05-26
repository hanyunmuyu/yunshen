import axios from 'axios'
import router from '../router';
import store from '../store';

axios.interceptors.response.use(
    response => {
        if (response.data.code !== 200) {
            if (response.data.code === 4000) {
                router.push({path: '/login'});
            }
        }
        return response;

    },

    error => {
        return Promise.reject(error);

    }
);

function get(url, params) {
    if (params === undefined) {
        params = {
            api_token: ''
        };
    }
    params.api_token = store.state.user === null ? "" : store.state.user.apiToken;
    return axios.get(url, {params: params}).then((d) => {
        return d.data;
    }).then((v) => {
        return v;
    });
}

function post(url, params) {
    if (params === undefined) {
        params = {
            api_token: ''
        };
    }
    params.api_token = store.state.user === null ? "" : store.state.user.apiToken;
    return axios.post(url, params).then((d) => {
        return d.data;
    }).then((v) => {
        return v;
    });
}

export default {
    getNewsRecommend: function (params) {
        return get('api/v1/index', {
            params: params
        });
    },
    // 列表接口
    getNewsLists: function (params) {
        return get('api/news', {
            params: params
        });
    },
    // 详情接口
    getNewsDetail: function (id) {
        return axios.get('api/news/' + id);
    },
    login: function (params) {
        return post('api/v1/login', params);
    },
    getUserList: function (page) {
        if (page === undefined) {
            page = 1;
        }
        return get('api/v1/user', {page: page});
    },
    payAttention: function (friendId) {
        return post('api/v1/user/payAttention', {id: friendId});
    },
    register: function (params) {
        return post('api/v1/register', params);
    },
    code: function () {
        return post('api/v1/user/code');
    },
    createGroup: function (params) {
        return post('api/v1/community/create', params);
    },
    getCategories: function () {
        return get('api/v1/community/category');
    },
    getCommunityHot: function () {
        return get('api/v1/community/hot');
    },
    getSchoolList: function (page) {
        if (page === undefined) {
            page = 1;
        }
        return get('api/v1/school', {page: page});
    }
};


