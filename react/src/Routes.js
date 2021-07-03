import React from "react";
import { Route, Switch } from "react-router-dom";
import PageNotFound from "./pages/PageNotFound";
import Support from "./Components/Support";
import Panel from "./Components/Panel";
import Login from "./Components/authentication/Login";
import Register from "./Components/authentication/Register";
import Ticket from "./Components/Ticket";

const Routes = () => (
  <Switch>
    <Route path="/" exact component={Support} />
    <Route path={"/login"} component={Login} />
    <Route path={"/register"} component={Register} />
    <Route path={"/panel"} component={Panel} />
    <Route path={"/ticket/:reference"} component={Ticket} />
    <Route path={"*"} component={PageNotFound} />
  </Switch>
);
export default Routes;
