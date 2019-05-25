import Vue from 'vue';
import Router from 'vue-router';
import Home from '../components/Home';
import Explore from '../components/Explore';
import Nearby from '../components/explore/Nearby';
import Recommend from '../components/explore/Recommend';
import Attention from '../components/explore/Attention';
import Activity from '../components/explore/Activity';
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
                    children: [
                        {
                            path: '',
                            component: Nearby,
                        },
                        {
                            path: 'recommend',
                            component: Recommend,
                        },
                        {
                            path: 'attention',
                            component: Attention,
                        }, {
                            path: 'activity',
                            component: Activity,
                        },
                    ]
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
