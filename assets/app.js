// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
// import './bootstrap';

console.log('Hello Webpack')

import React from "react";
import ReactDOM from "react-dom";
import {HashRouter, Switch, Route} from "react-router-dom";
import HomePage from "./pages/HomePage"

const App = () => {
    return (
        <HashRouter>
            <Switch>
                {/* <Route path="/customers" component={CustomersPage}></Route> */}
                <Route path="/" exact component={HomePage}></Route>
            </Switch>
        </HashRouter>
    )
}

const rootElement = document.getElementById("app");
ReactDOM.render(<App />, rootElement);