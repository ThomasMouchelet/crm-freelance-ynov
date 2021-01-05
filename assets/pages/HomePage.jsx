import React , {useEffect, useState} from "react"
import usersAPI from "../services/usersAPI"

const HomePage = () => {
    const [users, setUsers] = useState([])

    useEffect(() => {
        fetchUsers()
    },[])

    const fetchUsers = async () =>  {
        try{
            const users = await usersAPI.findAll()
            setUsers(users)
        }catch (e){
            console.log(e)
        }
    }

    const usersHTML = users.map(user => (
        <div key={user.id}>
            {user.email}
        </div>
    ))

    return (
        <>
            <h1>users</h1>
            {usersHTML}
        </>
    )
}

export default HomePage