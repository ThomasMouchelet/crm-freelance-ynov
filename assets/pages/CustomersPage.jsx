import React, { useEffect, useState } from 'react';
import axios from "axios";

const CustomersPage = () => {
    const [customers, setCustomers] = useState([]);

    useEffect( () => {
        axios.get("http://127.0.0.1:8000/api/customers")
        .then(response => setCustomers(response.data["hydra:member"]))
    },[])


    return (
        <div>
            <h1>Customers</h1>
            {customers.map(customer => (
                <div key={customer.id}>
                    {customer.email}
                </div>
                ))}
        </div>
    )
}

export default CustomersPage;