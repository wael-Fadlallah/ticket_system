import React from "react";
import ReactDOM from "react-dom";
import { Button } from "@material-ui/core";
import Routes from "./Routes";
import { BrowserRouter as Router } from "react-router-dom";
const Root = () => <></>;

let container = document.getElementById("app");

ReactDOM.render(
  <Router>
    <Routes />
  </Router>,
  container
);
