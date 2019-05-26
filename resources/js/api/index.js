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
    login: function (params) {
        return post('api/v1/login', params);
    },
    payAttention: function (friendId) {
        return post('api/v1/user/payAttention', {id: friendId});
    },
    register: function (params) {
        return post('api/v1/register', params);
    },

    getSchoolList: function (page) {
        if (page === undefined) {
            page = 1;
        }
        return get('api/v1/school', {page: page});
    },
    getCommunityList: function (page) {
        if (page === undefined) {
            page = 1;
        }
        return get('api/v1/community', {page: page});
    },
    getCommunityDetail: function (id) {
        return get('api/v1/community/detail', {id: id});
    },
    payAttentionToCommunity: function (id) {
        return post('api/v1/community/attention', {communityId: id});
    },
    signToCommunity: function (id) {
        return post('api/v1/community/sign', {communityId: id});
    },
    getSchoolDetail: function (id) {
        return get('api/v1/school/detail', {id: id});
    },
    getUserList: function (page) {
        if (page === undefined) {
            page = 1;
        }
        return get('api/v1/user', {page: page});
    }
};


