import axios from "axios"
import {USERS_API} from "../config.js"

function findAll() {
    return axios.get(USERS_API)
    .then(res => res.data["hydra:member"])
}

export default {
    findAll
}