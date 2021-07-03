import React, { useState } from "react";
import { TextField, Button } from "@material-ui/core";
import { makeStyles } from "@material-ui/core/styles";
import { saveJWT } from "../../data/LocalStorage";
import { Redirect } from "react-router";

const useStyles = makeStyles((theme) => ({
  root: {
    marginBottom: "80px",
    "& > *": {
      margin: theme.spacing(1),
      width: "100%",
    },
  },
}));

export default function Login() {
  const classes = useStyles();
  const [isDisabled, setIsdiabled] = useState(false);
  const [isLoggedIn, setisLoggedIn] = useState(false);

  const handleRegister = (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    // e.target.button.disabled = true;
    setIsdiabled(true);

    fetch("/api/login", {
      method: "POST",
      body: formData,
    })
      .then((res) => {
        if (res.status == 200) return res.json();
        else {
          throw new Error("API response was not ok");
        }
      })
      .then((res) => {
        console.log(res.access_token);
        saveJWT(res.access_token);
        setisLoggedIn(true);
        setIsdiabled(false);
      })
      .catch((err) => {
        console.log(err);
        setIsdiabled(false);
      });
  };
  if (isLoggedIn) return <Redirect to="/panel" />;
  return (
    <div className="container">
      <div className="row contactPage d-flex justify-content-center">
        <div className="col-sm-6 col-md-4">
          <form className={classes.root} onSubmit={handleRegister}>
            <TextField
              id="standard-basic"
              label="Email"
              type="email"
              name="email"
              required
            />
            <TextField
              id="standard-basic"
              label="Password"
              type="password"
              name="password"
              required
            />
            <Button
              variant="contained"
              color="primary"
              type="submit"
              disabled={isDisabled}
            >
              Login
            </Button>
          </form>
        </div>
      </div>
    </div>
  );
}
