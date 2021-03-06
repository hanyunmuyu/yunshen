import Vue from 'vue';
import Router from 'vue-router';
import Home from '../components/Home';
import HomePage from '../components/home/Index';
import Explore from '../components/Explore';
import Nearby from '../components/explore/Nearby';
import Recommend from '../components/explore/Recommend';
import Attention from '../components/explore/Attention';
import Activity from '../components/explore/Activity';
import School from '../components/School';
import SchoolDetail from '../components/school/Detail';
import Community from '../components/school/Community';
import Schoolyard from '../components/school/Schoolyard';
import Student from '../components/school/Student';
import Question from '../components/school/Question';
import User from '../components/User';
import UserAttention from '../components/user/Attention';
import UserInfo from '../components/user/Info';
import UserFan from '../components/user/Fan';
import UserCommunity from '../components/user/Community';
import UserQuestion from '../components/user/Question';
import Encounter from '../components/Encounter';
import Search from '../components/Search';
import Chat from '../components/message/Chat';
import Message from '../components/Message';
import Register from '../components/Register';
import Login from '../components/Login';
import CommunityDetail from '../components/community/Detail';
import CommunityCreate from '../components/community/Create';
import SchoolCommunity from '../components/school/detail/Community';
import SchoolStudent from '../components/school/detail/Student';

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
                        },
                        {
                            path: 'activity',
                            component: Activity,
                        },
                    ]
                },
                {
                    path: '',
                    component: HomePage,
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
                    path: '/encounter',
                    component: Encounter,
                },


            ]
        },
        {
            path: '/search',
            component: Search,
        },
        {
            path: '/message',
            component: Message,
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
        {
            path: '/user/info',
            component: UserInfo,
        },
        {
            path: '/school/detail',
            component: SchoolDetail,
            children: [
                {
                    path: 'community',
                    component: SchoolCommunity,
                },
                {
                    path: 'student',
                    component: SchoolStudent,
                },
            ]
        },
        {
            path: '/register',
            component: Register,
        },
        {
            path: '/login',
            component: Login,
        },
        {
            path: '/community/detail',
            component: CommunityDetail,
        },
        {
            path: '/community/create',
            component: CommunityCreate,
        },
    ]
});
