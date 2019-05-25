import Vue from 'vue';
import Router from 'vue-router';
import Home from '../components/Home';
import Explore from '../components/Explore';
import School from '../components/School';
import Community from '../components/school/Community';
import Schoolyard from '../components/school/Schoolyard';

Vue.use(Router)
export default new Router({
    routes: [
        {
            path: '/',
            component: Home,
            children: [
                {
                    path: 'explore',
                    component: Explore,
                },
                {
                    path: '/school',
                    component: School,
                    children: [
                        {
                            path: '',
                            component: Schoolyard,
                        },
                        {
                            path: 'community',
                            component: Community,
                        },

                    ]
                },

            ]
        },
    ]
});
