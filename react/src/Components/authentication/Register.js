import React, { useState } from "react";
import { TextField, Button } from "@material-ui/core";
import { makeStyles } from "@material-ui/core/styles";

const useStyles = makeStyles((theme) => ({
  root: {
    marginBottom: "80px",
    "& > *": {
      margin: theme.spacing(1),
      width: "100%",
    },
  },
}));

export default function Register() {
  const classes = useStyles();
  const [disabled, setdisabled] = useState(false);
  const handleRegister = (e) => {
    setdisabled(true);
    e.preventDefault();
    const formData = new FormData(e.target);

    fetch("/api/register", {
      method: "POST",
      body: formData,
    })
      .then((res) => {
        if (res.status == 201) return res.text();
        else {
          throw new Error("API response was not ok");
        }
      })
      .then((res) => {
        console.log(res);
        setdisabled(false);
        window.location.href = `/login`;
      })
      .catch((err) => {
        console.log(err);
        setdisabled(false);
      });
  };
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
              label="Name"
              type="text"
              name="name"
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
              disabled={disabled}
            >
              Register
            </Button>
          </form>
        </div>
      </div>
    </div>
  );
}
