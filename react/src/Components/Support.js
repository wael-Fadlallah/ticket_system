import React, { useState } from "react";
import { TextField, Button } from "@material-ui/core";
import { makeStyles } from "@material-ui/core/styles";
import contact_us from "../images/contact_us.jpg";
import Snackbar from "@material-ui/core/Snackbar";
// import Alert from "@material-ui/lab/Alert";
const useStyles = makeStyles((theme) => ({
  root: {
    marginBottom: "80px",
    "& > *": {
      margin: theme.spacing(1),
      width: "100%",
    },
  },
}));

export default function Support() {
  const classes = useStyles();
  const [open, setOpen] = useState(false);
  const [disabled, setdisabled] = useState(false);
  const [message, setmessage] = useState("");
  const handleSubmit = (e) => {
    e.preventDefault();
    setdisabled(true);
    const formData = new FormData(e.target);

    fetch("/api/contact_us", {
      method: "POST",
      body: formData,
    })
      .then((res) => {
        return res.text();
      })
      .then((res) => {
        setOpen(true);
        setmessage("Tickt sent successfully");
        e.target.reset();
        setdisabled(false);
      })
      .catch((err) => {
        console.log(err);
        setOpen(true);
        setmessage("unknown error occurred");
        setdisabled(false);
      });
  };

  const handleSnackBarClose = () => {
    setOpen(false);
  };

  return (
    <div className="container">
      <div className="row contactPage">
        <div className="col-md-6">
          <div className="text-center">
            <div>
              <span className="gray h3"> Still have </span>
              <p className="h1">questions?</p>
            </div>
            <img src={contact_us} className="img-fluid w-70" />
          </div>
        </div>
        <div className="col-md-6">
          <form
            className={classes.root}
            // autoComplete="off"
            // noValidate
            onSubmit={handleSubmit}
          >
            <TextField
              id="standard-basic"
              label="Email"
              type="email"
              name="user_email"
              required
            />
            <TextField
              id="standard-basic"
              label="Your Name"
              type="text"
              name="name"
              required
            />
            <TextField
              id="standard-basic"
              label="Subject"
              name="subject"
              required
            />

            <TextField
              id="standard-textarea"
              label="Message"
              multiline
              rows={4}
              name="message"
              required
            />
            <Button
              variant="contained"
              color="primary"
              type="submit"
              disabled={disabled}
            >
              Send
            </Button>
          </form>
        </div>
      </div>

      <Snackbar
        open={open}
        autoHideDuration={6000}
        message={message}
        onClose={handleSnackBarClose}
      />
    </div>
  );
}
