import React from "react";
import ReactDOM from "react-dom";
import {HashRouter, Switch, Route} from "react-router-dom";
import HomePage from "./pages/HomePage";
import CustomersPage from "./pages/CustomersPage";

const App = () => {
    return (
        <HashRouter>
            <Switch>
                <Route path="/customers" component={CustomersPage}></Route>
                <Route path="/" exact component={HomePage}></Route>
            </Switch>
        </HashRouter>
    )
}

const rootElement = document.getElementById("app");
ReactDOM.render(<App />, rootElement);