import React from "react";
import { Link } from "react-router-dom";

const PageNotFound = () => {
  return (
    <div className="wrap text-center">
      <h1>404 - Page Not Found</h1>
      <h1> ¯\_(ツ)_/¯ </h1>
      <h1> Uh oh! </h1>
      <p>Could not find the page you were looking for.</p>
      <Link to={"/"}>Return to home</Link>
    </div>
  );
};

export default PageNotFound;
