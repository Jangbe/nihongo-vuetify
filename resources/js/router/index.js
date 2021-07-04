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
            component: require('../views/user/HurufJepang').default,
        }
    ]
}
