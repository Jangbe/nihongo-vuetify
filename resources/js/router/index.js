import Home from '../views/Home';

export default{
    mode: "history",
    linkActiveClass: "active",
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/huruf-jepang',
            component: require('../views/user/huruf/HurufJepang').default,
        },
        {
            path: '/huruf-jepang/test/:no?',
            props: true,
            component: require('../views/user/huruf/QuizHurufJepang').default,
        },
        {
            path: '/huruf-jepang/hasil-test',
            component: require('../views/user/huruf/HasilTest').default
        }
    ]
}
