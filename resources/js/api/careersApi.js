import axios from 'axios'

const careers = axios.create({
    baseURL: '/api/careers'
})

export default careers