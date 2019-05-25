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
import Student from '../components/school/Student';
import Question from '../components/school/Question';
import User from '../components/User';
import UserAttention from '../components/user/Attention';
import UserFan from '../components/user/Fan';
import UserCommunity from '../components/user/Community';
import UserQuestion from '../components/user/Question';
import Encounter from '../components/Encounter';
import Search from '../components/Search';
import Chat from '../components/message/Chat';
import Message from '../components/Message';

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
                    path: 'message',
                    component: Message,
                    children: [

                        {
                            path: '',
                            component: Chat,
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
                        {
                            path: 'student',
                            component: Student,
                        },
                        {
                            path: 'question',
                            component: Question,
                        },

                    ]
                },
                {
                    path: '/user',
                    component: User,
                },
                {
                    path: '/',
                    component: Encounter,
                },


            ]
        },
        {
            path: '/search',
            component: Search,
        },
        {
            path: '/user/attention',
            component: UserAttention,
        },
        {
            path: '/user/fan',
            component: UserFan,
        },
        {
            path: '/user/community',
            component: UserCommunity,
        },
        {
            path: '/user/question',
            component: UserQuestion,
        },
    ]
});
