import React, { useState, useEffect, useRef } from "react";
import { useParams } from "react-router-dom";
import EasyEdit, { Types } from "react-easy-edit";
import { loadJWT } from "../data/LocalStorage";
import { Link } from "react-router-dom";
import { makeStyles } from "@material-ui/core/styles";
import Backdrop from "@material-ui/core/Backdrop";
import CircularProgress from "@material-ui/core/CircularProgress";

const useStyles = makeStyles((theme) => ({
  backdrop: {
    zIndex: theme.zIndex.drawer + 1,
    color: "#fff",
  },
}));

export default function Ticket() {
  let { reference } = useParams();
  const [ticket, setTicket] = useState([]);
  const [loaded, setloaded] = useState(false);
  const classes = useStyles();
  useEffect(() => {
    fetch(`/admin/list_tickets/${reference}`, {
      headers: {
        Authorization: `Bearer ${loadJWT()}`,
      },
    })
      .then((res) => {
        if (res.status == 401) {
          window.location.href = `/login`;
        }
        return res.json();
      })
      .then((res) => {
        setTicket(res);
        setloaded(true);
      });
  }, []);

  const update = (value, name) => {
    console.log(value, name);
    setTicket({ ...ticket, [name]: value });
    updateAPI();
  };

  const updateAPI = () => {
    if (isLoaded.current) {
      const formData = new FormData();
      formData.append("id", ticket.id);
      formData.append("subject", ticket.subject);
      formData.append("message", ticket.message);
      fetch(`/admin/update_ticket`, {
        method: "POST",
        headers: {
          Authorization: `Bearer ${loadJWT()}`,
        },
        body: formData,
      })
        .then((res) => res.json())
        .then((res) => console.log(res));
    }
  };

  // useEffect(() => {
  //   const formData = new FormData();
  //   formData.append("id", ticket.id);
  //   formData.append("subject", ticket.subject);
  //   formData.append("message", ticket.message);
  //   fetch(`/admin/update_ticket`, {
  //     method: "POST",
  //     headers: {
  //       Authorization: `Bearer ${loadJWT()}`,
  //     },
  //     body: formData,
  //   })
  //     .then((res) => res.json())
  //     .then((res) => console.log(res));
  // }, [ticket]);

  if (loaded)
    return (
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-md-6">
            <p className="text-center">
              (ps : click on the subject or the message to edit)
            </p>
            sender : {ticket.user_email}
            <div>
              subject :
              <EasyEdit
                type={Types.TEXT}
                onSave={(value) => update(value, "subject")}
                value={ticket.subject}
                // onCancel={cancel}
                saveButtonLabel="Save"
                cancelButtonLabel="Cancel"
                // instructions="Star this repo!"
              />
              <hr />
              message :
              <EasyEdit
                type={Types.TEXT}
                onSave={(value) => update(value, "message")}
                value={ticket.message}
                // onCancel={cancel}
                saveButtonLabel="Save"
                cancelButtonLabel="Cancel"
                attributes={{ name: "awesome-input", id: 1 }}
                // instructions="Star this repo!"
              />
            </div>
            <div>
              <Link to={"/"}>Return to home</Link>
            </div>
          </div>
        </div>
      </div>
    );
  else
    return (
      <Backdrop className={classes.backdrop} open={!loaded}>
        <CircularProgress color="inherit" />
      </Backdrop>
    );
}
